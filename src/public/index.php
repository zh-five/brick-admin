<?php

/**
 * 入口文件
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2017/12/6 下午8:21
 */

use Brick\App;
use Brick\Core\Router;

require __DIR__ . '/../../vendor/autoload.php';

try {
    App::getInstance()->setAppErrorFunction(function($e){ //注册全局错误处理函数.正式项目建议定义在公共包中
        echo "app:\n";
        print_r($e);
    })->setAppOption([
        'conf_file'         => '/data/server_conf/Five_Admin.app.php', //项目外部配置文件(请根据实际情况修改)
        'standby_conf_file' => __DIR__.'/../app/conf/outside_standby/Five_Admin.app.php', //备用配置文件
        'router'            => new Router(__DIR__.'/../app/conf/route.conf.php'), //路由处理器
    ])->dispatch();
    exit;
}catch (\Exception $e) {
    try {
        App::getInstance()->error($e);
        exit;
    } catch (\Brick\Core\Exceptions\Http404Exception $e) {
    }
} 





