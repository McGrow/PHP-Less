<?php

/**
 * Class DataUsers
 */
class DataUsers
{
    /**
     * @var User[]
     */
    private $users;

    function __construct()
    {
        $data = getUsers();

        $users = [];

        foreach ($data as $user) {
            $dataUser = new User();
            /**
             * fill User
             */
            $dataUser->setId($user['id']);
            $dataUser->setLogin($user['login']);
            $dataUser->setPass($user['password']);
            $dataUser->setTodoList($user['todo']);
            $dataUser->setSex($user['sex']); // не пригодился
            $dataUser->setAva($user['avatar']);

            $users[] = $dataUser;
        }


        $this->setUsers($users);
    }

    /**
     * @return User[]
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User[] $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @param $login
     *
     * @return null|User
     */
    public function findByLogin($login, $psw='')
    {
        $users = $this->getUsers();

        foreach ($users as $user) {
            /**
             * put your code there
             */
             if (strcasecmp($user->getLogin(), $login)==0){ //регистронезависимое сравнение логина
                if ($user->getPass()==$psw || $psw=='' ){
                    return $user; //если логин/пароль подходят или задан только логин возвращаем текущего пользователя
                }
            }


        }

        return null;
    }

//    public function findById($id)
//    {
//        $users = $this->getUsers();
//
//        foreach ($users as $user) {
//            /**
//             * put your code there
//             */
//            if ($user['id']==$id){
//                    return $user; //Возвращаем текущего пользователя по Id
//                }
//            }
//
//        mes("Пользователя с таким Id не существует. Пройдите авторизацию снова<a href=".SHOST."> >> ЗДЕСЬ >></a>","red");
//        die();
//    }
}
