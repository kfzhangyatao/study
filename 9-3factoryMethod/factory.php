<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 2017/9/19
 * Time: 8:21
 */
abstract class AppEncoder{
    abstract function encode();
}

class BloggsApptEncoder extends AppEncoder{
    function encode()
    {
        // TODO: Implement encode() method.
        return "Appointment data encode in BloggsCal format\n";
    }
}

abstract class CommsManager{
    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getFooterText();
}

class BloggsCommsManager extends CommsManager{
    function getHeaderText()
    {
        // TODO: Implement getHeaderText() method.
        return "BloggsCal header\n";
    }
    function getApptEncoder()
    {
        // TODO: Implement getApptEncoder() method.
        return new BloggsApptEncoder();
    }
    function getFooterText()
    {
        // TODO: Implement getFooterText() method.
        return "BloggsCal footer\n";
    }
}