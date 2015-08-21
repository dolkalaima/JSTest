<?php
include_once('/openserver/OpenServer/domains/project.my/libs/db.php');
db_connect('127.0.0.1','questions','root','');

function get_question_for_reporter()
{
    $query = "select * from question where status = 2";
    $result = db_row($query);
    //print_r($result);
    return $result;
}
function get_questions_for_reporter()
{
    $query = "select * from question where status = 2";
    $result = db_to_array($query);
    //print_r($result);
    return $result;
}