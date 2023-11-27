<?php
    require_once('consts.php');
    // данные для подключения к базе данных
    $host = SQL_HOST; // хост базы данных
    $username = SQL_USERNAME; // имя пользователя базы данных
    $password = SQL_PASSWORD; // пароль пользователя базы данных
    $dbname = SQL_DBNAME; // имя базы данных

    // подключение к базе данных
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // проверка соединения на ошибки
    if (!$conn) {
        die('Ошибка подключения: ' . mysqli_connect_error());
    }
?>