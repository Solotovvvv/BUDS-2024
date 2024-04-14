<?php
session_start();
require_once "includes/config.php";

// Check if the user is logged in
if(!isset($_SESSION['email'])) {
    echo "You are not logged in.";
    exit;
}

// Get the submitted old and new passwords
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];

try {
    // Get PDO connection
    $pdo = DATABASE::connection();

    // Retrieve user's current password from the database
    $email = $_SESSION['email'];
    $stmt = $pdo->prepare("SELECT `password` FROM `login` WHERE `email` = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $currentPassword = $row['password'];

    // Verify if the old password matches the one in the database
    if(sha1($oldPassword) === $currentPassword) {
        // Hash the new password using SHA1
        $hashedNewPassword = sha1($newPassword);

        // Update the password in the database using prepared statement
        $stmt = $pdo->prepare("UPDATE `login` SET `password` = ? WHERE `email` = ?");
        $stmt->execute([$hashedNewPassword, $email]);
        echo "Password updated successfully.";
    } else {
        echo "Old password is incorrect.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pdo = null;
?>
