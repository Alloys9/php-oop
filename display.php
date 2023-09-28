<?php
require_once 'ClassAutoload.php';

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="User Information">
    <link rel="stylesheet" href="styles.css">
    <title>User Display</title>
</head>

<body>
    <a href="index.php">BACK</a>
    <h1>User Information</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>