<?php
$password = 'Netology2017';
if((isset($_POST['password'])) == $password){
    echo 'Пороль введен успешно';
    header("Location: http://university.netology.ru/u/smetanin/me6/admin.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход в панель Администратора</title>
</head>
<body>

<form method="post" action="admin.php">
    <input type="password" name="password" required>
    <input type="submit" value="Войти">
</form>

</body>
</html>
