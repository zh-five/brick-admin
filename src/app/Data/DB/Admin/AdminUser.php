<?php
/**
 * 数据表操作类, admin.admin_user
 *
 * @author        自动生成
 * @datetime      2018-08-29 14:55:23
 */
namespace Five\Admin\Data\DB\Admin;

use Five\Admin\Data\DB\DBFactory;
use Five\Admin\Data\DB\TableBase;


class AdminUser extends TableBase {

    /**
     * User constructor.
     * @throws \Five\DB\DBException
     */
    public function __construct() {
        parent::__construct(DBFactory::DB_ADMIN, 'admin_user');
    }
}