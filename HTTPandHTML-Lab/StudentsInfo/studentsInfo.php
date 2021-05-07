<?php
include_once "studentsInfo_frontend.php";

if (isset($_GET['filter'])) {
    $delimiter = $_GET['delimiter'];
    $names = explode($delimiter, htmlspecialchars($_GET['names']));
    $ages = explode($delimiter, htmlspecialchars($_GET['ages']));

    if (isset($names, $ages)) {
        echo "<table border='1' cellspacing='0'><thead><tr><th>Name</th><th>Age</th></tr></thead><tbody>";
        for ($i = 0; $i < count($names); $i++) {
            echo "<tr>";
            if ($ages[$i] >= 18) {
                echo "<td>$names[$i]</td><td>$ages[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    }
}
