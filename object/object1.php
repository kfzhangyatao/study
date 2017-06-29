<?php
/**
* 对象的“形”
*/
class person
{
	
	public $name;
	public $gender;
	public function say(){
		echo $this->name,"is",$this->gender;
	}
}

/**
* 对象与类
*/
class family
{
	
	public $people;
	public $location;
	public function __construct($p, $loc){
		$this->people = $p;
		$this->location = $loc;
	}
}

$student = new person();
$student->name = 'Tom';
$student->gender = 'male';
$student->say();
// $teacher = new person();
// $teacher->name = 'Kate';
// $teacher->gender = 'female';
// $teacher->say();

// print_r((array)$student);
// var_dump($student);

// $str = serialize($student);
// echo $str;
// file_put_contents('store.txt', $str);

// $str = file_get_contents('store.txt');
// $student = unserialize($str);

// $student->say();

$tom = new family($student, 'peking');
echo serialize($student);

$student_arr = array('name'=>'Tom', 'gender'=>'male');
echo "\n";
echo serialize($student_arr);
print_r($tom);
echo "\n";
echo serialize($tom);

echo $tom->people->say();