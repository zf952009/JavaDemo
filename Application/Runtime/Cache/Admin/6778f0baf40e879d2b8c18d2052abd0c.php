<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台管理系统</title>
    <meta name="author" content="DeathGhost"/>
</head>

<body>
<aside class="lt_aside_nav content mCustomScrollbar" style="top:0">
    <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="demo" style="margin-right: 10px;">
        <li class="layui-nav-item layui-nav-itemed">
            <a href="javascript:;">用户管理</a>
            <dl class="layui-nav-child">
                <dd>
                    <a href="<?php echo U('admin/index/teachar');?>?title=所有教师&page=1&course2_id=0" target="mainFrame">教师管理</a>
                </dd>
                <dd>
                    <a href="<?php echo U('admin/index/student');?>?student=所有学生&page=1" target="mainFrame">学生管理</a>
                </dd>
            </dl>
        </li>
        <li class="layui-nav-item layui-nav-itemed">
            <a href="javascript:;">课程管理</a>
            <dl class="layui-nav-child">
                <dd>
                    <a href="<?php echo U('admin/index/course');?>?course=所有课程&page=1" target="mainFrame">查看课程</a>
                </dd>
                <!--<dd>
                    <a href="<?php echo U('admin/index/managecourse');?>" target="mainFrame">管理课程</a>
                </dd>-->
                <dd><a href="<?php echo U('admin/index/updatecourse');?>" target="mainFrame">添加课程</a></dd>
            </dl>
        </li>
    </ul>
</aside>

<link rel="stylesheet" type="text/css" href="/Public/admin/layui/css/layui.css" media="all"/>
<script src="/Public/admin/layui/layui.js"></script>
<script>
    (function ($) {
        $(window).load(function () {
            $("a[rel='load-content']").click(function (e) {
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url, function (data) {
                    $(".content .mCSB_container").append(data);
                    $(".content").mCustomScrollbar("scrollTo", "h2:last");
                });
            });
            $(".content").delegate("a[href='top']", "click", function (e) {
                e.preventDefault();
                $(".content").mCustomScrollbar("scrollTo", $(this).attr("href"));
            });

        });
    });
</script>
</body>

</html>