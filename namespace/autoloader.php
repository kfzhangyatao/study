<?php

/**
 * Created by PhpStorm.
 * User: zhangyatao
 * Date: 2017/9/12
 * Time: 17:04
 */
function loadClass($className) {
    $fileName = '';
    $namespace = '';

    // Sets the include path as the "src" directory
    $includePath = dirname(__FILE__).DIRECTORY_SEPARATOR.'src';
    //echo $includePath;

    if (false !== ($lastNsPos = strripos($className, '\\'))) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    $fullFileName = $includePath . DIRECTORY_SEPARATOR . $fileName;
    echo $fullFileName;

    if (file_exists($fullFileName)) {
        require $fullFileName;
    } else {
        echo 'Class "'.$className.'" does not exist.';
    }
}
spl_autoload_register('loadClass'); // Registers the autoloader