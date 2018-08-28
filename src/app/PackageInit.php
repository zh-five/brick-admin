<?php
namespace Five\Admin;
/**
 * composer包初始化操作
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2017/12/8 下午3:13
 */


//1.注册包的错误处理函数
use Brick\App;

App::getInstance()->setPackageErrorFunction(__NAMESPACE__, ['\Five\Admin\Package\Handler', 'error']);

//2.替换其它包的配置信息读取 -- 修改其它Brick组件的配置信息


//3.替换其包的模板文件 -- 修改其它Brick组件页面样式


