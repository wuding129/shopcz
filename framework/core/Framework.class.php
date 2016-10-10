<?php

/**
 * Created by PhpStorm.
 * User: WuDing
 * Date: 2016/10/6
 * Time: 17:35
 */
class Framework
{
    // run方法
    /**
     * 静态方法可以通过类直接调用
     */
    public static function run(){
//        echo 'hello,world!!!';
        self::init();
        self::autoload();
        self::dispatch();
    }

    /**
     * 初始化方法
     */
    private static function init(){
        // 路径常量
        define("DS", DIRECTORY_SEPARATOR); //表示路径分隔符，不同系统符号可能不同，这样可以兼容所有系统
        define("ROOT",getcwd() . DS); //根路径define("ROOT",getcwd() . '/')
        define("APP_PATH", ROOT . "application" . DS);
        define("FRAMEWORK_PATH", ROOT . "framework" . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);
        define("CONFIG_PATH", ROOT . "config" . DS);
        define("CONTROLLER_PATH", ROOT . "controllers" . DS);
        define("MODEL_PATH", ROOT . "models" . DS);
        define("VIEW_PATH", ROOT . "views" . DS);
        define("CORE_PATH", ROOT . "config" . DS);
        define("DB_PATH", ROOT . "config" . DS);
        define("LIB_PATH", ROOT . "config" . DS);
        define("HELPER_PATH", ROOT . "config" . DS);
        define("UPLOAD_PATH", ROOT . "config" . DS);
        define("CSS_PATH ", ROOT . "config" . DS);
        //index.php?p=admin&c=goods&a=add  后台的GoodsController中的addAction
        define("PLATFORM", isset($_GET['p']) ? $_GET['p'] : "admin"); // isset判断是否存在，存在通过get获取
        define("CONTROLLER", isset($_GET['c']) ? ucfirst($_GET['c']) : "Index"); // ucfirst转换为大写首字母
        define("ACTION", isset($_GET['a']) ? $_GET['a'] : "index");
        define("CUR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);
        define("CUR_VIEW_PATH", VIEW_PATH . PLATFORM . DS);

    }

    /**
     * 路由分发，说白了就是实例化对象调用方法
     */
    private static function dispatch(){
        $controller_name = CONTROLLER . "Controller";
        $action_name = ACTION . "Action";
        //实例化对象
        $controller = new $controller_name();
        //调用方法
        $controller -> $action_name();

    }

    /**
     * 自动载入
     * 先有载入才能实例化controller对象，进行路由分发
     *
     * __autoload与这里的是一回事吗？？？不是，__autoload只是一个内置魔术函数
     */
    private static function autoload(){

    }
}