<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">

<head>
    <title>管理首页</title>
</head>
<frameset rows="65,*" cols="*" frameborder="no" border="0" framespacing="0">
    <frame src="<?php echo U('admin/index/header');?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame"
           target="main"/>
    <frameset cols="193,*" frameborder="no" border="0" framespacing="0">
        <frame src="<?php echo U('admin/index/left');?>" scrolling="No" noresize="noresize" id="leftFrame" target="main"/>
        <frame src="<?php echo U('admin/index/teachar');?>?title=所有教师&page=1&course2_id=0" name="mainFrame" id="mainFrame"/>
    </frameset>
</frameset>
<noframes>
    <body>
    </body>
</noframes>
</html>