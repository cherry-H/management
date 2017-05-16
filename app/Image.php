<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public static $rules = [
        'img' => 'required|mines:png,gif,jpeg,jpg,bmp'
    ];

    public static $messages = [
        'img.mines'    => 'Uploaded file is not in image format',
        'img.required' => 'Image is required',
    ];
}