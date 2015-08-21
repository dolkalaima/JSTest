<?php
include_once('/openserver/OpenServer/domains/project.my/models/admin.php');


$VIEW = array(
    "questions" => get_questions()
);

foreach($VIEW['questions'] as $value)
{
    $deny =$value['id'].'1';
    $accept = $value['id'];

    if (isset($_POST[$deny]))
    {
        deny_question($value['id']);
        header('Location: http://project.my/templates/view/admin/index.php');
    }
    if (isset($_POST[$accept]))
    {
        accept_question($value['id']);
        header('Location: http://project.my/templates/view/admin/index.php');
    }

}