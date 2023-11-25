<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Material</title>
</head>
<body>
    <?php
    session_start();

    require_once 'config.php';

    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = (int)$_POST['id'];
        $product = $_POST['product'];
        $amount = $_POST['amount'];

        $stmt = $pdo->prepare("INSERT INTO materials (id, product, amount) VALUES (:id, :product, :amount)");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':product', $product, PDO::PARAM_STR);
        $stmt->bindParam(':amount', $amount);
        
        try {
            $stmt->execute();
            header("Location: materials.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>
    <h2>Create New Material</h2>

    <form method="post" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <label for="product">Product:</label>
        <input type="text" id="product" name="product" required><br>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required><br>

        <button type="submit">Create</button>
    </form>
    <p><a href="materials.php">Back to Materials</a></p>
    <p><a href="index.php">Back to Login</a></p>
</body>
</html>
