<?php
if (isset($_GET['input'])) {
    $text = str_replace(' ', '', $_GET['input']);
    for ($i = 0; $i < strlen($text); $i++) {
        $current = $text[$i];
        if (ord($current) % 2 == 0) {
            echo "<span style='color: red'>$current</span> ";
        } else {
            echo "<span style='color: blue'>$current</span> ";
        }
    }
}
?>

<form>
    <textarea rows="10" name="input"></textarea><br>
    <input type="submit" value="Count text">
</form>
