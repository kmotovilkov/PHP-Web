<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 10/25/2018
 * Time: 8:56 PM
 */

namespace Controllers;


use Database\PDODatabase;
use Core\View;

class BaseController
{
    /**
     * @var PDODatabase
     */
    protected $db_connection;

    /**
     * @var Products
     */
    protected $model;

    /**
     * @var View
     */
    protected $view;

    /**
     * Products constructor.
     * @param PDODatabase $db_connection
     * @param View $view
     */
    public function __construct(PDODatabase $db_connection, View $view)
    {
        $this->db_connection = $db_connection;
        $this->view = $view;

        if(!$this->checkSession()){
            header('Location: /basic/users/login');
            exit;
        }
    }

    public function checkSession(){
        if(!$_SESSION['user_id']){
            return null;
        }
        return true;
    }

    protected function redirect(string $url)
    {
        header('Location: ' . APP_ROOT . $url);
        exit;
    }
}