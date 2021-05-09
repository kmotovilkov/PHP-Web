<?php
include_once "helloPerson_frontend.php";

if (isset($_GET['person'])) {
    $name =htmlspecialchars( $_GET['person']);
    echo "Hello, $name!";
}
