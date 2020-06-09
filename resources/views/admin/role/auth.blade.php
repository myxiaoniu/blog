<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/admin/css/font.css">
    <link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <div class="layui-form-item">
        <label for="username" class="layui-form-label">
            <span class="x-red">*</span>角色名称
        </label>
        <div class="layui-input-inline">
            <input type="hidden" name="uid" value="{{$role->id}}">
            <input type="text" id="username" name="username" readonly="readonly"  lay-verify="required"
                   autocomplete="off" value="{{$role->role_name}}" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">
            <span class="x-red">*</span>这是一个重要的角色
        </div>
    </div>
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="addAll()"><i class="layui-icon">&#xe62f;</i>添加权限</button>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>权限名称</th>
            <th>权限路由</th>
            <th>是否拥有此权限</th>
        </thead>
        <tbody>
        @foreach($permission as  $p)
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{ $p->id }}'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td>{{$p->id}}</td>
                <td>{{$p->per_name}}</td>
                <td>{{$p->per_url}}</td>
                <td>

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>


</div>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });
    });
    function addAll (argument) {
        var ids = [];
        $(".layui-form-checked").not('.header').each(function (i,y) {
            var u = $(y).attr('data-id');
            ids.push(u);
            // console.log(ids);
        })


        // var data = tableCheck.getData();

        layer.confirm('您确定要添加这些权限吗？',function(index){
            //捉到所有被选中的，发异步进行删除
            $.get('/admin/name/del',{'ids':ids},function(data){

                if(data.status ==1){
                    $(".layui-form-checked").not('.header').parents('tr').remove();
                    layer.msg(data.message,{icon:6 ,time:1000});
                }else{
                    layer.msg(data.message,{icon:5 , time:1000});
                }
            })


        });
    }
</script>
<script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>
</body>

</html>


