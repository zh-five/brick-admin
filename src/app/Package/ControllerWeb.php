<?php
namespace Five\Admin\Package;

/**
 * web的controller基类
 */

class ControllerWeb extends Controller {

    /**
     * 在action被执行前调用
     */
    public function init() {
        parent::init();
        
    }

    /**
     * 解析模板
     *
     * @param string $tpl_file    模板文件路径(基于View::$tpl_dir目录的相对路径)
     * @param array  $arr_tpl_var 要注册的模板变量
     *
     * @throws \Brick\Core\Exceptions\ViewException
     */
    protected function display($tpl_file, $arr_tpl_var) {
        View::getInstance()->display($tpl_file, $arr_tpl_var);
    }
    
}