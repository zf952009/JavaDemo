<?php
return array(
	//'配置项'=>'配置值'

    'URL_CASE_INSENSITIVE'	=>	true,// 默认false 表示URL区分大小写 true则表示不区分大小写
    /*'DB_TYPE'	=>	'mysql',// 数据库类型
    'DB_HOST'	=>	'localhost',// 服务器地址
    'DB_NAME'	=>	'teching-db',// 数据库名
    'DB_USER'	=>	'root', // 用户名
    'DB_PWD'	=>	'123456',// 密码
    'DB_PORT'	=>	'3306',// 端口
    'DB_CHARSET'	=>	'utf8',//编码设置*/
//定义我们当前全部的分组列表信息
    'DEFAULT_MODULE'        =>  'admin',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login', // 默认操作名称
    //定义我们当前全部的分组列表信息
    'MODULE_ALLOW_LIST'	=>	array('home','admin'),
);