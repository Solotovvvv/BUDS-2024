<?php
require_once '../includes/config.php';

// SQL query to retrieve data and count status occurrences
$sql = "SELECT BusinessStatus, COUNT(*) as count FROM business_list GROUP BY BusinessStatus";
$result = $conn->query($sql);

$statusData = array(0, 0, 0, 0); // Initialize status data array

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $status = $row['BusinessStatus'];
        $count = $row['count'];

        // Map status values to array indices based on your specified order
        if ($status == 1) {
            $statusData[0] = intval($count); // Passed
        } elseif ($status == 2) {
            $statusData[1] = intval($count); // Pending
        } elseif ($status == 3) {
            $statusData[2] = intval($count); // Re-Evaluate
        } elseif ($status == 4) {
            $statusData[3] = intval($count); // Approved
        }
    }
}

// Close the database connection
$conn->close();

// Output data as JSON with numeric values
echo json_encode($statusData);
?>
