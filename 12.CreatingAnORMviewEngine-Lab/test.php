<?php
session_start();
if (count($_POST)) {
    $_SESSION['phonebook'][$_POST['name']] = $_POST;
    header('Location:test.php');
    exit;
}
?>
<form method="post">
    Name:
    <input type="text" name="name"><br/>
    Phone:
    <input type="text" name="phone"><br/>
    Group:
    <select name="group">
        <option value="Future">Future</option>
        <option value="Friends">Friends</option>
        <option value="Colleagues">Colleagues</option>
        <option value="Ex-">Ex-</option>
    </select>
    <button type="submit">Save</button>
</form>
<table border="1">
    <?php
    if(isset($_SESSION['phonebook'])) {
        foreach ($_SESSION['phonebook'] as $line) {
            echo '<tr>';
            echo '<td>' . $line['name'] . '</td>';
            echo '<td>' . $line['phone'] . '</td>';
            echo '<td>' . $line['group'] . '</td>';
            echo '</tr>';
        }
    }
    ?>
</table>
