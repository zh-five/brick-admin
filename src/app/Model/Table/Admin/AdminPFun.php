<?php
/**
 *
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2018/8/29 下午11:35
 */

namespace Five\Admin\Model\Table\Admin;

use Five\Admin\Model\Table\TableBase;

class AdminPFun extends TableBase {

    /**
     * 获取顶级菜单列表
     */
    public static function getTopMenu() {
        return self::obj()->getWhereList('name title, id value', ['fid' => 0, 'is_menu' => 1], [], []);
    }
    
    protected static function obj() {
        return new \Five\Admin\Data\DB\Admin\AdminPFun();
    }
}
