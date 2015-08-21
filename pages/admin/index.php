<?php
include_once('/openserver/OpenServer/domains/project.my/models/admin.php');

/*
$VIEW = array(
    "questions" => get_questions()
);
foreach($VIEW['questions'] as $value)
{

  if($value['status']==1)
  {

      echo('<form action="/models/status.php" method="POST"><tr>
        <td>' . $value['text'] . '</td>
        <td><input type="submit" name="Accept[' . $value['id'] . ']" value="Accept" class="btn btn-success"/></td>
        <td><input type="submit" name="Decline[' . $value['id'] . ']" value="Deny" class="btn btn-danger"/></td></tr></form><br><br>');
  }

}
*/

//print ("<pre>");
//print_r($VIEW);

include_once('/openserver/OpenServer/domains/project.my/models/auth.php');


if ($auth->isAuth()) { // ≈сли пользователь авторизован, приветствуем:
    header('Location: http://project.my/templates/view/admin/index.php');
}
else { //≈сли не авторизован, показываем форму ввода логина и парол€

    header('Location: http://project.my/templates/view/main/index.php');
}
