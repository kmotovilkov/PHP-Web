<form>
    <div>Name:
        <input type="text" name="name"/></div>
    <div>Age:
        <input type="text" name="age"/></div>
    <div>
        <div><input type="radio" name="gender" value="Male"/>Male</div>
        <div><input type="radio" name="gender" value="Female"/>Female</div>
        <div>
            <input type="submit" name="address"/></div>
</form>

<?php
if (isset($_GET['name']) &&
    isset($_GET['age']) &&
    isset($_GET['gender'])) {

    $name = htmlspecialchars($_GET['name']);
    $age = htmlspecialchars($_GET['age']);
    $gender = $_GET['gender'];

    echo "My name is $name. I am $age years old. I am $gender";

}
?>
