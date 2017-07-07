<?php
class message{
    public $name;   //留言者姓名
    public $email;  //留言者联系方式
    public $content;    //留言内容
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        if(!isset($this->$name)){
            $this->$name = NULL;
        }
    }
}