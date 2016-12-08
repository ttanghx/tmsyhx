<?php

//设置时区
date_default_timezone_set('Etc/GMT-8');

//设置根目录
define("APP_PATH", realpath(dirname(__FILE__).'/../../'));

//设置运行环境
if (strpos(APP_PATH, 'tmsyhx.oicp.io') > 0) {
    define("RUN_ENVIRON", 'product');
} else {
    define("RUN_ENVIRON", 'develop');
}
//todo 定义使用哪个配置文件，yaf.environ 目前只能通过php.ini设置

//判断需要的扩展是否加载
$extensionsArr = array('yaf', 'curl', 'pdo_mysql');
foreach ($extensionsArr as $key => $val) {
    if (!extension_loaded($val)) {
        die('框架需要安装'.$val.'扩展');
    }
}

//todo
$app = new Yaf_Application(APP_PATH . "/conf/application.ini", RUN_ENVIRON);
$app->bootstrap()->run();
