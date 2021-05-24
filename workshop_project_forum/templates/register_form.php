<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link rel="stylesheet" href="templates/styles/all.css">
</head>
<body>
<div class="container">
<!--    <h1>Register form</h1>-->
    <form method="post">
        <div class="inputs">
        Username <input type="text" value="<?= $username; ?>" name="username"/><br/>
        Password <input type="<?= !empty($password) ? 'text' : 'password';?>" value="<?=$password;?>" name="password"/><br/>
        </div>
        <input id="submit" type="submit" value="Register"/>
    </form>
</div>
<div id="response"><?= $response; ?></div>
</body>
</html>
