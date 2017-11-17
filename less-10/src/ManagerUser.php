<?php

class ManagerUser extends AbstractUser
{
    public function __construct($name, $data = 'У Менеджера пока нет данных')
    {
        parent::__construct($name, $data);
        parent::editRole(parent::MANAGER);
    }

    public function getData($user = NULL) // Просмотр своих данных или данных Пользователя
    {
        if ($user) {
            if ($user->getRole() == parent::USER) {
                return 'Пользователь ' . $user->getName() . ':&nbsp&nbsp' . $user->data;
            } else {
                mes('У вас нет прав просматривать данные этого пользователя');
            }
        } else {
            return 'Пользователь ' . $this->getName() . ':&nbsp&nbsp' . $this->data;

        }
    }
}