<?php if (!defined('THINK_PATH')) exit();?><meta charset="utf-8" />
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/Public/admin/layui/css/layui.css" />
<ul class="layui-nav">
	<li class="layui-nav-item layui-hide-xs" lay-unselect style="margin-left: 1000px;">
		<a href="<?php echo U('admin/teachar/teacharDetails');?>?teacharName=<?php echo ($teacharName); ?>" target="mainFrame">个人中心</a>
	</li>
	<li class="layui-nav-item" lay-unselect="">
		<a href="javasctipt:;" target="_blank"><span><?php echo ($name); ?></span></a>
	</li>
	<li class="layui-nav-item" lay-unselect="">
		<a href="<?php echo U('admin/login/userexit');?>?teacharName=<?php echo ($teacharName); ?>" target="_parent"><span>退出</span></a>
	</li>
</ul>
<script src="/Public/admin/layui/layui.js"></script>
<script>
	layui.use('element', function() {
		var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块

		//监听导航点击
		element.on('nav(demo)', function(elem) {
			//console.log(elem)
			layer.msg(elem.text());
		});
	});
</script>