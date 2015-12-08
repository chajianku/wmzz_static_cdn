<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 
/*
Plugin Name: 百度静态资源CDN插件
Version: 2.0
Plugin URL: http://zhizhe8.net
Description: 使用百度对云签的静态资源进行CDN处理，大幅提升速度
Author: 无名智者
Author URL: http://zhizhe8.net
For: V3.1+
*/

function wmzz_static_cdn_core() {
	ob_start('wmzz_static_cdn_processor'); //打开缓冲区，设置回调函数wmzz_static_cdn_processor
}

function wmzz_static_cdn_processor($str) {
	//替换，然后返回结果作为修改好的缓冲区
	return str_replace(
		array(
			'source/js/jquery.min.js',
			'source/css/bootstrap.min.css',
			'source/js/bootstrap.min.js',
			SYSTEM_URL . 'plugins/wmzz_todcui/css/todc-bootstrap.min.css'
		), 
		array(
			'http://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js',
			'http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css',
			'http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js',
			'http://apps.bdimg.com/libs/todc-bootstrap/3.1.1-3.2.1/todc-bootstrap.min.css'
		), $str);
}

addAction('top','wmzz_static_cdn_core'); //挂载wmzz_static_cdn_core