<?php
include_once('/openserver/OpenServer/domains/project.my/libs/db.php');
db_connect('127.0.0.1','questions','root','');

//$data = array(
  //  'text' => $_POST['textin'],
   // 'status' => 1);
//
//$query = "select * from questions";
//print_r(db_to_array($query));
$text = $_POST['textin'];
//print_r($text);

if(mysql_query("INSERT INTO  questions.question (id ,text ,status) VALUES (NULL , '".$text ."' ,  '1')"))
{
    header('Location: /');
    include_once('/openserver/OpenServer/domains/project.my/templates/view/ask/ask_confirm.php');
//    include_once('/openserver/OpenServer/domains/project.my/index.php');


}




