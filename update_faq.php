<?php
// delete_record.php

// Assuming you have a database connection file
require_once "includes/config.php";
$pdo = DATABASE::connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the POST data
    $faqId = $_POST['id'];
    $updatedQuestion = $_POST['question'];
    $updatedAnswer = $_POST['answer'];  

    // Update the FAQ in the database
    $sql = "UPDATE business_faq SET Questions = :question, Answer = :answer WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':question', $updatedQuestion, PDO::PARAM_STR);
    $stmt->bindParam(':answer', $updatedAnswer, PDO::PARAM_STR);
    $stmt->bindParam(':id', $faqId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Success
        echo "successfully";
    } else {
        // Error
        echo "Error updating FAQ: " . $stmt->errorInfo()[2];
    }

    // Close the statement
    $stmt->closeCursor();
}
?>
