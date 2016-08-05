<?php
return array(
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'newssys',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'news_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

   /* 模块*/
    'MODULE_ALLOW_LIST'     =>  array('Home','Admin'),
    'DEFAULT_MODULE'        =>  'Home',

    /*布局*/
    'LAYOUT_ON'             =>  true, // 是否启用布局
    'LAYOUT_NAME'           =>  'layout', // 当前布局名称 默认为layout

    /*其他设置*/
    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    'TOKEN_ON'              =>  true,  // 开启令牌验证
    'DEFAULT_FILTER'        =>  'htmlspecialchars,trim', // 默认参数过滤方法 用于I函数...
    // 'SHOW_PAGE_TRACE'       =>  true,   //显示调试信息
);