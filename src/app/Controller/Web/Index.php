<?php
namespace Five\Admin\Controller\Web;

use Five\Admin\Package\ControllerWeb;

/**
 *
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2017/12/14 下午10:17
 */

class Index extends ControllerWeb {

    /**
     * @throws \Brick\Core\Exceptions\ViewException
     */
    public function indexAction() {
        $this->display('index/index.phtml', [
            'date' => date('Y-m-d H:i:s'),
        ]);
    }
}