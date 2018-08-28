<?php

namespace Five\Admin\Package;

use Brick\App;
use Brick\Core\ControllerAbstract;

/**
 * package公共controller基类
 *
 */
class Controller extends ControllerAbstract {

    /**
     * 在action被执行前调用
     */
    public function init() {


    }

    /**
     * 获取请求参数
     *
     * @param string $type    类型, GET,POST,EXT(从url里扩展出来的特殊参数)
     * @param string $name    参数名称
     * @param null   $default 若不存在时的默认值
     *
     * @return mixed
     * @throws \Brick\Core\Exceptions\Exception
     */
    protected function getParam($type, $name = null, $default = null) {
        return App::getInstance()->getRequest()->getParam($type, $name, $default);
    }

    /**
     * 输出json
     *
     * @param int    $code 错误码
     * @param string $msg  信息
     * @param array  $data 而外数据
     *
     * @throws \Brick\Core\Exceptions\Exception
     */
    protected function outputJson($code, $msg, $data = null) {
        $json = [
            'code' => $code,
            'msg'  => $msg,
        ];
        !is_null($data) && $json['data'] = $data;
        
        //是否格式化json
        $pretty = $this->getParam('GET', 'pretty', 0) ? JSON_PRETTY_PRINT : 0;

        echo json_encode($json, JSON_UNESCAPED_UNICODE|$pretty);
    }
}