<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materials</title>
</head>
<body>
    <?php
    session_start();

    require_once 'config.php';

    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
        exit();
    }

    $stmt = $pdo->query("SELECT * FROM materials");
    $materials = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
        $idToDelete = $_POST['delete'];

        $deleteStmt = $pdo->prepare("DELETE FROM materials WHERE id = :id");
        $deleteStmt->bindParam(':id', $idToDelete);
        $deleteStmt->execute();

        header("Location: materials.php");
        exit();
    }
    ?>
    <h2>Materials</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
        <?php foreach ($materials as $material) : ?>
            <tr>
                <td><?php echo $material['id']; ?></td>
                <td><?php echo $material['product']; ?></td>
                <td><?php echo $material['amount']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="delete" value="<?php echo $material['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="create.php">New material</a></p>
    <p><a href="index.php">Back to Login</a></p>
</body>
</html>
