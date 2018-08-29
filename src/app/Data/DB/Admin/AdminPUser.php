<?php
/**
 * 数据表操作类, admin.admin_p_user
 *
 * @author        自动生成
 * @datetime      2018-08-29 15:29:17
 */
namespace Five\Admin\Data\DB\Admin;

use Five\Admin\Data\DB\DBFactory;
use Five\Admin\Data\DB\TableBase;


class AdminPUser extends TableBase {

    /**
     * User constructor.
     * @throws \Five\DB\DBException
     */
    public function __construct() {
        parent::__construct(DBFactory::DB_ADMIN, 'admin_p_user');
    }
}