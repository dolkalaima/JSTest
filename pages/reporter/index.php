<?php
include_once('/openserver/OpenServer/domains/project.my/models/reporter.php');
include_once('/openserver/OpenServer/domains/project.my/models/admin.php');

//include_once('/openserver/OpenServer/domains/project.my/templates/view/reporter/index.php');

//$VIEW = array(
 //   "questions" => get_questions()
//);

$current_q = get_question_for_reporter();
echo('<h1><p class="text-center">'.$current_q['text'].'</p></h1>');
$CURRENT_Q_ID = $current_q['id'];
/*foreach($VIEW['questions'] as $value)
{
    //print_r($value);
}*/

