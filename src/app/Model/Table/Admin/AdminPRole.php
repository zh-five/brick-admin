<?php
/**
 *
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2018/8/29 下午11:37
 */

namespace Five\Admin\Model\Table\Admin;

use Five\Admin\Model\Table\TableBase;

class AdminPRole extends TableBase {
    
    protected static function obj() {
        return new \Five\Admin\Data\DB\Admin\AdminPRole();
    }
}
