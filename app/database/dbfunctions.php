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
}
