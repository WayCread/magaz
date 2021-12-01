<?php

$host = 'databases.0010webhost.com';
$user = 'id18047510_root';
$pswd = '111';
$db = 'id18047510_magaz'; 

$mysqli = new mysqli($host, $user, $pswd, $db); // Створюємо нове підключення з назвою $mysqli за допомогою створення об'єта класу mysqli. Параметри підключення по порядку: сервер, логін, пароль, БД
$mysqli->set_charset("utf8"); // Встановлюємо кодування utf8

if (mysqli_connect_errno()) {
    printf("Підключення до сервера не вдалось. Код помилки: %s\n", mysqli_connect_error());
    exit;
}

?>
