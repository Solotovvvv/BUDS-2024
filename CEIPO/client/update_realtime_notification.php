<?php
require '../../vendor/autoload.php'; // Include Pusher PHP library
require_once '../../includes/config.php'; // Use require_once for better file inclusion

try {
    // Initialize Pusher with credentials
    $pusher = new Pusher\Pusher(
        '5b1eb2892347a33d5be9',
        '0dbf6b6d40bb6a4ee500',
        '1766635',
        [
            'cluster' => 'ap1',
            'useTLS' => true
        ]
    );

    // Establish database connection
    $pdo = Database::connection();

    // Query to get the count of pending items
    $stmt = $pdo->prepare("SELECT COUNT(*) AS pendingCount FROM business_list WHERE BusinessStatus = 2");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $pendingCount = $row['pendingCount'];

    // Trigger a Pusher event with the pending count
    $pusher->trigger('business-channel', 'business-event', ['pendingCount' => $pendingCount]);

    // Return a JSON response indicating success
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Log any errors that occur during the Pusher event trigger
    error_log('Error triggering Pusher event: ' . $e->getMessage());

    // Return a JSON response indicating failure
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
