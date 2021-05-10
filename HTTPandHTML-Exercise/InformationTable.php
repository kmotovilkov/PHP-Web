<?php
if (isset($_GET['name']) &&
    isset ($_GET['phone']) &&
    isset($_GET['age']) &&
    isset($_GET['address'])) {

    $name = htmlspecialchars($_GET['name']);
    $phone = htmlspecialchars($_GET['phone']);
    $age = htmlspecialchars($_GET['age']);
    $address = htmlspecialchars($_GET['address']);

    echo "<table border='2'>";
    echo "<tr><td style='background-color: orange'>Name</td><td>$name</td></tr>";
    echo "<tr><td style='background-color: orange'>Phone Number</td><td>$phone</td></tr>";
    echo "<tr><td style='background-color: orange'>Age</td><td>$age</td></tr>";
    echo "<tr><td style='background-color: orange'>Address</td><td>$address</td></tr>";
    echo "</table>";
}
?>

<form>
    <div>Name:
        <input type="text" name="name"/></div>
    <div>Phone Number:
        <input type="text" name="phone"/></div>
    <div>Age:
        <input type="text" name="age"/></div>
    <div>
        <div>Address:
            <input type="text" name="age"/></div>
        <div>
            <input type="submit" name="address"/></div>
</form>
