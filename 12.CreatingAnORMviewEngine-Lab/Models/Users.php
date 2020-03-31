<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 10/25/2018
 * Time: 9:02 PM
 */

namespace Models;


use PDO;
use PDOException;

class Users
{
    /**
     * @var \PDO
     */
    private $db_connection;

    /**
     * Users constructor.
     * @param $db_connection
     */
    public function __construct($db_connection)
    {
        $this->db_connection = $db_connection;
    }


    public function save()
    {
        $user_name = $_POST['user_name']??null;
        $password = $_POST['password']??null;
        $names = $_POST['names']??null;

        $password = password_hash($password,PASSWORD_DEFAULT);

        $stm = $this->db_connection->prepare('INSERT INTO users (USER_NAME,PASSWORD,NAMES) VALUES(:user_name,:password,:names)');
        $stm->bindParam('user_name',$user_name);
        $stm->bindParam('password',$password);
        $stm->bindParam('names',$names);

        try {
            $stm->execute();
        }catch (PDOException $e){
            throw new \Exception('User already exists in db');
        }
        return $this->db_connection->lastInsertId();

    }

    public function checkUser($data):?int
    {
        $user_name = $data['user_name']??null;
        $password = $data['password']??null;

        $stm = $this->db_connection->prepare('SELECT user_id,password FROM users WHERE USER_NAME = :user_name');
        $stm->bindParam('user_name',$user_name);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if($result){
            if(password_verify($password,$result['password'])){
                return $result['user_id'];
            }
        }
        return null;
    }
}