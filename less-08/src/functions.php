<?php

$pagetitle='TODO on Classes'; // одинаковый заголовок для всех страниц


//локальный путь сервера в папку сайта вида http://phpless/less7/
$script_host = "http://".$_SERVER['HTTP_HOST']
                        .substr($_SERVER['REQUEST_URI'],0,
                        strrpos($_SERVER['REQUEST_URI'],'/')+1)  ;


//======================================================================================
if (!defined("SHOST")){
    define ('SHOST', $script_host); // константа - локальный путь сервера в папку сайта
} else {printf($errdefine, "SHOST", __LINE__, __FILE__); exit();}
if (!defined("AVAF_HOST")){
    define ('AVAF_HOST', $script_host.'img/userava/female/ava_female_'); // константа - путь к женским аватаркам пользователя
} else {printf($errdefine, "AVAF_HOST", __LINE__, __FILE__); exit();}
if (!defined("AVAM_HOST")){
    define ('AVAM_HOST', $script_host.'img/userava/male/ava_male_'); // константа - путь к мужским аватаркам пользователя
} else {printf($errdefine, "AVAM_HOST", __LINE__, __FILE__); exit();}

//======================================================================================

function getUsers (){ // База данных пользователей
    return  [
        ['id' => 1, 'login' => 'user1', 'password' => '111111', 'todo' => getTodoLists(1), 'sex'=>'male', 'avatar'=>AVAM_HOST.'1.png'],
        ['id' => 2, 'login' => 'user2', 'password' => '222222', 'todo' => getTodoLists(2), 'sex'=>'male', 'avatar'=>AVAM_HOST.'2.png'],
        ['id' => 3, 'login' => 'user3', 'password' => '333333', 'todo' => getTodoLists(3), 'sex'=>'male', 'avatar'=>AVAM_HOST.'3.png'],
        ['id' => 4, 'login' => 'user4', 'password' => '444444', 'todo' => getTodoLists(4), 'sex'=>'female', 'avatar'=>AVAF_HOST.'1.png'],
        ['id' => 5, 'login' => 'user5', 'password' => '555555', 'todo' => getTodoLists(5), 'sex'=>'female', 'avatar'=>AVAF_HOST.'2.png']
            ];
}
//======================================================================================
function getTodoLists ($n=''){ // База данных списков дел "To do"
    $lists = [       ['Покупки в магазине', // Заголовок списка
                    'Минеральная вода',
                    'Сок',
                    'Хлеб',
                    'Макароны',
                    'Курица',
                    'Колбаса'
                   ],
                   ['Задачи по дому',  // Заголовок списка
                    'Приготовить обед',
                    'Постирать белье',
                    'Погладить рубашки',
                    'Пропылесосить',
                    'Вытереть пыль',
                    'Разобрать вещи'
                   ],
                   ['Список задач на день',  // Заголовок списка
                    'Сделать зарядку',
                    'Выгулять собаку',
                    'Купить продукты',
                    'Сделать уборку',
                    'Сходить в кино',
                    'Позвонить другу'
                   ]
        ];

    if($n=='') {return $lists;} else { return $lists[($n-1)%3] ;} //отдаем или весь список или одну из частей
}
//======================================================================================
function mes (string $msg, $color='blue', $bcolor='' ) //вывод на сайт сообщений, когда что-то пошло не так
    {
        if($bcolor!=''){$bcolor='-'.$bcolor;}
        printf("<div class='sub%s msg m-%s'><p>%s</p></div>",$bcolor,$color,$msg);
    }
