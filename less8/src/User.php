<?php

/**
 * Class User
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $todoList;

    /**
     * @var string
     */
    private $sex;

    /**
     * @var string
     */
    private $ava;

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $pass
     */
    public function setPass($pass)
    {
        $this->password = $pass;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->password;
    }

    /**
     * @param $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param $todoList
     */
    public function setTodoList($todoList)
    {
        $this->todoList = $todoList;
    }

    /**
     * @return array
     */
    public function getTodoList()
    {
        return $this->todoList;
    }

    /**
     * @param $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param $ava
     */
    public function setAva($ava)
    {
        $this->ava = $ava;
    }

    /**
     * @return string
     */
    public function getAva()
    {
        return $this->ava;
    }

}
