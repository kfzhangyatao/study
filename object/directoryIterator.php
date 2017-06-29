<?php
$dir = new DirectoryIterator(dirname(__FILE__));
echo dirname(__FILE__),PHP_EOL;
foreach($dir as $fileinfo){
    if(!$fileinfo->isDir()){
        echo $fileinfo->getFilename(),"\t",$fileinfo->getSize(),PHP_EOL;
    }
}