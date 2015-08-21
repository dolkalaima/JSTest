<?php
include_once('/openserver/OpenServer/domains/project.my/libs/db.php');
function get_questions()
{
    $query = "select * from question where status = 1";
    $result = db_to_array($query);
    return $result;
}

function get_all_questions()
{
    $query = "select * from question";
    $result = db_to_array($query);
    return $result;
}


function accept_question($q_id)
{
    $update = array(
        "status" => 2
    );
    db_update('question', $update, (int)$q_id);
}

function deny_question($q_id)
{
    $update = array(
        "status" => 4
    );
    db_update('question', $update, (int)$q_id);
}

function answer_question($q_id)
{
    $update = array(
        "status" => 3
    );
    db_update('question', $update, (int)$q_id);
}