<?php
/**
 * Class sqlFactory 定义一个工厂类
 */
class sqlFactory{
    public static function factory($type){
        if(include_once 'Drivers/'.$type.'.php'){
            $classname = 'Db_Adapter_'.$type;
            return new $classname;
        }else{
            throw new Exception('Driver not found');
        }
    }
}

$db = sqlFactory::factory('MySQL');

//$db = sqlFactory::factory('SQLite');