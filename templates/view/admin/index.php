<?php

include_once('/openserver/OpenServer/domains/project.my/models/auth.php');


if ($auth->isAuth()) { // ≈сли пользователь авторизован, приветствуем:
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' href='/templates/css/bootstrap.min.css' type='text/css' media='all'>
    <meta charset="UTF-8">
    <title>Admin page</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <br><a class="btn btn-default" href="/templates/view/reporter/index.php"><img src="../../../imgs/ideja.png" title="Current question" ></a>
            <a class="btn btn-default" href="/templates/view/main/index.php"><img src="../../../imgs/almaz.png" title="Main" ></a>
            </div>
        <div class="col-sm-6">
            <?php

                echo "<br><p class='text-right'>Welcome, admin<a href='?is_exit=1'> Log out </a></p>" ;

            ?>
            </div>
    </div>
<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                <h1><p class="text-center">Current question:</p></h1><hr>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
        <?
        include_once('/openserver/OpenServer/domains/project.my/models/reporter.php');
        include_once('/openserver/OpenServer/domains/project.my/models/admin.php');
        $current_q = get_question_for_reporter();
        echo('<form action="/models/answered.php" method="POST" class="form-inline" >
                '.$current_q['text'].'
                <input type="submit"  name="send" value="Answer" class="btn btn-primary"></form>');
        ?><hr></div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3><p class="text-center">Moderated questions:</p></h3><hr>
            </div>
            </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?
                include_once('/openserver/OpenServer/domains/project.my/models/admin.php');
                $VIEW = array(
                    "questions" => get_questions()
                );
                foreach($VIEW['questions'] as $value)
                {

                        echo('<form action="/models/status.php" method="POST"><table><tr>
        <td>' . $value['text'] . '</td>
        <td  width="30%"><input type="submit" name="'.$value['id'].'" value="Accept" class="btn btn-success"/></td>
        <td  width="30%"><input type="submit" name="'.$value['id'].'1" value="Decline" class="btn btn-danger"/></td></tr></table></form><br><br>');
                     }
                ?>
            </div>
            <div class="col-sm-3"></div>
            </div>
          </div>

    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12"><h1><p class="text-center">All questions:</p></h1><hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                    <?
                    include_once('/openserver/OpenServer/domains/project.my/models/admin.php');
                    //    include_once('/openserver/OpenServer/domains/project.my/templates/view/questions/index.php');

                    $VIEW = array(
                        "questions" => get_all_questions()
                    );


                echo(' <table class="table table-bordered">
                         <thead>
                                <tr>
                                <th>Question</th>
                                <th width="30%">Status</th>

                                 </tr>
                            </thead>
                            </table>');

                    foreach($VIEW['questions'] as $value) {
                        if($value['status']==1)
                        {
                            echo(' <table class="table table-bordered"><tr class="info">
 <td>' . $value['text'] . '</td><td width="30%">Moderated</td></tr></table>');
                        }
                        if($value['status']==2)
                        {
                            echo(' <table class="table table-bordered"><tr class="success">
 <td>' . $value['text'] .'</td><td width="30%">Accepted</td></tr></table>');
                        }
                        if($value['status']==3)
                        {
                            echo(' <table class="table table-bordered"><tr class="active">
 <td>' . $value['text'] .'</td><td width="30%">Archived</td></tr></table>');
                        }
                        if($value['status']==4)
                        {
                            echo(' <table class="table table-bordered"><tr class="danger">
 <td>' . $value['text'] . '</td><td width="30%">Declined</td></tr></table>');
                        }
                    }
                    ?>
                </div>
            <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

<?php

    }
    else { //≈сли не авторизован, показываем форму ввода логина и парол€

        header('Location: http://project.my/templates/view/main/index.php');
    }
    ?>