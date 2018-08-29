<?php
namespace Five\Admin\Controller\Web;

use Five\Admin\Package\ControllerWeb;

/**
 * 用户管理
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2018/8/28 下午9:37
 */


class User extends ControllerWeb {
    public function loginAction() {
    }
    
    public function logout() {
    }
    
    public function addAction() {
        
        $this->display('user/add.phtml', []);
    }
    
    public function aj_addAction() {
    }
}
