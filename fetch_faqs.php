<?php
// fetch_faqs.php

// Assuming you have a database connection file
require_once "includes/config.php";
$pdo = DATABASE::connection();
// Check if the business ID is provided in the request
if (isset($_GET['id'])) {
    $bus_id = $_GET['id'];

    try {
      

        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement
        $stmt = $pdo->prepare("SELECT questions, answer FROM business_faq WHERE bus_id = :bus_id");

        // Bind parameters
        $stmt->bindParam(':bus_id', $bus_id, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Fetch FAQs into an array
        $faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return JSON response
        echo json_encode(['status' => 'success', 'faqs' => $faqs]);
    } catch (PDOException $e) {
        // Handle database connection error
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $e->getMessage()]);
    }
} else {
    // If business ID is not provided in the request
    echo json_encode(['status' => 'error', 'message' => 'Business ID not provided']);
}
?>
