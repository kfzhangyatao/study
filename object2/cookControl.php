<?php
include_once 'cook.php';
include_once 'Command.php';
class cookControl{
    private $mealcommand;
    private $drinkcommand;
    //将命令发送者绑定到命令接收器上面来
    public function addCommand(Command $mealcommand, Command $drinkcommand){
        $this->mealcommand = $mealcommand;
        $this->drinkcommand = $drinkcommand;
    }

    public function callmeal(){
        $this->mealcommand->execute();
    }
    public function calldrink(){
        $this->drinkcommand->execute();
    }
}

$control = new cookControl();
$cook = new cook();
$mealcommand = new MealCommand($cook);
$drinkcommand = new DrinkCommand($cook);
$control->addCommand($mealcommand, $drinkcommand);
$control->callmeal();
$control->calldrink();