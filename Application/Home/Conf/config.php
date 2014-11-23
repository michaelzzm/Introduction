<?php
return array(
	//'配置项'=>'配置值'
	'DB_CONFIG'	=>	array(
	'db_type'	=> 'mysql',
	'db_host' 	=> 'localhost',
	'db_user'	=> 'root',
	'db_pwd'	=> '',
	'db_port'	=> 3306,
	'db_name'	=> 'introduction',
	),

	'EMAIL_CONFIG' => array(
	'SMTP_HOST'   => 'smtp.gmail.com', //SMTP服务器
	'SMTP_PORT'   => 465, //SMTP服务器端口
	'SMTP_USER'   => 'rainforest.vista@gmail.com', //SMTP服务器用户名
	'SMTP_PASS'   => 'Yyb-198722', //SMTP服务器密码
	'FROM_EMAIL'  => 'rainforest.vista@gmail.com', //发件人EMAIL
	'FROM_NAME'   => 'Yibin', //发件人名称
	'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
	'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
 	),
);