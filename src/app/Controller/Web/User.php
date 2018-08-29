<?php

namespace Five\Admin\Controller\Web;

use Five\Admin\Model\Table\Admin\AdminUser;
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

    /**
     * @throws \Brick\Core\Exceptions\ViewException
     */
    public function addAction() {
        $form_inputs = [
            array(
                'name'     => 'en_name',
                'type'     => 'text',
                'title'    => '登录名',
                'note'     => '允许字符: 字母,数字和下划线',
                'readonly' => 0,
            ),
            array(
                'name'     => 'cn_name',
                'type'     => 'text',
                'title'    => '中文名',
                'note'     => '',
                'readonly' => 0,
            ),
            array(
                'name'     => 'email',
                'type'     => 'text',
                'title'    => 'Email',
                'note'     => '',
                'readonly' => 0,
            ),
            array(
                'name'     => 'pword',
                'type'     => 'password',
                'title'    => '密码',
                'note'     => '',
                'readonly' => 0,
            ),
            array(
                'name'     => 'pword1',
                'type'     => 'password',
                'title'    => '重新输入密码',
                'note'     => '',
                'readonly' => 0,
            ),
        ];
        
        $this->display('public_tpl/form_page.phtml', [
            'form_url'    => 'aj_add',
            'form_inputs' => $form_inputs,
            'form_data'   => [],
        ]);
    }

    public function aj_addAction() {
        $id      = $this->getParam('POST', 'id', 0);
        $cn_name = $this->getParam('POST', 'cn_name', '');
        $en_name = $this->getParam('POST', 'en_name', '');
        $email   = $this->getParam('POST', 'email', '');
        $pword   = $this->getParam('POST', 'pword',  '');
        $pword1  = $this->getParam('POST', 'pword1', '');
        
        if (!$cn_name || !$en_name || !$email || !$pword || !$pword1) {
            throw new \Exception('请完整填写信息', 1);
        }
        
        if ($pword != $pword1) {
            throw new \Exception('两次密码不一致', 2);
        }
        
        $data = [
            'cn_name' => $cn_name,
            'en_name' => $en_name,
            'email'   => $email,
            'pword'   => $pword,
        ];
        
        if ($id) {
            $ret = AdminUser::updateById($id, $data);
            if (!$ret) {
                throw new \Exception('修改失败', 3);
            }
        } else {
            $ret = AdminUser::add($data);
            if (!$ret) {
                throw new \Exception('新增失败', 3);
            }
        }
        
        $this->outputJson(0,'ok', []);
    }
}
