<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
</head>
<body>
    <?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=products', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT id, product_code, product_name, product_desc, price FROM products");
        
        echo '<table border="1">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>'.$row["id"].'</td>';
            echo '<td>'.$row["product_code"].'</td>';
            echo '<td>'.$row["product_name"].'</td>';
            echo '<td>'.$row["product_desc"].'</td>';
            echo '<td>'.$row["price"].'</td>';
            echo '</tr>';
        }
        echo '</table>';

        $stmt->closeCursor();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
    ?>
</body>
</html>
