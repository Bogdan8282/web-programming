<!DOCTYPE html>
<html>
<head>
    <title>Бібліотека</title>
</head>
<body>
    <h1>Інформація про книги</h1>
    <?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=books', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT title, author, genre, price, published_date FROM books";
        $stmt = $pdo->query($query);

        echo '<table border="1">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["title"] . '</td>';
            echo '<td>' . $row["author"] . '</td>';
            echo '<td>' . $row["genre"] . '</td>';
            echo '<td>' . $row["price"] . '</td>';
            echo '<td>' . $row["published_date"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        $stmt->closeCursor();
    } catch (PDOException $e) {
        die("Помилка з'єднання з базою даних: " . $e->getMessage());
    }
    ?>
</body>
</html>
