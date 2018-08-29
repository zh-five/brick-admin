<?php
/**
 *
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2018/8/29 下午11:21
 */

namespace Five\Admin\Model\Table;

abstract class TableBase {
    public static function add($data) {
        return static::obj()->insert($data);
    }

    public static function update($arr_where, $arr_set) {
        return static::obj()->update($arr_where, $arr_set);
    }

    public static function getRow($arr_where, $is_master = false, $str_fields = '*') {
        return static::obj()->getWhereRow($arr_where, $is_master, $str_fields);
    }
    
    public static function getList($arr_where, $start, $length) {
        return static::obj()->getWhereList('*', $arr_where, [], [$start, $length]);
    }
    
    public static function getCount($arr_where) {
        return static::obj()->getWhereCount($arr_where);
    }

    protected static function obj(){
        eixt('请在子类中覆盖此方法');
    }
}
