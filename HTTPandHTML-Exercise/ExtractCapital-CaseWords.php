<?php
if (isset($_GET['text'])) {
    $text = $_GET['text'];
    preg_match_all("/\b[A-Z]+\b/", $text, $splitText);
    echo implode(", ", $splitText[0]);

}
?>

<form>
    <textarea rows="10" name="text"></textarea><br>
    <input type="submit" value="Extract">
</form>
