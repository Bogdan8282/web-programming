<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php //Налаштування БД 
    $database_host = 'localhost'; 
    $database_username = 'root';
    $database_password = '';
    $database_name = 'products';
    //Відкриваємо нове з'єднання з MySQL сервером 
    $mysqli = new mysqli($database_host,
    $database_username,
    $database_password,
    $database_name);
    //Виводимо помилку з'єднання 
    if ($mysqli->connect_error) { die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error); } ?>
</body>
</html>