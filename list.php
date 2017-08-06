<?php

error_reporting(E_ERROR);

$address = explode(" ", trim(file_get_contents('addressFile')));
$Name = explode(" ", trim(file_get_contents('nameFile')));
array_unshift($address, null);
unset($address[0]);
array_unshift($Name, null);
unset($Name[0]);
$address = array_unique($address);


$number = $_POST['numberTest'];

if (count($Name) < $number) {
    header('HTTP/1.1 404 Not Found');

} elseif (isset($_POST['GOOD'])) {
    header("Location:  http://university.netology.ru/u/smetanin/me7/test.php?load=$address[$number]");
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>Список тестов</h1>
<form method="post" action="admin.php">
    <input type="submit" value="Войти">
</form>
<form method="post">
    <h2>Выберите номер понравившегося вам теста</h2>
    <input type="number" name="numberTest">
    <input type="submit" name="GOOD" value="Перейти к тесту">
</form>
<?php for ($i = 1, $size = count($Name); $i <= $size; $i++) :
    echo "Тест № $i : $Name[$i]<br>";
endfor;
?>
</body>
</html>


