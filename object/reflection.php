<?php
class person{
    public $name;
    public $gender;
    public function say(){
        echo $this->name,"\tis",$this->gender,"\r\n";
    }
    public function __set($name, $value)
    {
        echo "Setting $name to $value \r\n";
        $this->$name=$value;
    }
    public function __get($name)
    {
        if(!isset($this->$name)){
            echo '未设置';
            $this->$name = "正在为你设置默认值";
        }
        return $this->$name;
    }
}
$student = new person();
$student->name = 'Tom';
$student->gender = 'male';
$student->age = 24;

//获取对象属性列表
$reflect = new ReflectionObject($student);
$props = $reflect->getProperties();
foreach($props as $porp){
    print $porp->getName()."\n";
}
//获取对象方法列表
$m = $reflect->getMethods();
foreach($m as $porp){
    print $porp->getName()."\n";
}

//返回对象属性的关联数组
var_dump(get_object_vars($student));
//返回由类的默认属性组成的数组
var_dump(get_class_vars(get_class($student)));
//返回由类的方法名组成的数组
var_dump(get_class_methods(get_class($student)));

//反射获取类的原型
$obj = new ReflectionClass('person');
$className = $obj->getName();
$Methods = $Properties = array();
foreach($obj->getProperties() as $v){
    $Properties[$v->getName()] = $v;
}
foreach($obj->getMethods() as $v){
    $Methods[$v->getName()] = $v;
}
echo "class {$className}\n{\n";
is_array($Properties) && ksort($Properties);

foreach($Properties as $k => $v){
    echo "\t";
    echo $v->isPublic() ? ' public' :  '',$v->isPrivate() ? ' private' : '',$v->isProtected() ? ' protected' : '',$v->isStatic() ? ' static' : '';
    echo "\t{$k}\n";
}
echo "\n";
if(is_array($Methods)) ksort($Methods);
foreach($Methods as $k => $v){
    echo "\tfunction {$k}(){}\n";
}
echo "}\n";