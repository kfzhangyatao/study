<?php

/**
 * Class cook   厨师类，命令接受者与执行者
 */
class cook{
    public function meal(){
        echo '番茄炒鸡蛋',PHP_EOL;
    }
    public function drink(){
        echo '紫菜蛋花汤',PHP_EOL;
    }
    public function ok(){
        echo '完毕',PHP_EOL;
    }
}

//然后是命令接口
interface Command{
    //命令接口
    public function execute();
}