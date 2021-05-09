<?php
include_once "helloPerson_frontend.php";

if (isset($_GET['person'])) {
    $name = $_GET['person'];
    echo "Hello, $name!";
}
