<?php

include_once 'database.php';

class dbfunctions {

    private $db;
    private $conn;

    /**
     * dbfunctions constructor.
     */
    public function __construct()
    {
        $this->db = database::getInstance();
        $this->conn = $this->db->getConnection();
    }

    /**
     * @param $id
     * @return array
     */
    public function selectUserById($id)
    {
        $sql = $this->conn->prepare('SELECT * FROM `users` WHERE id = ?');
        $sql->bind_param('d', $id);
        $sql->execute();

        $result = $sql->get_result();

        return $result->fetch_assoc();
    }

    /**
     * @param $name
     * @param $password
     * @return array
     */
    public function selectUserByCredentials($name, $password)
    {
        $password = md5($password);
        $sql = $this->conn->prepare('SELECT * FROM `users` WHERE name = ? AND password = ?');
        $sql->bind_param('ss', $name, $password);

        $sql->execute();

        $result = $sql->get_result();

        return $result->fetch_assoc();
    }

    /**
     * @param $name
     * @param $password
     * @return bool
     */
    public function insertNewUser($name, $password)
    {
        $password = md5($password);
        $sql = $this->conn->prepare('INSERT INTO `users` (`name`, `password`, `role`) VALUES (?, ?, 1)');
        $sql->bind_param('ss', $name, $password);

        return $sql->execute();
    }
}