<?php
/**
* __set和__get方法
*/
class Account
{
	
	private $user = 1;
	private $pwd = 2;
	protected $name;

	public function __set($name, $value){
		echo "Setting $name to $value \n";
		$this->$name = $value;
	}

	public function __get($name){
		if (!isset($this->$name)) {
			echo "设置\n";
			$this->$name = "正在为你设置默认值\n";
		}
		return $this->$name;
	}

	public function __call($name, $arguments){
		switch (count($arguments)) {
			case 2:
				echo $arguments[0]*$arguments[1],PHP_EOL;
				break;
			case 3:
				echo array_sum($arguments),PHP_EOL;
				break;
			
			default:
				echo '参数不对',PHP_EOL;
				break;
		}
	}
}

$a = new Account();
// echo $a->user."\n";
// $a->name = 5;
// echo $a->name;
//echo $a->name."\n";
//echo $a->big."\n";

$a->make(5);
$a->make(5,6);

print_r(get_defined_constants());

