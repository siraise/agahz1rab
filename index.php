<?php
session_start();

// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем данные из формы
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Сохраняем данные в сессии (для демонстрации)
    $_SESSION['user_data'] = [
        'username' => $username,
        'email' => $email,
        'password' => $password // Не храните пароли в сессии в реальных приложениях!
    ];

    // Перенаправляем на ту же страницу для вывода данных в консоль
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <script>
        // Функция для вывода данных в консоль
        function showData() {
            const userData = <?php echo json_encode($_SESSION['user_data'] ?? []); ?>;
            console.log("Имя пользователя:", userData.username);
            console.log("Email:", userData.email);
            console.log("Пароль:", userData.password);
        }
    </script>
</head>
<body onload="showData()">

<h1>Форма регистрации</h1>
<form method="post" action="">
    <label for="username">Имя пользователя:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Зарегистрироваться">
</form>

</body>
</html>