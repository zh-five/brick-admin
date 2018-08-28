<?php
namespace Five\Admin\Package;

use Brick\App;

/**
 * cli的controller基类
 */

class ControllerCli extends Controller {

    /**
     * 在action被执行前调用
     */
    public function init() {
        parent::init();
        
        //只允许cli调用
        if (!App::getInstance()->getRequest()->isCli()) {
            exit("只允许cli执行");
        }
        
    }
}