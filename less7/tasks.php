<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"><title>TODO on Functions</title>
    <link rel="stylesheet" href="mainstyle.css">
</head>
<body><div class="canvas">

<?php
require_once "functions.php";

$user=checkData (); //Проверка метода запроса и наличия ввода данных -> получаем введенный логин пароль юзера в массиве
$user['login']=userValidator($user['login'],$user['password']); //Проверка введенных данных логин/пароль
list($todoList,$nTodoList)=getUserTodolist($user['login']); //Получаем список дел для данного пользователя
                                                            // и порядковый номер этого списка в базе
$todoSize=count($todoList); $i=0;
?>

<div class="sub sub2 usercard">
    <img src="img/userava/male/ava_male_2.png">
    <div>
        <h1>Добро пожаловать <?php echo $user['login']?></h1>
        <hr>
        <p>Доступ к списку "TODO" получен </p>
    </div>
    <div class="clr"></div>
</div>

<h2><?php echo $todoList[0];?></h2><!--Список задач-->

<form class="frm sub sub3" action="todolist.php" method="post">
    <h4>Форма завершенных задач</h4>
    <?php      while(++$i<=$todoSize-1){ ?>
    <div class="checkblock">
        <label><?php echo $todoList[$i];?></label>
        <input type="checkbox" name=todo[<?php echo $i;?>] value="<?php echo $todoList[$i];?>">
        <div class="clr"></div>
    </div>
        <input type="hidden" name="user" value="<?php echo $user['login'];?>">
        <input type="hidden" name="nlist" value="<?php echo $nTodoList;?>">
    <?php    }?>
    <div class="lastbut"><button type="submit" class="butsub">ОТПРАВИТЬ</button></div>
</form>



</div></body></html>
