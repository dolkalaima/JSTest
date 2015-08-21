<?php

include_once('/openserver/OpenServer/domains/project.my/models/auth.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='/templates/css/bootstrap.min.css' type='text/css' media='all'>
    <title>Current question</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6"><br>
           <a class="btn btn-default" href="/templates/view/main/index.php"><img src="../../../imgs/almaz.png" title="Main" ></a>
            <?php
            if ($auth->isAuth()) {
                echo('
        <a class="btn btn-default" href="/templates/view/admin/index.php"><img src="../../../imgs/statistika.png" title="Admin page" ></a>');
            }?>
        </div>
        <div class="col-sm-6"><br>
            <?php
            if ($auth->isAuth()) { // Если пользователь авторизован, приветствуем:
                echo "<p class='text-right'>Welcome, " . $auth->getLogin()."<a href='?is_exit=1'> Log out </a></p>" ;
                //Показываем кнопку выхода
            }
            else { //Если не авторизован, показываем форму ввода логина и пароля
                ?>
                <form  class="form-inline" action="" method="post">
                    <div class="form-group">
                        Login:
                        <input name="login" type="text"  class="input-sm" placeholder="Login"></div>
                    <div class="form-group">
                        Password:
                        <input type="password"  name="password" class="input-sm" placeholder="Password"></div>
                    <input type="submit"  name="submit" value="Log in" class="btn btn-success">
                </form>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 vcenter">
            <h1><p class="text-center">Current question:</p></h1><hr>
            </div>
        </div>
<div class="row">
    <div class="col-md-12 col-sm-12 vcenter">
<?
include_once('/openserver/OpenServer/domains/project.my/models/reporter.php');
$current_q = get_question_for_reporter();
echo('<h3><p class="text-center">'.$current_q['text'].'</p></h3>');
?>
        </div>
       </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 vcenter">
            <h1><p class="text-center">Next questions:</p></h1><hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <?
            $VIEW = array(
                "questions" => get_questions_for_reporter()
            );

            foreach($VIEW['questions'] as $value) {
                if($value['id']!=$current_q['id'])
                {
                    echo(' <table class="table table-bordered"><tr class="active">
 <td>' . $value['text'] . '</td></tr></table>');
                }
            }
            ?>
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>