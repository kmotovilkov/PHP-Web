<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
<form method="get">
    <div>
        Opertion:
        <select name="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Substract</option>
        </select>
    </div>
    <div>Number:1
        <input type="text" name="number_one"/>
    </div>
    <div>Number:2
        <input type="text" name="number_two"/>
        <?php if (isset($output)): ?>
    </div>
    Result:
    <input type='text' disabled='disabled' readonly='readonly' value='<?= $output ?>'/>
    <?php endif; ?>
    <div>
        <input type="submit" name="calculate" value="Calculate!">
    </div>
</form>
</body>
</html>
