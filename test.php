<?php

include 'score.php';
$score = new score();


error_reporting(E_ERROR);
$n = 0;
$testName = $_GET['load'];
$json = file_get_contents(__DIR__ . "/test/$testName");
$decode = json_decode($json, true);


for ($i = 1, $quantity = count($decode[0]); $i <= $quantity; $i++) {

    if ($decode[0]['question' . $i] == $_POST['question' . $i]) {
        $n += 1;
    }
}


$score = $score->Test_Score($n);
if (isset($_POST['OK']) && empty($_POST['name'])) {
    echo
    "<script>alert('Вы не ввели свое имя! Пожалуйста, введите свое имя.');",
        "location.href='" . $_SERVER['REQUEST_URI'], "';",
    "</script>";
    die();

}
$name = $_POST['name'];
if (isset($_POST['OK'])) {

    echo "<h1>Правильных ответов $n из 5</h1>";
    echo "<form method=\"post\" action=\"list.php\"><input type=\"submit\" value=\"В главное меню\"></form>";
    echo "<h2>$name, Ваша оценка: $score</h2>";


}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тест 1</title>
</head>
<body>
<form method="post">
    Введите свое имя: <input name="name" required>* (Обязательное поле)
    <p><b><?= $decode[1]['answer'] ?></b><Br>
        <input type="radio" name="question1" value="<?= $decode[0]["question1"] ?>"> <?= $decode[0]["question1"] ?><Br>
        <input type="radio" name="question1"
               value="<?= $decode[2]["possibleAnswer1.1"] ?>"> <?= $decode[2]["possibleAnswer1.1"] ?><Br>
        <input type="radio" name="question1"
               value="<?= $decode[2]["possibleAnswer1.2"] ?>"> <?= $decode[2]["possibleAnswer1.2"] ?><Br>
    </p>

    <p><b><?= $decode[1]['answer2'] ?></b><Br>
        <input type="radio" name="question2"
               value="<?= $decode[2]["possibleAnswer2.1"] ?>"> <?= $decode[2]["possibleAnswer2.1"] ?><Br>
        <input type="radio" name="question2" value="<?= $decode[0]["question2"] ?>"> <?= $decode[0]["question2"] ?><Br>
        <input type="radio" name="question2"
               value="<?= $decode[2]["possibleAnswer2.2"] ?>"> <?= $decode[2]["possibleAnswer2.2"] ?><Br>
    </p>

    <p><b><?= $decode[1]['answer3'] ?></b><Br>
        <input type="radio" name="question3"
               value="<?= $decode[2]["possibleAnswer3.1"] ?>"> <?= $decode[2]["possibleAnswer3.1"] ?><Br>
        <input type="radio" name="question3"
               value="<?= $decode[2]["possibleAnswer3.2"] ?>"> <?= $decode[2]["possibleAnswer3.2"] ?><Br>
        <input type="radio" name="question3" value="<?= $decode[0]["question3"] ?>"> <?= $decode[0]["question3"] ?><Br>
    </p>

    <p><b><?= $decode[1]['answer4'] ?></b><Br>
        <input type="radio" name="question4" value="<?= $decode[0]["question4"] ?>"> <?= $decode[0]["question4"] ?><Br>
        <input type="radio" name="question4"
               value="<?= $decode[2]["possibleAnswer4.1"] ?>"> <?= $decode[2]["possibleAnswer4.1"] ?><Br>
        <input type="radio" name="question4"
               value="<?= $decode[2]["possibleAnswer4.2"] ?>"> <?= $decode[2]["possibleAnswer4.2"] ?><Br>
    </p>

    <p><b><?= $decode[1]['answer5'] ?></b><Br>
        <input type="radio" name="question5"
               value="<?= $decode[2]["possibleAnswer5.1"] ?>"> <?= $decode[2]["possibleAnswer5.1"] ?><Br>
        <input type="radio" name="question5" value="<?= $decode[0]["question5"] ?>"> <?= $decode[0]["question5"] ?><Br>
        <input type="radio" name="question5"
               value="<?= $decode[2]["possibleAnswer5.2"] ?>"> <?= $decode[2]["possibleAnswer5.2"] ?><Br>
    </p>
    <input type="submit" name="OK" value="Отправить">
</form>
</body>
</html>