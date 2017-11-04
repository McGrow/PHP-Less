<?php
require_once './src/includer.php';

list($userLogin,$todo)=CheckIncomData::checkPostData('user','todo'); //Проверка входщих данных POST

$DataUser=new DataUsers();
$user=$DataUser->findByLogin($userLogin); //находим пользователя по логиниу

$todoList=$user->getTodoList(); // получаем TO DO список пользователя
$sizeTodoList=count($todoList);

?>

    <h1>Список дел пользователя <span>&laquo;<?php echo $user->getLogin()?>&raquo;</span></h1>
    <h2><?php
                echo $todoList[0]; // выводим заголовок списка
        ?></h2>

    <table class="utable sub sub2">
        <tr><th>N п/п</th><th>Задача</th><th>Статус</th></tr>

        <?php
        $i=0; do{
            $i++; // индекс с числа 1
            /*
             * если переданная переменная списка существует и не пуста
             * ставим 'готово' если переменной с таким индексом нет ставим 'НЕ готово'
             * весь список дел берем из списка дел в "Базе данных" пользователя
             * */
            if(isset($todo[$i])&&!empty($todo[$i])){
                $status='Готово';
            }else {
                $status='НЕ выполнено';
            }
        printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",$i,$todoList[$i],$status); //вывод строки таблицы
       }while ($i<$sizeTodoList-1); // перебор всех записей списка TO DO
        ?>

    </table>

<?php require_once './page_parts/footer.php';?>



