<?php

class User extends AbstractUser
{
    /**
     * @return string
     */
    public function __construct($name, $data = 'У пользователя пока нет данных')//Создаем Простого пользователя
    {
        parent::__construct($name, $data);
        parent::editRole(parent::USER);
    }

    public function getData() // Просмотр своих данных
    {
        return 'Пользователь '.$this->getName().':&nbsp&nbsp'.$this->data;
    }

}