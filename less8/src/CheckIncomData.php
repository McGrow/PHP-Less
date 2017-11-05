<?php


class CheckIncomData
{
    //========================================================================================
    static public function checkLogPass (){   // проверка метода и наличия ввода данных
        if ($_SERVER['REQUEST_METHOD']!='POST'){
            mes("Страница ввода логина находится <a href='".SHOST."'> >> ЗДЕСЬ >> </a>",'red','red');
            die();
        }

        if (    !isset($_POST['login']) || // проверка переменных POST на существование и содержание
            empty($_POST['login'])  ||
            !isset($_POST['password']) ||
            empty($_POST['password'])){
            mes("Логин или пароль не введены. Повторите попытку<a href=".SHOST."> >> ЗДЕСЬ >></a>","red");
            die();
        }

        return [
            $_POST['login'],
            $_POST['password']
        ]; //если поля формы логин/пароль заполнены и переданы - возвращаем их
    }

    //======================================================================================
    static public function checkPostData( $post1, // универсальная проверка перем. POST (от1 до 5) на существование и содержание
                                          $post2='',
                                          $post3='',
                                          $post4='',
                                          $post5=''){

        $retdata=[]; $errdata='';
        for ($i=1; $i<6; $i++ ){
            $post='post'.$i;
            if($$post!='') {
                if (!isset($_POST[$$post]) || empty($_POST[$$post])) {
                    $errdata = $errdata . " &laquo;" . $$post . "&raquo; ";
                } else {
                    $retdata[] = $_POST[$$post];
                }
            }
        }
       if($errdata!=''){
           mes("Данные ".$errdata." не переданы. Повторите ввод данных<a href=".SHOST."> >> ЗДЕСЬ >></a>");
           die();
       }

        return $retdata; // если все проверяемые POST перем. существуют и не пусты возвращаем их
    }
}