<?php
/**
 *
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2018/8/29 下午10:31
 */

namespace Five\Admin\Controller\Web;

use Five\Admin\Data\Admin\AdminUser;
use Five\Admin\Package\ControllerWeb;

class Demo extends ControllerWeb{
    public function testAction() {
        echo '<xmp>';
        
        echo `pwd`;
    }
}
