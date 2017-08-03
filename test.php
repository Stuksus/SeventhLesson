<?php
error_reporting(E_ERROR);


$json = "[
  {
    \"question1\": \"4\",
    \"question2\": \"5\",
    \"question3\": \"10\",
    \"question4\": \"2\",
    \"question5\": \"36\"
  }
]";
$decode = json_decode($json, true);
if ($decode[0]['question1'] == $_POST['question1']) {
    $n += 1;
}
if ($decode[0]["question2"] == $_POST['question2']) {
    $n += 1;
}
if ($decode[0]['question3'] == $_POST['question3']) {
    $n += 1;
}
if ($decode[0]['question4'] == $_POST['question4']) {
    $n += 1;
}
if ($decode[0]['question5'] == $_POST['question5']) {
    $n += 1;
}
if (isset($_POST['OK'])) {
    echo "<h1>Правильных ответов $n из 5</h1>";
    echo "<form method=\"post\" action=\"list.php\"><input type=\"submit\" value=\"В главное меню\"></form>";
}
?>

<form method="post">
    Имя: <input name="name"><br>
    <p><b>2 x 2 =</b><Br>
        <input type="radio" name="question1" value="4"> 4<Br>
        <input type="radio" name="question1" value="5"> 5<Br>
        <input type="radio" name="question1" value="10"> 10<Br>
    </p>

    <p><b>1 x 5 =</b><Br>
        <input type="radio" name="question2" value="2"> 2<Br>
        <input type="radio" name="question2" value="5"> 5<Br>
        <input type="radio" name="question2" value="10"> 10<Br>
    </p>

    <p><b>10 / 1 =</b><Br>
        <input type="radio" name="question3" value="2"> 2<Br>
        <input type="radio" name="question3" value="5"> 5<Br>
        <input type="radio" name="question3" value="10"> 10<Br>
    </p>

    <p><b>10 / 5 =</b><Br>
        <input type="radio" name="question4" value="2"> 2<Br>
        <input type="radio" name="question4" value="5"> 5<Br>
        <input type="radio" name="question4" value="10"> 10<Br>
    </p>

    <p><b>6 x 6 =</b><Br>
        <input type="radio" name="question5" value="2"> 2<Br>
        <input type="radio" name="question5" value="36"> 36<Br>
        <input type="radio" name="question5" value="10"> 10<Br>
    </p>
    <input type="submit" name="OK" value="Отправить">
</form>