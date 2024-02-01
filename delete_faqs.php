<?php
// delete_record.php

// Assuming you have a database connection file
require_once "includes/config.php";
$pdo = DATABASE::connection();

// Check if the business ID, question ID, and answer ID are provided in the request
if (isset($_POST['id'])) {
    $bus_id = $_POST['id'];
 

    try {
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement to delete the record
        $stmt = $pdo->prepare("DELETE FROM business_faq WHERE id = :bus_id");

        // Bind parameters
        $stmt->bindParam(':bus_id', $bus_id, PDO::PARAM_INT);
        
        $stmt->execute();

        // Return JSON response
        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        // Handle database connection error
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $e->getMessage()]);
    }
} else {
    // If required parameters are not provided in the request
    echo json_encode(['status' => 'error', 'message' => 'Required parameters not provided']);
}
?>
