<?php


namespace Controllers;


use Models\Users;

class UsersController extends BaseController
{

    public function __construct($db_connection, string $controller_name)
    {
        parent::__construct($db_connection, $controller_name);
        $this->model = new Users($this->db_connection);
    }

    public function register()
    {
        if ($_POST) {
            $this->model->save($_POST);
            $this->redirect('/');
        } else {
            $this->view->renderView();
        }
    }

    public function login()
    {
        if ($_POST) {
            $user_id = $this->model->checkUser($_POST);
            if ($user_id) {
                $_SESSION['user_id'] = $user_id;
                $this->redirect('/');
            }
            $this->redirect('/users/login/notlogin');
        }
        $this->view->renderView();
    }

    public function checkSession()
    {
        return true;
    }




}