<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;
use Mail;



class tasksDeadlineReminder extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'tasksDeadlineReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send task with deadline within 24hrs via email';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $currentTimestamp  = Carbon::now()->toDateTimeString();
        $tomorrowTimestamp = Carbon::now()->addDay()->toDateTimeString();

        //获取逾期任务的用户id
        $userWithDeadlineWithinADay =
            DB::table('tasks')
                ->select('user_id')
                ->where('due_date', '>=', $currentTimestamp)
                ->where('due_date', '<', $tomorrowTimestamp)
                ->where('state', '!=', 'complete')
                ->where('state', '!=', 'backlog')
                ->distinct()
                ->get();

        //根据用户id发送邮件  1.获取该用户逾期任务集合 2.获取用户邮箱和姓名
        if (!empty($userWithDeadlineWithinADay)) {
            foreach($userWithDeadlineWithinADay as $user) {
                $tasksWithDeadlineWithinADay =
                    DB::table('tasks')
                        ->select('tasks.id', 'name', 'due_date', 'email', 'full_name')
                        ->where('due_date', '>=', $currentTimestamp)
                        ->where('due_date', '<', $tomorrowTimestamp)
                        ->where('state', '!=', 'complete')
                        ->where('state', '!=', 'backlog')
                        ->where('user_id', '=', $user->user_id)
                        ->leftJoin('users', 'users.id', '=', 'tasks.user_id')
                        ->get();

                Mail::send('emails.tasksWithDeadlineWithinADay',
                    ['tasksWithDeadlineWithinADay' => $tasksWithDeadlineWithinADay],
                    function($message) use ($tasksWithDeadlineWithinADay) {
                        $message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
                        $message->to($tasksWithDeadlineWithinADay[0]->email, $tasksWithDeadlineWithinADay[0]->full_name)
                            ->subject('Daily report: ' . count($tasksWithDeadlineWithinADay) .
                                ' tasks with deadlines within a day');
                    });
            }
        } else {
            $this->info("No tasks will due.");
        }
    }
}