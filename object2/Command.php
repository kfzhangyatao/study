<?php
/**
 * Class DrinkCommand   模拟服务员与厨师得过程
 */
class MealCommand implements Command{
    private $cook;
    // 绑定命令接受者
    public function __construct(cook $cook)
    {
        $this->cook = $cook;
    }
    public function execute()
    {
        $this->cook->meal();    //把消息传递给厨师，让厨师做饭，下同
    }
}
class DrinkCommand implements Command{
    private $cook;
    //绑定命令接受者
    public function __construct(cook $cook)
    {
        $this->cook = $cook;
    }
    public function execute()
    {
        $this->cook->drink();
    }
}
