<?php


namespace App\SBlog\Core;


class BlogApp
{
    public static $app;

    public function get_inctance(){
        self::$app = Registry::instance();
        self::getParams();
        return self::$app;
    }

    protected static function getParams(){
        $params = require CONF . '/params.php';

        if(!empty($params)){
            foreach ($params as $key => $value){
                self::$app->setProperty($key, $value);
            }
        }
    }
}
