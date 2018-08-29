<?php
/**
 * 错误处理
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2017/12/15 上午9:58
 */

namespace Five\Admin\Package;

use Brick\App;

class Handler {

    /**
     * 错误处理
     * @param \Exception $e
     */
    public static function error(\Exception $e) {
        $req = App::getInstance()->getRequest();
        
        $action_name = $req->getActionName();
        if ('aj_' === substr($action_name, 0, 3)) {
            header('Content-type: application/json');
            echo json_encode([
                'code' => $e->getCode(),
                'msg'  => $e->getMessage(),
            ]);
        } else {
            print_r($e);
        }

    }
}