<?php

class User extends AbstractUser
{
    /**
     * @return string
     */
    public function __construct($name, $data = 'У пользователя пока нет данных')
    {
        parent::__construct($name, $data);
        parent::editRole(parent::USER);
    }

    public function getData()
    {
        return 'Пользователь '.$this->getName().':&nbsp&nbsp'.$this->data;
    }

}