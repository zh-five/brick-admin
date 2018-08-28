<?php
namespace Five\Admin\Package;

use Brick\Core\ConfigAbstract;

/**
*
*
* @author        肖武 <five@v5ip.com>
* @datetime      2017/12/7 上午10:33
*/

class Config extends ConfigAbstract{
    
    protected function __construct() {
        $this->_conf_dir      = __DIR__ . '/../conf';
        $this->_package_flag = 'Five_Admin';
    }
}