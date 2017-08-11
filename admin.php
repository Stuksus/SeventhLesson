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


if (is_null($_FILES['uploadFile'])) {
    echo 'Добавьте новый тест на сайт';
    exit();
}


$json = $_FILES['uploadFile'];      //получаем данные о загруженном файле
$filename = $json['name'];          // сохраняем в переменную его имя
$nameVar = $_POST['name'];

$Name = fopen('nameFile', 'a+'); //открываем файл, в котором будут храниться  именя файлов загруженных на сервер
trim(fwrite($Name, $nameVar . " "));       //записываем имена в файл черех пробел и удаляем пробелы на кончах файла
fclose($Name);       // закрываем файл


$file = trim(file_get_contents('addressFile')); // получаем данные из файла addressName
$ex = array_unique(explode(" ", $file)); // преобразуем строику полученную из файла в массив


if (move_uploaded_file($json['tmp_name'], __DIR__ . "/test/$filename")) {       //проверяем файл на наличие на сервере
    echo 'Тест успешно загружен';
} else {
    echo 'К сожалению, произошла ошибка, загрузите файл повторно';

}



