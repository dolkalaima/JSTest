<?php
include_once('/openserver/OpenServer/domains/project.my/models/reporter.php');
include_once('/openserver/OpenServer/domains/project.my/models/admin.php');
db_connect('127.0.0.1','questions','root','');

$current_q = get_question_for_reporter();
$CURRENT_Q_ID = $current_q['id'];
answer_question($CURRENT_Q_ID);
header('Location: http://project.my/templates/view/admin/index.php');