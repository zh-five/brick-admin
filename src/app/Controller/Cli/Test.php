<?php
namespace Five\Admin\Controller\Cli;

use Five\Admin\Package\ControllerCli;

/**
 * 
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2017/12/6 下午10:32
 */

class Test extends ControllerCli {


    /**
     *
     * cmd: php public/index.php 'cli/test/test/-/id/1?type=get' 'type=post'
     *
     * @throws \Brick\Core\Exceptions\Exception
     */
    function testAction() {
        $type = 'GET';
        echo "全部{$type}参数\n";
        print_r($this->getParam($type));
        echo "{$type}参数里面的type值:", $this->getParam($type, 'type', $type.'默认值'), "\n\n";

        $type = 'POST';
        echo "全部{$type}参数\n";
        print_r($this->getParam($type));
        echo "{$type}参数里面的type值:", $this->getParam($type, 'type', $type.'默认值'), "\n\n";

        $type = 'EXT';
        echo "全部{$type}参数\n";
        print_r($this->getParam($type));
        echo "{$type}参数里面的type值:", $this->getParam($type, 'type', $type.'默认值'), "\n\n";
    }
    
    
}


