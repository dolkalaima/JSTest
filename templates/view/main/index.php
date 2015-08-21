<?php

include_once('/openserver/OpenServer/domains/project.my/models/auth.php');


?>
<HTML>
<HEAD>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='/templates/css/bootstrap.min.css' type='text/css' media='all'>
    <TITLE>Main page</TITLE>
</HEAD>
<BODY>
<div class="container">
<div class="row">
    <div class="col-sm-5"><br>
        <a class="btn btn-default" href="/templates/view/reporter/index.php"><img src="../../../imgs/ideja.png" title="Current question" ></a>
        <?php
        if ($auth->isAuth()) {
            echo('
        <a class="btn btn-default" href="/templates/view/admin/index.php"><img src="../../../imgs/statistika.png" title="Admin page" ></a>');
        }?>

    </div>
    <div class="col-sm-7"><br>
        <?php
        if ($auth->isAuth()) { // Если пользователь авторизован, приветствуем:
            echo "<p class='text-right'>Welcome, " . $auth->getLogin()."<a href='?is_exit=1'> Log out </a></p>" ;
            //Показываем кнопку выхода
        }
        else { //Если не авторизован, показываем форму ввода логина и пароля
        ?>
<form  class="form-inline" action="" method="post">
    <div class="form-group">
   <label for="login2">Login:</label>
    <input name="login" type="text" id="login2"  class="form-control" placeholder="Login"></div>
    <div class="form-group">
    <label for="password2">Password:</label>
    <input type="password" id="password2" name="password" class="form-control" placeholder="Password"></div>
    <button type="submit"  name="submit"  class="btn btn-success">Log in</button>
</form>
<?php
}
?></div>
    </div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <h1>Ask your question:</h1><hr></div>
    <div class="col-sm-4"></div></div>
    </div>
<div class="container">
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <FORM name="form1"  class="form-inline" action="/models/insert.php" method="post">
            <div class="form-group ">
                <input type="text" placeholder="Type the text…" class="form-control" name="textin" ></div>
            <input type="submit"  name="send" value="Send" class="btn btn-danger">
        </FORM><hr></div>
    <div class="col-sm-4"></div></div>
    </div>
</BODY>
</HTML>