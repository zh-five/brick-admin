<?php
/**
 *
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2017/12/24 上午12:27
 */

return [
    //db_flag => db_info
    'admin' => [
        //'write_host' => 'docker.for.mac.host.internal', //mac 下默认的宿主机地址
        'write_host' => 'docker-host',
        'arr_read_host'  => [],
        'database'   => 'brick_admin',
        'username'   => 'root',
        'password'   => 'xiaowu123',
        'charset'    => 'utf8',
        'port'       => '3306',
    ],
//    'shop_product' => [
//        'write_host' => '192.168.6.33',
//        'arr_read_host'  => [],
//        'database'   => 'shop_product',
//        'username'   => 'root',
//        'password'   => '',
//        'charset'    => 'utf8',
//        'port'       => '3306',
//    ],
];
