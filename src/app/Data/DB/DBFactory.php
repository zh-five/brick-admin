<?php
/**
 * DB工厂类
 *
 * @author        自动生成
 * @datetime      2018-08-29 14:55:23
 */

namespace Five\Admin\Data\DB;

class DBFactory extends \Five\DB\DBFactoryAbstract {
    const DB_ADMIN = 'admin';



    /**
     * 覆盖父类方法返回正确的配置文件路径
     * @return string
     */
    protected static function getConfFile() {
        return __DIR__.'/../../conf/db.conf.php';
    }
}