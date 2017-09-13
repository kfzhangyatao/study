<?php
include_once 'message.php';
include_once 'leaveModel.php';
include_once 'gbookModel.php';
class authorControl{
    public function message(leaveModel $l, gbookModel $g, message $data){
        // 在留言本上留言
        $l->write($g, $data);
    }
    public function view(gbookModel $g){
        // 查看留言本内容
        return $g->read();
    }
    public function delete(gbookModel $g){
        $g->delete();
        echo self::view($g);
    }
}

$message = new message;
$message->name = 'phper';
$message->email = 'phper@php.net';
$message->content = 'a crazy phper love php so much.';
$gb = new authorControl();  //新建一个留言本相关的控制器
$pen = new leaveModel();    //拿出笔
$book = new gbookModel();   //翻出笔记本
$book->setBookPath("d:project/study/object2/message/a.txt");
$gb->message($pen,$book,$message);
echo $gb->view($book);