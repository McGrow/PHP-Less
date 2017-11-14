<?php
require_once './src/User.php'; // добавил пол и аватарку пользователя
require_once './src/DataUsers.php'; // добавил конструктор и переместил в него fill User
require_once './src/CheckIncomData.php'; // класс проверки вводимых данных в форму и входящих даннвх POST
require_once './src/functions.php'; // общие переменные, константы и функции

require_once './page_parts/header.php'; // подгружаем стаичный заголовок сайта