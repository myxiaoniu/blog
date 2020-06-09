<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <style>
        body{
            width:100%;
            height:100%;
            background-color:#F6E497;
        }
        #div1 {
            width:640px;
            height:840px;
            border:2px solid pink;
            background-color:white;
            position: absolute;
            margin:0 auto;
            left:50%;
            top:50%;
            transform: translate(-50%, -50%);


        }
        .title1{
            margin-left:180px;
            margin-top:40px;
        }
        .quanju {
            margin-top:20px;
            margin-left:50px;

        }
        label {
            font-size:25px;


            display: inline-block;
            width: 150px;
            text-align: right;

        }
        input{
            height:30px;

        }
        .butt {
            width:110px;
            height:40px;
            background-color:green;
            margin-left:200px;


        }
        font {
            font-size:20px;
            color:white;
        }
    </style>
</head>
<body>
<div id='div1'>

    <form action='registerHoutai.php' method='post'>
        <h1 class='title1'>用户注册</h1>
        <hr size='4px' color='pink'/>
        <div class='quanju'>
            <div class='block'>
                <label>用户名：</label>
                <input type='text' id="name" name='name'/><br/><br/>
                <span id="sname"></span>
            </div>
            <div class='block'>
                <label>密码：</label>
                <input type='password' id="pwd" name='pwd'/><br/><br/>
                <span id="spwd"></span>
            </div>
            <div class='block'>
                <label>确认密码：</label>
                <input type='password' id="rpwd" name='rpwd'/><br/><br/>
                <span id="srpwd"></span>
            </div>
            <div class='block'>
                <label>年龄：</label>
                <input type='text' id="age" name='age'/><br/><br/>
                <span id="sage"></span>
            </div>
            <div class='block'>
                <label>邮箱：</label>
                <input type='text' id="email" name='email'/><br/><br/>
                <span id="semail"></span>
            </div>
            <div class='block'>
                <label>身份证：</label>
                <input type='text' id="card" name='card'/><br/><br/>
                <span id="scard"></span>
            </div>
            <div class='block'>
                <label>电话号码：</label>
                <input type='text' id="phone" name='phone'/><br/><br/>
                <span id="s"></span>
            </div>
            <div class='block'>
                <label>籍贯：</label>
                <input type='text' id="address" name='address'/><br/><br/>
                <span id="saddress"></span>
            </div>
            <div class='block'>
                <label>性别：</label>
                <input type='radio' name='sex' value='1' checked='checked'/>男
                <input type='radio' name='sex' value='2'/>女
                <input type='radio' name='sex' value='0'/>保密
            </div><br/>
            <div class='block'>
                <label>验证码：</label>
                <input type='text' id="code"  name='code'/><br/><br/>
                <span id="scode"></span>
            </div>
            <div class='block'>
                <span ></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="{{ captcha_src() }}"  alt="点击刷新" onclick="this.src='{{ url('captcha/default') }}?	  s='+Math.random()">
            </div><br/>

        </div>
        <div class='sb'>
            <button type='submit' value='注册' class='butt' ><font>
                    立即注册</font>
            </button>
        </div>


    </form>
</div>
</body>
<script type="text/javascript">
    var n = /^[\u4e00-\u9fa5]{0,}$/;  //验证姓名是否合法
    var s =  /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; //验证 身份证号码是否合法
    var d = /^1[3|4|5|8][0-9]\d{4,8}$/; //验证 电话号码号码是否合法
    var y = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; //验证 邮箱是否合法
    $('#name').blur(function () {
        var name = $('#name').val();
        if(name == ''){
            $('#sname').html('用户名不能为空').css('color','red');
        }else if(name.match(n)){
            $('#sname').html('OK').css('color','green');
        }else{
            $('#sname').html('用户名不合格').css('color','red');
        }
        $.post('user/doregist',{user_name:name},success,'json');
    });



</script>


</html>
