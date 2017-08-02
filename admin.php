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
<form  enctype="multipart/form-data" method="post">
    <input type="file" name="uploadFile">
    <input type="submit" name="submit" value="Отправить">
</form>
</body>
</html>
<?php
error_reporting(E_ERROR);
if (is_null($_FILES['uploadFile'])) {
    echo 'Добавьте новый тест на сайт';
    exit();
}
$json = $_FILES['uploadFile'];
$filename = $json['name'];
//file_put_contents("list.json",$filename,FILE_APPEND);
$upload = move_uploaded_file($json['tmp_name'], $filename);

$file = file_get_contents($filename);
$decodeFile = json_decode($file, true);

if (file_exists($filename)) {
    echo 'Тест успешно загружен';
} else {
    echo 'К сожалению, произошла ошибка, загрузите файл повторно';
}

