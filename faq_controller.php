<?php
require_once "includes/config.php";

$pdo = DATABASE::connection();

// Assuming $bus_id, $_POST['questions'], and $_POST['answers'] are available

// Process and validate input
$bus_id = $_POST['id'];
$questions = json_decode($_POST['questions'], true);
$answers = json_decode($_POST['answers'], true);

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Use a prepared statement to insert into the database
    $stmt = $pdo->prepare("INSERT INTO business_faq (bus_id, questions, answer) VALUES (:bus_id, :question, :answer)");

    // Bind parameters
    $stmt->bindParam(':bus_id', $bus_id);
    $stmt->bindParam(':question', $question);
    $stmt->bindParam(':answer', $answer);

    // Loop through questions and answers arrays
    foreach ($questions as $index => $questionData) {
        $question = $questionData['value'];
        $answer = $answers[$index]['value'];

        // Execute the prepared statement for each pair of question and answer
        $stmt->execute();
    }

    // Return success status
    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    // Handle database connection or query errors
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
} finally {
    // Close the database connection
    $pdo = null;
}
?>
