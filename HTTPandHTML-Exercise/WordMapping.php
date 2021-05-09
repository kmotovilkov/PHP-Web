<?php
if (isset($_GET['input'])) {
    $text = strtolower($_GET['input']);
    preg_match_all("/[A-Za-z]+/", $text, $split);
    $output = [];
    $splitText = $split[0];
    for ($i = 0; $i < count($splitText); $i++) {
        if (!array_key_exists($splitText[$i], $output)) {
            $output[$splitText[$i]] = 1;
        } else {
            $output[$splitText[$i]]++;
        }
    }
    echo "<table border='2'>";
    foreach ($output as $str => $count) {
        echo "<tr><td>$str</td><td>$count</td></tr>";
    }
    echo "</table>";
}
?>

<form>
    <textarea rows="10" name="input"></textarea><br>
    <input type="submit" value="Count words">
</form>
