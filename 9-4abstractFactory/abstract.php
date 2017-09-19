<?php
/**
 * Created by PhpStorm.
 * User: zhangyatao
 * Date: 2017/9/19
 * Time: 16:34
 */
abstract class CommsManager{
    const AppT  = 1;
    const TTD   = 2;
    const CONTACT = 3;
    abstract function getHeaderText();
    abstract function make($flag_int);
    abstract function getFooterText();
}
class BloggsCommsManager extends CommsManager{
    function getHeaderText(){
        return "BloggsCal header\n";
    }
    function make($flag_int){
        switch($flag_int){
            case self::AppT :
                return new BloggsApptEncoder();
            case self::CONTACT :
                return new BloggsContactEncoder();
            case self::TTD :
                return new BloggsTtdEncoder();
        }
    }
    function getFooterText(){
        return "BloggsCal footer\n";
    }
}