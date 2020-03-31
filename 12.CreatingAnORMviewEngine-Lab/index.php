<?php


spl_autoload_register();
session_start();

$url = $_SERVER['REQUEST_URI'];

$url_data = explode('/',$url);

array_shift($url_data);
$app_root = array_shift($url_data);

define('APP_ROOT',$app_root);

$controller = $url_data[0]??'products'?:'products';
$action_name = $url_data[1]??'index';
$param = $url_data[2]??null;

$config = parse_ini_file('Config/db.ini');

$pdo = new PDO($config['dsn'],$config['user'],$config['pass']);
$db = new \Database\PDODatabase($pdo);

$controller_name = ucfirst($controller);
$controller = 'Controllers\\'.$controller_name.'Controller';

if(!class_exists($controller)){
    throw new Exception('Non valid controller:'.$controller );
}

$view = new Core\View($controller_name,$action_name);

$controller_obj = new $controller($db,$view);

$controller_obj->$action_name($param);

