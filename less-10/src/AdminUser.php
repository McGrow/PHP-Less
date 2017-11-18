<?php

class AdminUser extends AbstractUser
{
    public function __construct($name, $data = 'У Администратора пока нет данных') //Создаем Администратора
    {
        parent::__construct($name, $data);
        parent::editRole(parent::ADMIN);
    }


    public function getData($user = NULL)// Просмотр данных всех пользователей
    {
        if ($user) {
            parent::verifyObject($user);// проверка входящих данных на подходящий тип и класс
            return 'Пользователь ' . $user->getName() . ':&nbsp&nbsp' . $user->data;
        } else {
            return 'Пользователь ' . $this->getName() . ':&nbsp&nbsp' . $this->data;
        }
    }

    public function setName($name, $user=NULL)//Изменение Имени любого пользователя
    {
        if($user){
            parent::verifyObject($user);// проверка входящих данных на подходящий тип и класс
            $user->name=$name;
        } else {
            $this->name=$name;
        }
    }

    public function setRole($role, $user=NULL) //Изменение Роли любого пользователя
    {  $str=''; eval('$str=parent::'.$role.';');
        if ($user) {
            parent::verifyObject($user);// проверка входящих данных на подходящий тип и класс
            $user->role = $str;
            $user->premissions = self::premissions($str);
        } else {
            $this->role = $str;
            $this->premissions = self::premissions($str);
        }
    }

    public function setData($data, $user=NULL) // Изменение Данных любого пользователя
    {   if($user){
            parent::verifyObject($user); // проверка входящих данных на подходящий тип и класс
            $user->data=$data;
        } else {
            $this->data=$data;
        }
    }


}