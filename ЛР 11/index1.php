<!DOCTYPE html>
<html>
<head>
    <title>Бібліотека</title>
</head>
<body>
    <h1>Інформація про книги</h1>
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'books');

    if ($mysqli->connect_error) {
        die("Помилка з'єднання з базою даних: " . $mysqli->connect_error);
    }

    $query = "SELECT title, author, genre, price, published_date FROM books";
    $results = $mysqli->query($query);

    if (!$results) {
        die("Помилка запиту: " . $mysqli->error);
    }

    print '<table border="1">';
    while ($row = $results->fetch_assoc()) {
        print '<tr>';
        print '<td>' . $row["title"] . '</td>';
        print '<td>' . $row["author"] . '</td>';
        print '<td>' . $row["genre"] . '</td>';
        print '<td>' . $row["price"] . '</td>';
        print '<td>' . $row["published_date"] . '</td>';
        print '</tr>';
    }
    print '</table>';

    $results->free();
    $mysqli->close();
    ?>
</body>
</html>