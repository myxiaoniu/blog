<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.0</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
	<link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>

</head>
<body class="login-bg">





    <div class="login">
        <div class="message">admin-管理登录</div>

{{--        @if (count($errors) > 0)--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

        @if(count($errors) > 0 )
            <ul>

                    @foreach ($errors->all() as  $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach




            </ul>
        @endif

        <div id="darkbannerwrap"></div>

        <form method="post" class="layui-form" action="{{url('admin/dologin')}}">

            {{csrf_field()}}
            <span class="glyphicon glyphicon-user"  style="font-size:18px;vertical-align:middle;top:-3px;color: #999;"></span>&nbsp;&nbsp;&nbsp;
            <input name="user_name" id="name" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15" id="hname">
            <input name="user_pwd" id="pwd" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15" id="hpwd">
            <input name="code" id="code" style="width: 100px ; float: left"  lay-verify="required" placeholder="验证码"  type="text" class="layui-input">
            <img src="{{ captcha_src() }}" style="float: right" alt="点击刷新" onclick="this.src='{{ url('captcha/default') }}?s='+Math.random()">
            <hr class="hr15" id="hcode">
            <input value="登录" lay-submit lay-filter="login" id="dl" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <script>
        // $('#name').blur(function () {
        //     var name = $('#name').val();
        //
        //
        // });
        // $('#pwd').blur(function () {
        //     var pwd = $('#pwd').val();
        //     if(pwd == ''){
        //         $('#hpwd').html('密码不能为空').css('color','red');
        //     }else{
        //         $('#hpwd').html('OK').css('color','green');
        //     }
        //
        // });
        // $('#code').blur(function(){
        //    var code = $('#code').val();
        //    if(code == ''){
        //        $('#hcode').html('验证码不能为空').css('color','red');
        //    }else{
        //        $('#hcode').html('OK').css('color','green');
        //    }
        //
        // });
    {{--    $('#dl').click(function () {--}}
    {{--        var name = $('#name').val();--}}
    {{--        var pwd = $('#pwd').val();--}}
    {{--        var code = $('#code').val();--}}
    {{--        $.post('/api/admin/dologin',{'user_name':name , 'user_pwd':pwd , 'code':code},success , 'json');--}}
    {{--    });--}}
    {{--    function success(data)--}}
    {{--    {--}}
    {{--        if(data.status==1){--}}
    {{--            window.location.href = "{{url('admin/index')}}";--}}
    {{--        }else if(data.status == 2){--}}
    {{--            $('#hcode').html('验证码错误').css('color','red')--}}
    {{--        }else if(data.status == 3){--}}
    {{--            $('#hpwd').html('密码输入错误').css('color','red');--}}
    {{--        }else if(data.status == 4){--}}
    {{--            $('#hname').html('用户名不存在').css('color','red');--}}
    {{--        }--}}
    {{--        // setTimeout(function(){--}}
    {{--        //     window.location.reload();//刷新当前页面.--}}
    {{--        // },3000)--}}
    {{--    }--}}
    {{--</script>--}}


    <!-- 底部结束 -->
{{--    <script>--}}
{{--    //百度统计可去掉--}}
{{--    var _hmt = _hmt || [];--}}
{{--    (function() {--}}
{{--      var hm = document.createElement("script");--}}
{{--      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";--}}
{{--      var s = document.getElementsByTagName("script")[0];--}}
{{--      s.parentNode.insertBefore(hm, s);--}}
{{--    })();--}}
{{--    </script>--}}
</body>
</html>
