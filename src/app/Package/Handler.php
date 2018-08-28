<?php
/**
 * 错误处理
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2017/12/15 上午9:58
 */

namespace Five\Admin\Package;


class Handler {

    public static function error($e) {
        echo "package\n";
        print_r($e);
    }
}