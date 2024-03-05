<?php
include '../../includes/config.php';
$pdo = DATABASE::connection();

$response = array('status' => 'failed'); // Initialize response with a default status

if (isset($_POST['views'])) {
    $id = $_POST['views'];
    $sql = "SELECT *
    FROM business_list AS bl
    INNER JOIN business_requirement AS br ON bl.bus_id = br.bus_id
    INNER JOIN owner_list AS ol ON bl.ownerId = ol.ID
    INNER JOIN brgyzone_list AS bz ON bl.BusinessBrgy = bz.ID
    INNER JOIN category_list as c ON bl.BusinessCategory = c.ID
    INNER JOIN subcategory_list as sc ON bl.BusinessSubCategory = sc.ID
    INNER JOIN business_requirement as bsr on bl.bus_id = bsr.bus_id
    WHERE bl.bus_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData) {
            $response = $userData;
        } else {
            $response['message'] = 'Data not found';
        }
    } else {
        $response['error'] = $stmt->errorInfo();
    }
} elseif (isset($_POST['hiddendata'])) {
    $hiddendata = $_POST['hiddendata'];

    $remarksData = array();
    for ($i = 2; $i <= 6; $i++) {
        $remarksData[] = intval($_POST['remarksDataStep' . $i]);
    }

    // Calculate the sum of remarksDataStep2 to remarksDataStep6
    $totalRemarks = array_sum($remarksData) / count($remarksData);

    // Update BusinessStatus in the business_list table
    $updateBusinessListSql = "UPDATE business_list SET BusinessStatus = :status WHERE bus_id = :hiddendata";
    $updateBusinessListStmt = $pdo->prepare($updateBusinessListSql);

    if ($updateBusinessListStmt->execute([
        ':status' => ($totalRemarks == 1) ? 1 : 3,
        ':hiddendata' => $hiddendata,
    ])) {
        $response['status'] = 'success';
    } else {
        $response['error'] = $updateBusinessListStmt->errorInfo();
    }
} else {
    $response['message'] = 'Invalid request';
}

// Encode the response as JSON and output it
echo json_encode($response);

// Trigger Pusher event if status is success
if (isset($response['status']) && $response['status'] === 'success') {
    // Include Pusher configuration
    require_once 'pusher_config.php';

    // Fetch the pending count or perform any other necessary logic
    $stmt = $pdo->prepare("SELECT COUNT(*) AS pendingCount FROM business_list WHERE BusinessStatus = 2");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $pendingCount = $row['pendingCount'];

    // Trigger a Pusher event with the pending count
    $pusher->trigger('business-channel', 'business-event', ['pendingCount' => $pendingCount]);
}
?>
