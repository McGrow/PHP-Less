<?php
//$script_name=substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],'/'))// имя файла скрипта

//локальный путь сервера в папку сайта вида http://phpless/less7/
$script_host = "http://".$_SERVER['HTTP_HOST']
                        .substr($_SERVER['REQUEST_URI'],0,
                        strrpos($_SERVER['REQUEST_URI'],'/')+1)  ;
//======================================================================================
if (!defined("SHOST")){
    define ('SHOST', $script_host); // константа - локальный путь сервера в папку сайта
} else {printf($errdefine, "SHOST", __LINE__, __FILE__); exit();}
//======================================================================================
function getUsers (){ // База данных пользователей
    return  [
                ['login'=>'user1', 'pass'=>'11111'],
                ['login'=>'user2', 'pass'=>'22222'],
                ['login'=>'user3', 'pass'=>'33333']
            ];
}
//======================================================================================
function getTodoLists ($n=''){ // База данных списков дел "To do"
    $lists = [       ['Покупки в магазине',
                    'Минеральная вода',
                    'Сок',
                    'Хлеб',
                    'Макароны',
                    'Курица',
                    'Колбаса'
                   ],
                   ['Задачи по дому',
                    'Приготовить обед',
                    'Постирать белье',
                    'Погладить рубашки',
                    'Пропылесосить',
                    'Вытереть пыль',
                    'Разобрать вещи'
                   ],
                   ['Список задач на день',
                    'Сделать зарядку',
                    'Выгулять собаку',
                    'Купить продукты',
                    'Сделать уборку',
                    'Сходить в кино',
                    'Позвонить другу'
                   ]
        ];
    if($n=='') {return $lists;} else {return $lists[$n];}
}
//======================================================================================
function getUserTodoList ($user){
    $users=getUsers();
    $nkey=0;
    foreach ($users as $key => $polzovatel ) {
        ++$nkey;// Порядковый номер пользователя в списке
        if ($polzovatel['login'] == $user) {
            break;
        }
    }
    $todoLists=getTodoLists(); $sizeTodoLists=count($todoLists); // получаем список TO DO
    if ($nkey<=$sizeTodoLists){ // Отдаем список заданий соответствующий порядковому номеру пользователя
        return [$todoLists[$nkey-1],$nkey-1];
    }else {
        return [$todoLists[($nkey%$sizeTodoLists-1)],$nkey%$sizeTodoLists-1];
    }
}

//======================================================================================
function checkData (){ // проверка метода и наличия ввода данных
    if ($_SERVER['REQUEST_METHOD']!='POST'){
        mes("Страница ввода логина находится <a href='".SHOST."'> >> ЗДЕСЬ >> </a>",'red','red');die();
    }

    if (    !isset($_POST['login']) ||
        empty($_POST['login'])  ||
        !isset($_POST['password']) ||
        empty($_POST['password'])){
        mes("Логин или пароль не введены. Повторите попытку<a href=".SHOST."> >> ЗДЕСЬ >></a>","red"); die();
    }
    return [
            'login'=>$_POST['login'],
            'password'=>$_POST['password']
           ]; //если поля формы логин/пароль заполнены и переданы - возвращаем их
}
//======================================================================================
function userValidator ($login,$psw){
    $users=getUsers();
    foreach ($users as $key => $user ){
        if (strcasecmp($user['login'], $login)==0 //регистронезависимое сравнение логина
                    && $user['pass']==$psw){
            return $user['login']; //если логин/пароль подходят возвращаем логин из базы
        }
    }
    // если логин/пароль НЕ подходят пишем сообщение с переходом на форму ввода
    mes("Пользователя с таким логином или паролем не существует. <a href=".SHOST.">Повторите ввод >> ЗДЕСЬ >></a>");
    die();
}
//======================================================================================
function mes (string $msg, $color='blue', $bcolor='' )
    {
        if($bcolor!=''){$bcolor='-'.$bcolor;}
        printf("<div class='sub%s msg m-%s'><p>%s</p></div>",$bcolor,$color,$msg);
    }
