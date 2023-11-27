<?php
    require_once('sql.php');
    require_once('consts.php');

    // обработка отправки формы
    if (isset($_POST['submit'])) {
        // получение данных из формы регистрации
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'].PASSWD_SALT, PASSWORD_DEFAULT); // хеширование пароля
        $confirm = $_POST['confirm'];
    
        if($password == $confirm)
        {   
            echo"Passwords doesn't matches!";
            exit();
            // die;
        }
        else
        {
            // выполнение запроса на добавление нового пользователя в базу данных
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password');"; 
        }
    
        if (mysqli_query($conn, $sql))
        {
            echo "Новый пользователь успешно добавлен в базу данных";
            // echo "<a href=\"login.php\">Перейти на страницу авторизации</a>";
            // перенаправление на страницу авторизации
            header("Location: login.php");
            exit();
        }
        else { echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn); }
        }
    
        // закрытие соединения с базой данных
        mysqli_close($conn);
    
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
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
                    <label for="email">Enter your E-Mail</label>
                    <input type="email" name="email" id="email">
                    <br>
                    <button type="submit" name="submit">Submit</button>
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