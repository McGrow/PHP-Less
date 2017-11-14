<?php

require_once './src/includer.php';

$DataUsers = new DataUsers();

/**
 * get POST data to variable $login, $password
 */

list($login,$password)=CheckIncomData::checkLogPass();
if ($user = $DataUsers->findByLogin($login, $password)) { // check login and password. If its ok show todo list form
    /**
     * check password $password
     * if its ok show todo list form
     * jump over else bottom ))
     */
} else {
    // если логин/пароль НЕ подходят пишем сообщение с переходом на форму ввода
    mes("Пользователя с таким логином или паролем не существует. <a href=".SHOST.">Повторите ввод >> ЗДЕСЬ >></a>");
    die();
}
$userTodoList=$user->getTodoList();
$todoSize=count($userTodoList); $i=0;
?>
    <div class="sub sub2 usercard">
        <img src="<?php echo $user->getAva()?> ">
        <div>
            <h1>Добро пожаловать <?php echo $user->getLogin();?></h1>
            <hr>
            <p>Доступ к списку "TODO" получен </p>
        </div>
        <div class="clr"></div>
    </div>

    <h2><?php echo $userTodoList[0];?></h2><!--Список задач-->

    <form class="frm sub sub3" action="todolist.php" method="post">
        <h4>Форма завершенных задач</h4>

        <?php      while(++$i<=$todoSize-1){ ?>

            <div class="checkblock">
                <label><?php echo $userTodoList[$i];?></label>
                <input type="checkbox" name=todo[<?php echo $i;?>] value="<?php echo $userTodoList[$i];?>">
                <div class="clr"></div>
            </div>
            <input type="hidden" name="user" value="<?php echo $user->getLogin();?>">

        <div class="lastbut"><button type="submit" class="butsub">ОТПРАВИТЬ</button></div>
    </form>



<?php require_once './page_parts/footer.php';?>