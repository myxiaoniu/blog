<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>验证码</title>
</head>
<body>



<form action="{{url('admin/code')}}" method="post">
    {{ csrf_field() }}
    <div>
        <input type="text" name="code" placeholder="请输入验证码">
    </div>
    <div>
        <img src="{{captcha_src()}}" onclick="this.src='{{ url('captcha/default') }}?s='+Math.random()" alt="点击刷新">
    </div>
    <div>
        <input type="submit" value="验证">
    </div>



</form>



</body>
</html>
