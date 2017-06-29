<?php
/**
 * __toString
 */
class Account
{

    private $user = 1;
    private $pwd = 2;

    public function __toString()
    {
        return "当前对象的用户名是{$this->user}，密码是{$this->pwd}";
    }
}

$a = new Account();
echo $a.PHP_EOL;
print_r($a);