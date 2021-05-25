<?php
require_once 'db/db_connection.php';
require_once 'db/user_queries.php';

if (!isset($_GET['auth_id'])) {
    header("Location: login.php");
    exit;
}

$authId = $_GET['auth_id'];
$userId = getUserByAuthId($db, $authId);
if ($userId == -1) {
    header("Location: login.php");
    exit;
}
