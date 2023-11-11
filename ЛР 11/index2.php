<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $mysqli = new mysqli('localhost','root','','products');
    // product 1
    $product_code1 = '"' . $mysqli->real_escape_string('P1') . '"';
    $product_name1 = '"' . $mysqli->real_escape_string('Google Nexus') . '"';
    $product_price1 = '"' . $mysqli->real_escape_string('149') . '"';

    // product 2
    $product_code2 = '"' . $mysqli->real_escape_string('P2') . '"';
    $product_name2 = '"' . $mysqli->real_escape_string('Apple iPad 2') . '"';
    $product_price2 = '"' . $mysqli->real_escape_string('217') . '"';

    // product 3
    $product_code3 = '"' . $mysqli->real_escape_string('P3') . '"';
    $product_name3 = '"' . $mysqli->real_escape_string('Samsung Galaxy Note') . '"';
    $product_price3 = '"' . $mysqli->real_escape_string('259') . '"';

    // Insert multiple rows
    $insert = $mysqli->query("INSERT INTO products(product_code, product_name, price) VALUES ($product_code1, $product_name1, $product_price1), ($product_code2, $product_name2, $product_price2), ($product_code3, $product_name3, $product_price3)");

    if ($insert) {
        print 'Запит успішно виконаний! Всього ' . $mysqli->affected_rows . ' рядків додано.';
    } else {
        die('Помилка: (' . $mysqli->errno . ') ' . $mysqli->error);
    }
    ?>
</body>
</html>