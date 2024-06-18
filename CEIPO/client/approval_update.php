<?php
include '../../includes/config.php';
$pdo = DATABASE::connection();

$response = array('status' => 'failed'); // Initialize response with a default status

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['views'])) {
        // Fetch data based on views parameter
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
    } elseif (isset($_POST['hiddendata'], $_POST['status'])) {
        // Update BusinessStatus in business_list table
        $hiddendata = $_POST['hiddendata'];
        $status = intval($_POST['status']);
        $remarksDataStep2 = isset($_POST['remarks']) ? htmlspecialchars($_POST['remarks']) : null;
        $statusValue = ($status == 1) ? 1 : 3;

        // Update BusinessStatus
        $updateBusinessListSql = "UPDATE business_list SET BusinessStatus = :status WHERE bus_id = :hiddendata";
        $updateBusinessListStmt = $pdo->prepare($updateBusinessListSql);
        $executeBusinessList = $updateBusinessListStmt->execute([
            ':status' => $statusValue,
            ':hiddendata' => $hiddendata,
        ]);

        // Update remarks and status in business_requirement table
        $updateBusinessRequirementSql = "UPDATE business_requirement 
                                         SET remarks = :remarks, 
                                             status = CASE WHEN :status = 1 THEN 1 ELSE 2 END 
                                         WHERE bus_id = :hiddendata";
        $updateBusinessRequirementStmt = $pdo->prepare($updateBusinessRequirementSql);
        $executeBusinessRequirement = $updateBusinessRequirementStmt->execute([
            ':remarks' => $remarksDataStep2,
            ':status' => $status,
            ':hiddendata' => $hiddendata,
        ]);

        if ($executeBusinessList && $executeBusinessRequirement) {
            $response['status'] = 'success';
            $response['message'] = 'Business status and remarks updated successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to update business status and remarks.';
            $response['error'] = array_merge(
                $updateBusinessListStmt->errorInfo(),
                $updateBusinessRequirementStmt->errorInfo()
            );
        }
    } else {
        // If the request is POST but neither views nor hiddendata/status are set
        $response['status'] = 'error';
        $response['message'] = 'Invalid request parameters';
    }
} else {
    // If the request method is not POST
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

// Encode the response as JSON and output it
echo json_encode($response);

// Trigger Pusher event if status is success
if (isset($response['status']) && $response['status'] === 'success') {
    // Include Pusher configuration
    require_once 'pusher_config.php';

    // Trigger a Pusher event (replace with your actual event details)
    $pusher->trigger('business-channel', 'business-event', null);
}
?>
