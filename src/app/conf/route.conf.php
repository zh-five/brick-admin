<?php



/**
 * 路由规则
 *
 * @author        肖武 <five@v5ip.com>
 * @datetime      2017/12/8 下午10:35
 */

return [
    //通用域名规则. 1.无精确域名命中时,使用此规则; 2.cli运行一定使用此规则
    '*' => [
        //命名空间映射
        'namespace' => [
            '/web' => '\\Five\\Admin\\Controller\\Web',
            '/cli' => '\\Five\\Admin\\Controller\\Cli',
        ],

        'class' => [

        ],

        'action' => [

        ],
    ],
    //精确域名配置.若端口不为80时,需加上端口号, 如: 'blog.v5ip.com:8088'
    'api.xxx.com' => [
        'namespace' => [
            '/api' => '\\Five\\Admin\\Api',
        ],
    ],
    
];