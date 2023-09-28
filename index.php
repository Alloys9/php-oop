<?php
require_once 'ClassAutoload.php';

$OBJ_Layout = new layouts();
$OBJ_Forms = new Forms();

//database connection class
require_once '../a2/database/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Create a database connection
    $db = new Database();
    $conn = $db->getConnection();

    // Check if a user with the same email already exists
    $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        // User with the same email already exists, show error message
        echo "Error: User with this email already exists!";
    } else {
        // No duplicate found, proceed with insertion
        $insertStmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $insertStmt->bindParam(':name', $name);
        $insertStmt->bindParam(':email', $email);

        if ($insertStmt->execute()) {
            // Data successfully inserted
            echo "Data saved to the database!";
        } else {
            // Error occurred while inserting data
            echo "Error: " . $insertStmt->errorInfo()[2];
        }
    }
}

$OBJ_Layout->headers();
$OBJ_Layout->logo();
$OBJ_Layout->navigation();
$OBJ_Layout->banner();
$OBJ_Forms->signInForm();
?>
