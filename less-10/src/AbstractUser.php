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

    public function __construct($name, $data){//Создаем пользователя с именем и данными
        $this->name=$name;
        $this->data=$data;
    }

    public function getName(){ //Возвращаем Имя пользователя
        return $this->name;
    }

    public function getRole(){ //Возвращаем Роль пользователя
        return $this->role;
    }

    public function getPremissions(){ //Возвращаем Права пользователя
        return $this->premissions;
    }

    public function setData($data){ // Редактирование Данных пользователя
        $this->data=$data;
    }
    public function setName($name) //редактировать Имя нельзя всем кроме Администратора
    {mes("Имя изменить нельзя - нет прав", 'red');}

    public function setRole($role) //редактировать имя Роль всем кроме Администратора
    {mes("Роль изменить нельзя - нет прав", 'red');}

    protected function editRole($role) // присваиваем/редактируем роль пользователя
    {   $this->role=$role;
        $this->premissions=self::premissions($role);
    }

    protected function premissions ($role){ // возвращаем права пользователя в зависимости от его роли
        if($role==self::MANAGER) {return self::PREM_MANAGER;}
        if($role==self::ADMIN){return self::PREM_ADMIN;}
        return self::PREM_USER;
    }

    protected function verifyObject ($obj) { // Проверка поступающей переменной (object) на пригодность к обработке
        $className = get_class ($obj);
        if(gettype ($obj)!='object'){mes(' Ошибка данных - тип переменной не есть Объект'); die();}
        if( $className == 'ManagerUser' ||
            $className == 'User' ){return $className;
        }else{mes(' Ошибка данных - передан не правильный Объект '. $className); die();}
    }

    abstract protected function getData();
}
