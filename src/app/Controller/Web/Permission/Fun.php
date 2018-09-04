<?php
/**
 *
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2018/8/29 下午11:14
 */

namespace Five\Admin\Controller\Web\Permission;

use Brick\Core\Exceptions\Exception;
use Five\Admin\Model\Table\Admin\AdminPFun;
use Five\Admin\Package\ControllerWeb;
use Five\DB\Util;

class Fun extends ControllerWeb {


    /**
     * @throws \Brick\Core\Exceptions\ViewException
     */
    public function listAction() {
        $list = AdminPFun::getTopMenu();
        array_unshift($list, array('title' => '顶级菜单', 'value' => 0));

        $form_inputs = [
            array(
                'name'     => 'id',
                'type'     => 'text',
                'title'    => 'ID',
                'note'     => '',
                'readonly' => 0,
            ),
            array(
                'name'     => 'name',
                'type'     => 'text',
                'title'    => '功能名称',
                'note'     => '',
                'readonly' => 0,
            ),
            array(
                'name'  => 'fid',
                'type'  => 'select',
                'title' => '所属菜单',
                'list'  => $list,
            ),
            array(
                'name'  => 'is_menu',
                'type'  => 'radio',
                'title' => '是否为菜单',
                'list'  => [
                    array('title' => '是', 'value' => 1),
                    array('title' => '否', 'value' => 0),
                ],
            ),
            array(
                'name'     => 'actions',
                'type'     => 'text',
                'title'    => '关键词',
                'note'     => "",
                'readonly' => 0,
            ),
        ];

        $this->display('public_tpl/table_page.phtml', [
            'form_url'   => 'aj_list',
            'form_chunk' => array_chunk($form_inputs, 3),
            'form_data'  => ['is_menu' => 1],
            'col_class'  => [
                'group' => 'col-xs-12 col-sm-4', //表单布局分几栏 1~4
                'label' => 'col-sm-5 col-md-5 col-lg-4',
                'input' => 'col-sm-7 col-md-7 col-lg-8',
            ],
        ]);
    }

    //请求列表数据
    public function aj_listAction() {
        list($arr_where, $format_arg) = $this->parseArgs();
        $page_per = 30;
        
        $item_num = AdminPFun::getCount($arr_where);
        $list = AdminPFun::getList($arr_where, floor($item_num/$page_per), $page_per);
        $arr_th = $this->format($list);
        
        $html = $this->getHtml('block/table.phtml', [
            'list' => $list,
            'arr_th' => $arr_th,
        ]);
        
        $this->outputJson(0, 'ok', $html);
    }
    
    protected function format(&$list) {
        $arr_th = [
            'id' => 'ID', //int(10) 主键
            'fid' => '父级ID', //int(10) 父级id
            'name' => '名称', //varchar(32) 名称
            'note' => '备注', //varchar(100) 描述注解
            'actions' => 'actions', //varchar(1000) 一行一个Action. 格式为: "class_name:action_name". class_name包含命名空间, action_name不包含"Action"后缀
            'is_menu' => '菜单', //tinyint(4) 是否为菜单：0否，1是
        ];
        
        return $arr_th;
    }
    
    protected function parseArgs() {
        $arr_conf = [
            'id' => ['id', '='],
            'name' => ['name', 'like', function($str){
                $str = trim($str);
                return "%{$str}%";
            }],
            'actions' => ['actions', 'like', function($str){
                $str = trim($str);
                return "%{$str}%";
            }],
            'fid' => ['fid', '='],
            'is_menu' => ['is_menu', '='],
        ];
        
        return Util::arg2SqlWhere($_GET, $arr_conf); 
    }

    /**
     * @throws \Brick\Core\Exceptions\ViewException
     */
    public function addAction() {
        $list = AdminPFun::getTopMenu();
        array_unshift($list, array('title' => '顶级菜单', 'value' => 0));

        $form_inputs = [
            array(
                'name'     => 'name',
                'type'     => 'text',
                'title'    => '功能名称',
                'note'     => '',
                'readonly' => 0,
            ),
            array(
                'name'  => 'fid',
                'type'  => 'select',
                'title' => '所属菜单',
                'list'  => $list,
            ),
            array(
                'name'  => 'is_menu',
                'type'  => 'radio',
                'title' => '是否为菜单',
                'list'  => [
                    array('title' => '是', 'value' => 1),
                    array('title' => '否', 'value' => 0),
                ],
            ),
            array(
                'name'     => 'note',
                'type'     => 'text',
                'title'    => '备注',
                'note'     => '最多100个字符',
                'readonly' => 0,
            ),
            array(
                'name'     => 'actions',
                'type'     => 'textarea',
                'title'    => 'Action列表',
                'note'     => "一行一个Action格式为: class_name:action_name \nclass_name包含命名空间, action_name不包含'Action'后缀\n例如:\nFive\Admin\Controller\Web\Permission\\fun:add",
                'readonly' => 0,
            ),
        ];

        $this->display('public_tpl/form_page.phtml', [
            'form_url'   => 'aj_save',
            'form_chunk' => array_chunk($form_inputs, 1),
            'form_data'  => ['is_menu' => 1],
            'col_class'  => [
                'group' => 'col-xs-12 col-sm-12', //表单布局分几栏 1~4
                'label' => 'col-sm-5 col-md-4 col-lg-3',
                'input' => 'col-sm-7 col-md-8 col-lg-9',
            ],
        ]);
    }

    /**
     * @throws \Brick\Core\Exceptions\Exception
     */
    public function aj_saveAction() {
        $id   = $this->getParam('POST', 'id', 0);
        $data = [
            'fid'     => $this->getParam('POST', 'fid', 0),
            'name'    => $this->getParam('POST', 'name', ''),
            'is_menu' => $this->getParam('POST', 'is_menu', ''),
            'note'    => $this->getParam('POST', 'note', ''),
            'actions' => $this->getParam('POST', 'actions', ''),
        ];

        if (!$data['name'] || ($data['fid'] && !$data['actions'])) {
            throw new \Exception('请完整填写信息', 1);
        }

        $arr_action = [];
        $arr_line   = explode("\n", $data['actions']);
        foreach ($arr_line as $l) {
            $l = trim($l);
            if (!$l) {
                continue;
            }
            list($class, $action) = explode(':', $l, 2);
            if (!is_callable([$class, $action . 'Action'])) {
                throw new Exception("action不存在: " . $l, 1);
            }
            $arr_action[] = $l;
        }
        $data['actions'] = implode("\n", $arr_action);

        if ($id) {
            $ret = AdminPFun::update(['id' => $id], $data);
            if (!$ret) {
                throw new Exception('修改失败', 1);
            }
        } else {
            $ret = AdminPFun::add($data);
            if (!$ret) {
                throw new Exception('新增失败', 2);
            }
        }

        $this->outputJson(0, 'ok', ['jump_url1' => 'list']);
    }
}
