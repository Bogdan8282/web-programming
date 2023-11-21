<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація</title>
</head>
<body>
    <?php
    function pdo_errors($stmt) {
        $err = $stmt->errorInfo();
        die("Error: " . $err[2]);
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=mysql', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $stmt->execute([$username, $password]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                function redirectToLogin() {
                    header('Location: login.php');
                    exit;
                }
                
                redirectToLogin();
            } 
            else {
                print '<p>Невірний нікнейм або пароль.</p>';
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    ?>

    <h2>Увійдіть в систему</h2>
    <form method="post" action="">
        <label for="username">Логін:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Увійти">
    </form>
</body>
</html>