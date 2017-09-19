<?php
/**
 * Created by PhpStorm.
 * User: zhangyatao
 * Date: 2017/9/19
 * Time: 17:57
 */
class Sea{}
class EarthSea extends Sea{}
class MarsSea extends Sea{}

class Plains{}
class EarthPlains extends Plains{}
class MarsPlains extends Plains{}

class Forest{
    public $type = 1;

}
class EarthForest extends Forest{}
class MarsForest extends Forest{}

class TerrainFactory{
    private $sea;
    private $forest;
    private $plains;

    function __construct(Sea $sea, Plains $plains, Forest $forest)
    {
        $this->sea = $sea;
        $this->plains = $plains;
        $this->forest = $forest;
    }
    function getSea(){
        return clone $this->sea;
    }
    function getPlains(){
        return clone $this->plains;
    }
    function getForest(){
        return clone $this->forest;
    }
    function setForest(){
        $this->forest->type = 2;
    }

    function __clone()
    {
        // TODO: Implement __clone() method.
        // 确保被克隆的对象持有的是对象的克隆而非引用
        $this->forest = new Forest();
    }

}

$factory = new TerrainFactory(new EarthSea(), new Plains(), new Forest());
print_r($factory->getSea());
print_r($factory->getPlains());
print_r($factory->getForest());
$factory->setForest();
$factory1 = clone $factory;
print_r($factory1->getForest());
