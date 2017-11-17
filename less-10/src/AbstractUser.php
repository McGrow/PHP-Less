<?php

abstract class AbstractUser
{
    protected $name='';
    protected $data='';
    protected $role='';
    protected $premissions='';

    const USER = 'Порстой пользователь';
    const ADMIN = 'Администратор';
    const MANAGER = 'Менеджер';

    const PREM_ADMIN = 'Чтение и редактирование собственных данных и данных Менеджера и Простого пользователя';
    const PREM_MANAGER = 'Чтение и изменение собственных данных и чтение данных простых пользователей';
    const PREM_USER = 'Только чтение и изменение собственных данных';

    public function __construct($name, $data){
        $this->name=$name;
        $this->data=$data;
    }

    public function getName(){
        return $this->name;
    }

    public function getRole(){
        return $this->role;
    }

    public function getPremissions(){
        return $this->premissions;
    }

    public function setData($data){
        $this->data=$data;
    }
    public function setName($name)
    {mes("Имя изменить нельзя - нет прав", 'red');}

    public function setRole($role)
    {mes("Роль изменить нельзя - нет прав", 'red');}

    protected function editRole($role)
    {   $this->role=$role;
        $this->premissions=self::premissions($role);
    }

    protected function premissions ($role){
        if($role==self::MANAGER) {return self::PREM_MANAGER;}
        if($role==self::ADMIN){return self::PREM_ADMIN;}
        return self::PREM_USER;
    }
    abstract protected function getData();
}
