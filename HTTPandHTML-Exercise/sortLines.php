<?php
if (isset($_GET['lines'])) {
    $arrLines = array_filter(array_map("trim", explode("\n", $_GET['lines'])));
    asort($arrLines);
    $sortedLines = implode("\n", $arrLines);

}
?>

<form>
  <textarea rows="10" name="lines">
<?= $sortedLines ?>
  </textarea> <br>
    <input type="submit" value="Sort">
</form>
