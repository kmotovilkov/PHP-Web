<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
</head>
<body>
<form method="post">
    Username <input type="text" name="username"/><br/>
    Password <input type="password" name="password"/><br/>
    <input type="submit"/>
</form>
<div id="response"><?=$response;?></div>
</body>
</html>
