<?php

class AdminUser extends AbstractUser
{
    public function __construct($name, $data = 'У Администратора пока нет данных')
    {
        parent::__construct($name, $data);
        parent::editRole(parent::ADMIN);
    }


    public function getData($user = NULL)
    {
        if ($user) {
            $this->verifyObject($user);
            return 'Пользователь ' . $user->getName() . ':&nbsp&nbsp' . $user->data;
        } else {
            return 'Пользователь ' . $this->getName() . ':&nbsp&nbsp' . $this->data;
        }
    }

    public function setName($name, $user=NULL)
    {
        if($user){
            $this->verifyObject($user);
            $user->name=$name;
        } else {
            $this->name=$name;
        }
    }

    public function setRole($role, $user=NULL)
    {  $str=''; eval('$str=parent::'.$role.';');
        if ($user) {
            $this->verifyObject($user);
            $user->role = $str;
            $user->premissions = self::premissions($str);
        } else {
            $this->role = $str;
            $this->premissions = self::premissions($str);
        }
    }

    public function setData($data, $user=NULL)
    {   if($user){
            $this->verifyObject($user);
            $user->data=$data;
        } else {
            $this->data=$data;
        }
    }

    private function verifyObject ($obj) { // Проверка поступающей переменной (object) на пригодность к обработке
        $className = get_class ($obj);
        if(gettype ($obj)!='object'){mes(' Ошибка данных - переменная не есть Объект'); die();}
        if( $className == 'ManagerUser' ||
            $className == 'User' ){return;
        }else{mes(' Ошибка данных - передан не правильный Объект '. $className); die();}
    }
}