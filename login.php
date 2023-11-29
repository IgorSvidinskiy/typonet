<?php
    require_once('sql.php');


    // Обработка отправки формы
    if (($_SERVER['REQUEST_METHOD'] === 'POST') &&(isset($_POST['username'])&&(isset($_POST['password']))))
    {

        // Получение данных из формы
        $username = $_POST['username'];
        $password = $_POST['password'];

        //$sql = "SELECT * FROM `users1`;";
        // Поиск пользователя в базе данных
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            // Проверка правильности пароля
            if (password_verify($password.PASSWD_SALT, $row['password'])) 
            {
                // echo "Авторизация успешна";wwwwwwwww``````````
                header("Location: index.html");
                // echo "&nbsp;&nbsp;&nbsp;<a href=\"index2.php\">Перейти на главную страницу</a>";
            } 
            else { echo "Неправильное имя пользователя или пароль"; }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
        <script src="js/main.js"></script>
        <title>Log-In</title>
    </head>
    <body>
        <div class="page-wrapper">
            <header>
                <div class="top-menu">
                    <div class="text">
                        <div class="header-text">
                            <a class="links" href="index.html">Главная</a>
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
                            <span class="selected">Login</span>
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
                <form action="" method="post" class="login">
                    <label for="username" style="font-family: Gilroy;">Enter a username</label>
                    <input type="text" name="username" id="username">
                    <br>
                    <label for="password" style="font-family: Gilroy;">Enter a password</label>
                    <input type="password" name="password" id="password">
                    <br>
                    <label for="rem-me">Remember me
                        <input type="checkbox" name="rem-me" id="rememberMe">
                    </label>
                    <br>
                    <button type="submit" name="submit">Log In</button>
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