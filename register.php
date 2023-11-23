<?php

    // Параметры для подключения к базе данных
    $db_host = "localhost"; 
    $db_name = "typo.net";
    $db_user = "root";
    $db_pass = "";

    // Подключаемся к базе данных   
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Проверяем, успешно ли подключились
    if($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }


    // Функция для регистрации пользователя
    function register_user($username, $email, $password, $password_confirm)
    {
        $name = $username;

        global $conn;

        // Экранируем введенные данные
        // $username = $conn->real_escape_string($username);
        // $email = $conn->real_escape_string($email);
        // $password = $conn->real_escape_string($password);
        // $password_confirm = $conn->real_escape_string($password_confirm);
    }

    // Обработка формы регистрации
    if($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $username = $_POST['username'];
        $email = $_POST['email']; 
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if(register_user($username, $email, $password, $password_confirm)) {
            echo "Регистрация прошла успешно!"; 
        } else {
            echo "Ошибка при регистрации";
        }
        // Проверяем, совпадают ли пароли 
        if($password != $password_confirm) { die("Пароли не совпадают"); }

        // Хешируем пароль перед добавлением в БД
        $password_hash = sha1($password);
        
        // Проверяем, не занят ли email
        $sql = "SELECT * FROM users WHERE E-Mail='$email'";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            die("Пользователь с таким email уже зарегистрирован");
        }
        
        // Добавляем пользователя в базу данных 
        $sql = "INSERT INTO users (name, E-Mail, password)
            VALUES ('$name', '$email', '$password_hash')";
                
        if($conn->query($sql)) { return true; } else { return false; }
    }
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TypoNet</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/reg.css">
        <script src="js/main.js"></script>
    </head>
    <body>
        <div class="page-wrapper">
            <header>
                <div class="top-menu">
                    <div class="text">
                        <div class="header-text">
                            <a class="selected" href="#">Главная</a>
                        <!-- <a href="poly.html"> -->
                            <div class="dropdown">
                                <span class="links">Копи-центр</span>
                                <div class="dropdown-content">
                                    <a class="link1" href="doc-photo.html">Фото на документы</a>
                                    <a class="link1" href="print.html">Печать</a>
                                    <a class="link1" href="Xerxox.html">Ксерокс</a>
                                    <a class="link1" href="Scan.html">Скан</a>
                                    <a class="link1" href="internet.html">Интернет услуги</a>
                                    <a class="link1" href="Typing.html">Набор текста</a>
                                    <a class="link1" href="cross1.html">Переплет</a>
                                    <a class="link1" href="Lamination.html">Ламинирование</a>
                                    <a class="link1" href="visitcards.html">Визитки</a>
                                    <a class="link1" href="Egov.html">Egov услуги</a>
                                    <a class="link1" href="translating.html">Перевод (каз, рус, англ)</a>
                                    <a class="link1" href="insurance.html">Автострахование</a>
                                    <a class="link1" href="tech-look.html">Техосмотр</a>
                                </div>
                            </div>
                        </a>
                        <a href="about.html" class="links">О нас</a>
                        <a href="contacts.html" class="links">Контакты</a>
                        <div class="dropdown">
                            <span class="links">Login</span>
                            <div class="dropdown-content">
                                <a class="link1" href="register.php">Register</a>
                                <a class="link1" href="login.php">Log in</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </header>
            <main>
                <form action="" method="post" class="reg">
                    <label for="username">Enter your username</label>
                    <input type="text" name="username" id="username">
                    <br>
                    <label for="password">Enter your password</label>
                    <input type="password" name="password" id="password">
                    <br>
                    <label for="confirm">Confirm your password</label>
                    <input type="password" name="confirm" id="password_confirm">
                    <br>
                    <label for="email">Enter tour E-Mail</label>
                    <input type="email" name="email" id="email">
                    <button type="submit">Submit</button>
                </form>
            </main>
            <footer>
                <div class="bottom-menu">
                    <a href="#" class="links">FullName</a>
                    <a href="#" class="links">PhoneOrMessenger</a>
                    <a href="#" class="links">SocNets</a>
                    <a href="#" class="links">E-Mail</a>
                </div>
            </footer>
        </div>
    </body>
</html>