<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблиця</title>
</head>
<body>
    <?php
    $host = 'localhost';
    $db = 'users';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Помилка підключення до бази даних: " . $e->getMessage());
    }

    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h2>Таблиця користувачів</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['user_id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['full_name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['password']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php">Повернутись до авторизації</a>
</body>
</html>