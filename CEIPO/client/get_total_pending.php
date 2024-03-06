<?php
require_once '../../includes/config.php'; // Use require_once for better file inclusion

try {
    // Establish database connection
    $pdo = Database::connection();

    // Query to get the count of pending items
    $stmt = $pdo->prepare("SELECT COUNT(*) AS pendingCount FROM business_list WHERE BusinessStatus = 2");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $pendingCount = $row['pendingCount'];

    // Prepare data to send back to the client-side
    $responseData = ['success' => true, 'pendingCount' => $pendingCount];

    // Return a JSON response including the pending count
    echo json_encode($responseData);
} catch (Exception $e) {
    // Log any errors that occur during the database query
    error_log('Error retrieving pending count: ' . $e->getMessage());
    // Return a JSON response indicating failure
    echo json_encode(['success' => false, 'error' => 'Error retrieving pending count']);
}
?>
