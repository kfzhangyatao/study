<?php
/**
 * Created by PhpStorm.
 * User: zhangyatao
 * Date: 2017/9/18
 * Time: 17:30
 */
class Preferences{
    private $props = array();
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(){
        if(empty(self::$instance)){
            self::$instance = new Preferences();
        }
        return self::$instance;
    }

    public function setProperty($key, $val){
        $this->props[$key] = $val;
    }

    public function getProperty($key){
        return $this->props[$key];
    }
}

$pref = Preferences::getInstance();
$pref->setProperty("name", "val");

unset($pref);

$pref2 = Preferences::getInstance();
print_r($pref2->getInstance("name"));