<?php
echo "<h1>Список тестов</h1>";

echo "<form method=\"post\" action=\"admin.php\"><input type=\"submit\" value=\"Войти\"></form>";


$address = explode(" ", trim(file_get_contents('addressFile')));
array_unshift($address,null);
unset($address[0]);
$address = array_unique($address);

for ($i = 1, $size = count($address); $i <= $size; $i++) {
    echo "<a href='http://university.netology.ru/u/smetanin/me6/$address[$i]'>Тест № $i</a><br>";
}


