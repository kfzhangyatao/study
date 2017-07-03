<?php
include_once 'Db_Adapter.php';
/**
 * Class Db_Adapter_sqlite  SQLite数据库得操作类
 */
class Db_Adapter_sqlite implements Db_Adapter{
    private $_dbLink;   //数据库连接字符串标示

    /**
     * @param 数据库配置 $config
     * @return resource
     * @throws Db_Exception
     */
    public function connect($config)
    {
        if($this->_dbLink = sqlite_open($config->file, 0666, $error)){
            return $this->_dbLink;
        }
        /** 数据库异常 */
        throw new Db_Exception($error);
    }

    /**
     * @param 数据库查询SQL字符串 $query
     * @param 连接对象 $handle
     * @return resource
     */
    public function query($query, $handle)
    {
        if($resource = @sqlite_query($query, $handle)){
            return $resource;
        }
    }
}
