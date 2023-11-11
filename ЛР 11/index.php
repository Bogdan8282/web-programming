<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
</head>
<body>
    <?php $mysqli = new mysqli('localhost','root','','products');
    if ($mysqli->connect_error) { die('Error : ('. $mysqli->connect_errno .') '.
    $mysqli->connect_error); }
    $results = $mysqli->query("SELECT id, product_code, product_name, product_desc, price FROM products");
    print '<table border="1">';
    while($row = $results->fetch_assoc()) { print '<tr>';
    print '<td>'.$row["id"].'</td>';
    print '<td>'.$row["product_code"].'</td>';
    print '<td>'.$row["product_name"].'</td>';
    print '<td>'.$row["product_desc"].'</td>';
    print '<td>'.$row["price"].'</td>';
    print '</tr>'; } print '</table>';
    $results->free();
    $mysqli->close();
    ?>
</body>
</html>