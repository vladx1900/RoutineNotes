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
     * @param $email
     * @return array
     */
    public function selectUserByEmail($email)
    {
        $sql = $this->conn->prepare('SELECT * FROM `users` WHERE `email` = ?');
        $sql->bind_param('s', $email);
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
        $sql = $this->conn->prepare('SELECT * FROM `users` WHERE email = ? AND password = ?');
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
        $sql = $this->conn->prepare('INSERT INTO `users` (`email`, `password`, `role`) VALUES (?, ?, 1)');
        $sql->bind_param('ss', $name, $password);

        return $sql->execute();
    }

    /**
     * @param $category
     * @return array
     */
    public function getMusclesByCategory($category)
    {
        $stmt = $this->conn->prepare('SELECT * FROM `muscles` WHERE `category` = ?');
        $stmt->bind_param('s', $category);
        $stmt->execute();

        $meta = $stmt->result_metadata();

        while ( $rows = $meta->fetch_field() ) {

            $parameters[] = &$row[$rows->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), $parameters);

        while ( $stmt->fetch() ) {
            $x = array();
            foreach( $row as $key => $val ) {
                $x[$key] = $val;
            }
            $arr_results[] = $x;
        }

        return $arr_results;
    }

    public function getMuscleByMuscleId($muscleId)
    {
        $sql = $this->conn->prepare('SELECT * FROM `muscles` WHERE muscleId = ?');
        $sql->bind_param('i', $muscleId);

        $sql->execute();

        $result = $sql->get_result();

        return $result->fetch_assoc();
    }

    /**
     * @param $muscleId
     * @return array|null
     */
    public function getExercisesByMuscleId($muscleId)
    {
        $stmt = $this->conn->prepare('SELECT `exercises`.*, `muscles`.name AS muscleName FROM `exercises` 
                                            INNER JOIN `muscles` ON `muscles`.muscleId = `exercises`.`muscleId` WHERE `exercises`.muscleId = ?');
        $stmt->bind_param('i', $muscleId);
        $stmt->execute();

        $meta = $stmt->result_metadata();

        while ( $rows = $meta->fetch_field() ) {

            $parameters[] = &$row[$rows->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), $parameters);

        while ( $stmt->fetch() ) {
            $x = array();
            foreach( $row as $key => $val ) {
                $x[$key] = $val;
            }
            $arr_results[] = $x;
        }
        if (isset($arr_results) && !empty($arr_results)) {
            return $arr_results;
        }

        return null;
    }
}
