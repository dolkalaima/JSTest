<?php
include_once('/openserver/OpenServer/domains/project.my/models/admin.php');
//include_once('/openserver/OpenServer/domains/project.my/templates/view/questions/index.php');

$VIEW = array(
    "questions" => get_all_questions()
);

foreach($VIEW['questions'] as $value) {
    if($value['status']==1)
    {
        echo(' <table class="table table-bordered"><tr class="info">
 <td>' . $value['text'] . '</td><td>'.$value['status'].'</td></tr></table>');
    }
    if($value['status']==2)
    {
        echo(' <table class="table table-bordered"><tr class="success">
 <td>' . $value['text'] .'</td><td>'.$value['status']. '</td></tr></table>');
    }
    if($value['status']==3)
    {
        echo(' <table class="table table-bordered"><tr class="active">
 <td>' . $value['text'] .'</td><td>'.$value['status']. '</td></tr></table>');
    }
    if($value['status']==4)
    {
        echo(' <table class="table table-bordered"><tr class="danger">
 <td>' . $value['text'] . '</td><td>'.$value['status'].'</td></tr></table>');
    }
}


