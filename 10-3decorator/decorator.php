<?php
/**
 * Created by PhpStorm.
 * User: zhangyatao
 * Date: 2017/9/21
 * Time: 17:45
 */
class RequestHelper{}

/**
 * Class ProcessRequest 抽象基类
 */
abstract class ProcessRequest{
    abstract function process(RequestHelper $requestHelper);
}

/**
 * Class MainProcess 具体的组件
 */
class MainProcess extends ProcessRequest{
    function process(RequestHelper $requestHelper)
    {
        // TODO: Implement process() method.
        print __CLASS__.": doing something useful with request\n";
    }
}

/**
 * Class DecorateProcess 抽象装饰类
 */
abstract class DecorateProcess extends ProcessRequest{
    protected $processrequest;
    function __construct( ProcessRequest $processRequest)
    {
        $this->processrequest = $processRequest;
    }
}

/**
 *  具体装饰类
 */

class LogRequest extends DecorateProcess{
    function process(RequestHelper $requestHelper)
    {
        // TODO: Implement process() method.
        print __CLASS__.": logging request\n";
        $this->processrequest->process($requestHelper);
    }
}

class AuthenticateRequest extends DecorateProcess{
    function process(RequestHelper $requestHelper)
    {
        // TODO: Implement process() method.
        print __CLASS__.": authenticate request\n";
        $this->processrequest->process($requestHelper);
    }
}

class StructureRequest extends DecorateProcess{
    function process(RequestHelper $requestHelper)
    {
        // TODO: Implement process() method.
        print __CLASS__.": structure request data\n";
        $this->processrequest->process($requestHelper);
    }
}

$process = new AuthenticateRequest( new StructureRequest( new LogRequest( new MainProcess())));
$process->process( new RequestHelper());
