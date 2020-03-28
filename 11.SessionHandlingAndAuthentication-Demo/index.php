<?php
use Database\PDODatabase;
spl_autoload_register();



class UserDTO
{
    private $username;
    private $password;


    public function getUsername()
    {
        return $this->username;
    }


   private function setUsername($username): void
    {
        $this->username = $username;
    }


    public function getPassword()
    {
        return $this->password;
    }


    private function setPassword($password): void
    {
        $this->password = $password;
    }


}

$pdo = new PDO("mysql:host=localhost;dbname=sessions_demo", "root", "");

$db = new PDODatabase($pdo);

$stmt = $db->query("SELECT * FROM users");
$rs = $stmt->execute();

$allUsers = $rs->fetch(UserDTO::class);
/**@var UserDTO $user */
foreach ($allUsers as $user) {
    echo $user->getUsername(). " ||| " . "<br/>";
}

