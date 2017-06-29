<?php
class StringManage{
    public $args;

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        if (!isset($this->$name)) {
            $this->$name = "正在为你设置默认值\n";
        }
        return $this->$name;
    }

    public function __call($callback, $args){
        if(!isset($args[0])){
            $args[0] = $this->args;
        }
        $this->callback = $callback;
        $this->args = call_user_func($callback, $args[0]);
        return $this;
    }
}

$string = new StringManage();
$string->args = '       ddd  ';
$str = $string->trim()->strlen();
echo $str->args;