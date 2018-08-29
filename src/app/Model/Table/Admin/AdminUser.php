<?php
/**
 *
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2018/8/29 下午10:48
 */

namespace Five\Admin\Model\Table\Admin;


use Five\Admin\Model\Table\TableBase;

class AdminUser extends TableBase {
    
    static function updateById($id, $arr_set) {
        return self::update(['id' => $id], $arr_set);
    }
    
    static function getByEnName($en_name) {
        return self::getRow(['en_name' => $en_name]);
    }
    
    static protected function obj() {
        return new \Five\Admin\Data\DB\Admin\AdminUser();
    }
}