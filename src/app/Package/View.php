<?php
namespace Five\Admin\Package;

use Brick\Core\ViewAbstract;

/**
 * 模板处理
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2017/12/7 下午3:11
 */

class View extends ViewAbstract{

    protected function __construct() {
        $this->_tpl_dir = __DIR__.'/../view/web';
    }
}
