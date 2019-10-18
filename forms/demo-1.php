<?php
var_dump($_POST);
//var_dump($_GET);
if(isset($_POST["user"]) && !empty($_POST["user"])){
echo $_POST["user"];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .input-box {
            padding: 10px;
        }
    </style>
</head>
<body>

<form action="demo-1.php" method="POST">
    <div class="input-box">
        <label for="user">
            Login
            <input type="text" id="user" name="user" required placeholder="Ange användarnamn">
        </label>
    </div>
    <div class="input-box">
        <label for="pass">
            Lösen
            <input type="password" id="pass" name="pass" required placeholder="Ange lösen">
        </label>
    </div>
    <div class="input-box">
        <label for="comment">
            Lösen
        </label>
    </div>
    <div class="input-box">
            <input type="submit" value="Logga in">
    </div>
</form>


</body>
</html>
