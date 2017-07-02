<?php
function customError($errno,$errstr,$errfile,$errline){
    echo "<b>错误代码：</b>[$errno] ${errstr}\r\n";
    echo "错误所在的代码行：{$errline} 文件{$errfile}\r\n";
    echo "PHP版本",PHP_VERSION,"(",PHP_OS,")\r\n";
    //die();
}
set_error_handler("customError",E_ALL|E_STRICT);
$a = array('o'=>2,4,6,8);
echo $a[o];