<?php
include 'includes/config.php';
$pdo = DATABASE::connection();

$response = array(); // Initialize a response array

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT Status
           FROM application_list
           WHERE app_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            // Data found, add it to the response array
            $response['Status'] = $row['Status'];
            $response['success'] = true;
        } else {
            // No data found
            $response['success'] = false;
            $response['message'] = 'No data found for the given ID';
        }
    } else {
        // Query execution failed
        $response['success'] = false;
        $response['message'] = 'Query execution failed';
    }
} else {
    // ID not provided in POST request
    $response['success'] = false;
    $response['message'] = 'ID not provided in the POST request';
}

if (isset($_POST['hiddendata1'])) {
    $hiddendata1 = $_POST['hiddendata1'];
    $status = $_POST['status']; // Make sure 'status' is passed in the POST request

    $sql = "UPDATE application_list SET Status = :status WHERE app_id = :hiddendata";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([
        ':status' => $status,
        ':hiddendata' => $hiddendata1
    ])) {
        $response = array(
            'status' => 'success'
        );
    } else {
        $response = array(
            'status' => 'failed',
            'error' => $stmt->errorInfo()
        );
    }
} elseif (!isset($_POST['id'])) { // Check if 'id' is also not provided
    $response = array(
        'status' => 'failed',
        'message' => 'Invalid request'
    );
}

// Encode the response as JSON and send it
echo json_encode($response);
?>
