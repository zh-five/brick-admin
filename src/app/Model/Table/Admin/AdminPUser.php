<?php
/**
 *
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2018/8/29 下午11:33
 */

namespace Five\Admin\Model\Table\Admin;


use Five\Admin\Model\Table\TableBase;

class AdminPUser extends TableBase {

    static protected function obj() {
        return new \Five\Admin\Data\DB\Admin\AdminPUser();
    }
}