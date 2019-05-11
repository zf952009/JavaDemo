<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <link rel="stylesheet" href="/Public/admin/layui/css/layui.css"/>
</head>

<body>
<form class="layui-form" action="<?php echo U('admin/index/register_ok');?>" method="post">
    <div class="layui-row">
        <div class="layui-col-xs6 layui-col-sm6 layui-col-md4">
            <div class="grid-demo grid-demo-bg1">&nbsp;</div>
        </div>
        <div class="layui-col-xs6 layui-col-sm6 layui-col-md4">
            <div class="grid-demo">
                <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
                    <legend>用户注册</legend>
                </fieldset>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="name" lay-verify="title|required" autocomplete="off"
                               placeholder="请输入用户名" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-inline">
                        <input type="password" id="name" name="password" lay-verify="pass|required" placeholder="请输入密码"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">确认密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password2" lay-verify="pass|required" placeholder="请重新输入密码"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">电子邮箱</label>
                    <div class="layui-input-inline">
                        <input type="text" name="email" lay-verify="email|required" autocomplete="off"
                               class="layui-input" placeholder="请输入电子邮箱">
                    </div>
                    <div class="layui-form-mid layui-word-aux">电子邮箱</div>
                </div>
                <button class="layui-btn layui-btn-normal" style="width: 100px; margin-left: 150px;" lay-submit
                        lay-filter="*">提交
                </button>
            </div>
        </div>
    </div>
</form>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
</fieldset>
<script src="/Public/admin/layui/layui.js" charset="UTF-8"></script>
<script>
    layui.use(['form', 'layedit', 'laydate'], function () {
        var form = layui.form,
            layer = layui.layer;
        //自定义验证规则
        form.verify({
            //用户名验证
            title: function (value) {
                if (/^\d+\d+\d$/.test(value)) {
                    return '用户名不能全为数字';
                }
                if (!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)) {
                    return '用户名不能有特殊字符';
                }
            },
            //密码验证
            pass: [
                /^[\S]{6,12}$/,
                '密码必须6到12位，且不能出现空格'
            ],
        });
        form.on('submit(*)', function (data) {
            //获取表单提交的数据
            var arrays = data.field;
            //两次密码验证
            if (arrays['password'] != arrays['password2']) {
                alert('密码不一致');
                return false;//阻止表单跳转。如果需要表单跳转，去掉这段即可。
            } else {
                return true;
            }
        });
    });
</script>
</body>

</html>