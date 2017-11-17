<?php
require_once './src/functions.php'; // общие переменные, константы и функции
?>
    <h1>Создание пользователей</h1>


<!-- === USER ===================================================================================== -->
<?php
$justUser=new User ('Andy');
$justUser->setData('440040, г. Светлогорск, ул. Бакунина, дом 22, квартира 152.')
?>

    <h2>Создаем простого пользователя <b>Andy</b></h2>
    <p>
        <?php
            echo 'Имя пользователя: <b>'.$justUser->getName().'</b><br>';
            echo 'Роль: <b>'.$justUser->getRole().'</b><br>';
            echo 'Права: <b>'.$justUser->getPremissions().'</b><br>';
            echo 'Данные: <b>'.$justUser->getData().'</b><br>';
        ?>
    </p>
    <h3>Пробуем изменить данные простого пользователя <b>Andy</b></h3>
<?php
$justUser->setData('353223, г. Анжеро-Судженск, ул. Бахрушина, дом 64, квартира 191');
$justUser->setRole('admin');
$justUser->setName('Antuan');
?>

    <p>
        <?php
            echo 'Имя пользователя: <b>'.$justUser->getName().'</b><br>';
            echo 'Роль: <b>'.$justUser->getRole().'</b><br>';
            echo 'Права: <b>'.$justUser->getPremissions().'</b><br>';
            echo 'Данные: <b>'.$justUser->getData().'</b><br>';
        ?>
    </p>




<!-- === MANAGER ===================================================================================== -->
    <h2>Создаем Менеджера <b>Boris</b></h2>
<?php
$ManagerUser=new ManagerUser ('Boris');
?>
    <p>
        <?php
        echo 'Имя пользователя: <b>'.$ManagerUser->getName().'</b><br>';
        echo 'Роль: <b>'.$ManagerUser->getRole().'</b><br>';
        echo 'Права: <b>'.$ManagerUser->getPremissions().'</b><br>';
        echo 'Данные: <b>'.$ManagerUser->getData().'</b><br>';
        echo 'Данные: <b>'.$ManagerUser->getData($justUser).'</b><br>';// смотрим данные простого пользователя через метод менеджера

        ?>
    </p>
    <h3>Пробуем изменить данные Менеджера <b>Boris</b></h3>
<?php
$ManagerUser->setData('427144, г. Первомайское, ул. Авангардная, дом 3, квартира 266');
$ManagerUser->setRole('admin');
$ManagerUser->setName('Antuan');
?>
    <p>
        <?php
        echo 'Имя пользователя: <b>'.$ManagerUser->getName().'</b><br>';
        echo 'Роль: <b>'.$ManagerUser->getRole().'</b><br>';
        echo 'Права: <b>'.$ManagerUser->getPremissions().'</b><br>';
        echo 'Данные: <b>'.$ManagerUser->getData().'</b><br>';
        ?>
    </p>


<!-- === ADMIN ===================================================================================== -->
    <h2>Создаем Администратора <b>Alexandr</b></h2>
<?php
$AdminUser=new AdminUser('Alexandr');
?>
    <p>
        <?php
        echo 'Имя пользователя: <b>'.$AdminUser->getName().'</b><br>';
        echo 'Роль: <b>'.$AdminUser->getRole().'</b><br>';
        echo 'Права: <b>'.$AdminUser->getPremissions().'</b><br>';
        echo 'Данные: <b>'.$AdminUser->getData().'</b><br>';
        echo 'Данные: <b>'.$AdminUser->getData($justUser).'</b><br>';// смотрим данные простого пользователя через метод админа
        echo 'Данные: <b>'.$AdminUser->getData($ManagerUser).'</b><br>';// смотрим данные Администратора через метод админа

        ?>
    </p>
    <h3>Изменяем из под администратора <br>
        имя Администратора, Менеджера, Пользователя на соответствено <b>Александр, Борис, Андрей</b><br>
        изменяем роль Менеджера и Пользователя на противоположные <br>
        поселяем их жить по одному адресу.
    </h3>
<?php
$addr = '65000, г. Одесса, ул. Садовая, дом 1, офис 123';
$AdminUser->setData($addr);
$AdminUser->setData($addr, $ManagerUser);
$AdminUser->setData($addr, $justUser);

$AdminUser->setName('Александр');
$AdminUser->setName('Борис',$ManagerUser);
$AdminUser->setName('Андрей',$justUser);

$AdminUser->setRole('USER',$ManagerUser);
$AdminUser->setRole('MANAGER',$justUser);

?>
    <p>
        <?php
        echo 'Имя пользователя: <b>'.$justUser->getName().'</b><br>';
        echo 'Роль: <b>'.$justUser->getRole().'</b><br>';
        echo 'Права: <b>'.$justUser->getPremissions().'</b><br>';
        echo 'Данные: <b>'.$justUser->getData().'</b><br>';
        ?>
        <br><br>
        <?php
        echo 'Имя пользователя: <b>'.$ManagerUser->getName().'</b><br>';
        echo 'Роль: <b>'.$ManagerUser->getRole().'</b><br>';
        echo 'Права: <b>'.$ManagerUser->getPremissions().'</b><br>';
        echo 'Данные: <b>'.$ManagerUser->getData().'</b><br>';
        ?>
        <br><br>
        <?php
        echo 'Имя пользователя: <b>'.$AdminUser->getName().'</b><br>';
        echo 'Роль: <b>'.$AdminUser->getRole().'</b><br>';
        echo 'Права: <b>'.$AdminUser->getPremissions().'</b><br>';
        echo 'Данные: <b>'.$AdminUser->getData().'</b><br>';
        ?>
        <br><br>
    </p>


<?php require_once './page_parts/footer.php';?>