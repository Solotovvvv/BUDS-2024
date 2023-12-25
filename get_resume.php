<?php
// Include your PHP logic here
include 'includes/config.php'; // Include your database configuration file
$pdo = Database::connection(); // Establish a PDO connection

$app_id = $_POST['app_id'];

// get_resume.php

try {
    // Prepare and execute SQL query
    $query = "SELECT `file` FROM `user_resume` WHERE `app_id` = :app_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':app_id', $app_id, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the result
    $file = $stmt->fetchColumn();

    if ($file) {
        // Assuming 'uploads/' is the directory where your files are stored
        $pdfPath = 'user_module-main/' . $file;

        // Return the path to the client
        echo $pdfPath;
    } else {
        // Return an error message if the record is not found
        echo 'File not found';
    }
} catch (PDOException $e) {
    // Handle database errors
    echo 'Error: ' . $e->getMessage();
}
?>
