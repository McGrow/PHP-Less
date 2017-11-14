
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"><title>TODO on Functions</title>
    <link rel="stylesheet" href="mainstyle.css">
</head>
<body><div class="canvas">

<?php
require_once "functions.php";

if (!isset($_POST['user']) ||
    !isset($_POST['nlist'])||
    !isset($_POST['todo'])){
    mes("Что-то пошло не так. 
         Пройдите авторизацию с начачла <a href=".SHOST."> >> на ЄТОЙ странице >></a>","red");
    die();
}
$todo=$_POST['todo'];
$todoList=getTodoLists ($_POST['nlist']); $sizeTodoList=count($todoList);
?>

    <h1>Список дел пользователя <span>&laquo;<?php echo $_POST['user']?>&raquo;</span></h1>
    <h2><?php echo $todoList[0];?></h2>
    <table class="utable sub sub2">
        <tr><th>N задачи</th><th>Задача</th><th>Статус</th></tr>
        <?php
        $i=0; do{
            $i++;
            if(isset($todo[$i])&&!empty($todo[$i])){
                $status='Готово';
            }else {
                $status='НЕ выполнено';
            }
        printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",$i,$todoList[$i],$status);
       }while ($i<$sizeTodoList-1);


        ?>

    </table>

</div></body>
</html>
