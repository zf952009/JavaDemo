<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'	=>	'mysql',// 数据库类型
    'DB_HOST'	=>	'localhost',// 服务器地址
    'DB_NAME'	=>	'teaching-db2',// 数据库名
    'DB_USER'	=>	'root', // 用户名
    'DB_PWD'	=>	'123456',// 密码
    'DB_PORT'	=>	'3306',// 端口
    'DB_CHARSET'	=>	'utf8',//编码设置
    /* Cookie设置 */
    'COOKIE_EXPIRE'         =>  0,       // Cookie有效期
    'COOKIE_DOMAIN'         =>  '',      // Cookie有效域名
    'COOKIE_PATH'           =>  '/',     // Cookie路径
    'COOKIE_PREFIX'         =>  '',      // Cookie前缀 避免冲突
    'COOKIE_SECURE'         =>  true,   // Cookie安全传输
    'COOKIE_HTTPONLY'       =>  '',      // Cookie httponly设置
    /* SESSION设置 */
    'SESSION_AUTO_START'    =>  true,    // 是否自动开启Session
    'SESSION_OPTIONS'       =>  array(), // session 配置数组 支持type name id path expire domain 等参数
    'SESSION_TYPE'          =>  '', // session hander类型 默认无需设置 除非扩展了session hander驱动
    'SESSION_PREFIX'        =>  '', // session 前缀
);