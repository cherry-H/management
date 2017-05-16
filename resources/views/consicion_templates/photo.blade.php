<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("croppic/assets/css/main.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("croppic/assets/css/croppic.css") }}"/>

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Mrs+Sheppards&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="container">
    <div class="row margin-bottom-40">
        <div class="col-md-12">
            <h1>Upload and edit images in Laravel using Croppic jQuery plugin</h1>
        </div>
    </div>

    <div class="row margin-bottom-40">
        <div class=" col-md-3">
            <div id="cropContainerEyecandy"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p><a href="http://www.croppic.net/" target="_blank">Croppic</a> is ideal for uploading profile photos,
                or photos where you require predefined size/ratio.</p>
        </div>
    </div>
</div>
<script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="{{ asset("croppic/croppic.min.js") }}"></script>
<script>
    var eyeCandy = $('#cropContainerEyecandy');
    var croppedOptions = {
        uploadUrl: 'http://res.lianjia.com:8076/index.php/upload',
        cropUrl: 'http://res.lianjia.com:8076/index.php/crop',
        cropData:{
            'width' : eyeCandy.width(),
            'height': eyeCandy.height()
        }
    };
    var cropperBox = new Croppic('cropContainerEyecandy', croppedOptions);
</script>
</body>
</html>