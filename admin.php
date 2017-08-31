<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Панеь загрузки тестов</title>
</head>
<body>
<form method="post" action="list.php">
    <input type="submit" value="Выйти">
</form>
<form enctype="multipart/form-data" method="post">
    <input name="name">
    <input type="file" name="uploadFile">
    <input type="submit" name="submit" value="Отправить">
</form>
</body>
</html>


<?php
error_reporting(E_ERROR);


if ((is_null($_FILES['uploadFile']) || empty($_POST['name'])) && isset($_POST['submit'])) {
    echo 'Вы не загрузили  новый тест на сайт или не ввели свое имя, попробуйте снова.';
    exit();
}else{
    $json = $_FILES['uploadFile'];
    $filename = $json['name'];
    $nameVar = $_POST['name'];

}





$Name = fopen('nameFile', 'a+'); //открываем файл, в котором будут храниться  именя файлов загруженных на сервер
trim(fwrite($Name, $nameVar . " "));       //записываем имена в файл черех пробел и удаляем пробелы на кончах файла
fclose($Name);       // закрываем файл


if (isset($_POST['submit'])){
if (move_uploaded_file($json['tmp_name'], __DIR__ . "/test/$filename")) {       //проверяем файл на наличие на сервере
    echo 'Тест успешно загружен';
} else {
    echo 'К сожалению, произошла ошибка, загрузите файл повторно';

}
}