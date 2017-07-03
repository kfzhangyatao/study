<?php
include_once 'Db_Adapter.php';
/**
 * Class Db_Adapter_Mysql   Mysql数据库操作类
 */
class Db_Adapter_Mysql implements Db_Adapter{
    private $_dbLink;   //数据库连接字符串标示

    /**
     * @param 数据库配置 $config
     * @return resource
     * @throws Db_Exception
     */
    public function connect($config)
    {
        if($this->_dbLink = @mysql_connect($config->host.(empty($config->port) ? '' : ':' .$config->port),$config->user,$config->password,true)){
            if(@mysql_select_db($config->database, $this->_dbLink)){
                if($config->charset){
                    mysql_query("SET NAMES '{$config->charset}'", $this->_dbLink);
                }
                return $this->_dbLink;
            }
        }
        /** 数据库异常 */
        throw new Db_Exception(@mysql_error($this->_dbLink));
    }

    /**
     * @param 数据库查询SQL字符串 $query
     * @param 连接对象 $handle
     * @return resource
     */
    public function query($query, $handle)
    {
        if($resoure = @mysql_query($query, $handle)){
            return $resoure;
        }
    }
}