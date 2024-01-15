<?php
include '../../includes../config.php';
$pdo = DATABASE::connection();

$response = array();

if (isset($_POST['views'])) {
    $id = $_POST['views'];
    $sql = "SELECT *
    FROM business_list AS bl
    INNER JOIN business_requirement AS br ON bl.bus_id = br.bus_id
    INNER JOIN owner_list AS ol ON bl.ownerId = ol.ID
    INNER JOIN brgyzone_list AS bz ON bl.BusinessBrgy = bz.ID
    INNER JOIN category_list as c ON bl.BusinessCategory = c.ID
    INNER JOIN subcategory_list as sc ON bl.BusinessSubCategory = sc.ID
    WHERE bl.bus_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData) {
            $response = $userData;
        } else {
            $response = array(
                'status' => 'failed',
                'message' => 'Data not found'
            );
        }
    } else {
        $response = array(
            'status' => 'failed',
            'error' => $stmt->errorInfo()
        );
    }
} elseif (isset($_POST['hiddendata'])) {
    $hiddendata = $_POST['hiddendata'];




    $remarksDataStep1 = ($_POST['remarksDataStep2']);
    $remarksDataStep2 = ($_POST['remarksDataStep3']);
    $remarksDataStep3 = ($_POST['remarksDataStep4']);
    $remarksDataStep4 = ($_POST['remarksDataStep5']);
    $remarksDataStep5 = ($_POST['remarksDataStep6']);


    $total1 = intval($_POST['remarksDataStep2']);
    $total2 = intval($_POST['remarksDataStep3']);
    $total3 = intval($_POST['remarksDataStep4']);
    $total4 = intval($_POST['remarksDataStep5']);
    $total5 = intval($_POST['remarksDataStep6']);

    // Calculate the sum of remarksDataStep2 to remarksDataStep6
    $totalRemarks = ($total1 + $total2 + $total3 + $total4 + $total5) / 5;

  
   // Update BusinessStatus in the business_list table
    $updateBusinessListSql = "UPDATE business_list SET BusinessStatus = :status WHERE bus_id = :hiddendata";
    $updateBusinessListStmt = $pdo->prepare($updateBusinessListSql);

    if ($updateBusinessListStmt->execute([
        ':status' => ($totalRemarks == 1) ? 1 : 3,
        ':hiddendata' => $hiddendata,
    ])) {
            // Update remarks fields in the business_requirement table
            $updateBusinessRequirementSql = "UPDATE business_requirement 
                                             SET remarks_brgyClearance = :remarks_brgyClearance, 
                                                 remarks_dti = :remarks_dti, 
                                                 remarks_sanitary = :remarks_sanitary, 
                                                 remarks_cedula = :remarks_cedula, 
                                                 remarks_mayorsPermit = :remarks_mayorsPermit
                                             WHERE bus_id = :hiddendata";

            $updateBusinessRequirementStmt = $pdo->prepare($updateBusinessRequirementSql);

            if ($updateBusinessRequirementStmt->execute([
                ':remarks_brgyClearance' => ($totalRemarks == 1) ? "1" : $remarksDataStep1,
                ':remarks_dti' => ($totalRemarks == 1) ? "1" : $remarksDataStep2,
                ':remarks_sanitary' => ($totalRemarks == 1) ? "1" : $remarksDataStep3,
                ':remarks_cedula' => ($totalRemarks == 1) ? "1" : $remarksDataStep4,
                ':remarks_mayorsPermit' => ($totalRemarks == 1) ? "1" : $remarksDataStep5,
                ':hiddendata' => $hiddendata,
            ])) {
                $response = array(
                    'status' => 'success'
                );
            } else {
                $response = array(
                    'status' => 'failed',
                    'error' => $updateBusinessRequirementStmt->errorInfo()
                );
            }
        } else {
            $response = array(
                'status' => 'failed',
                'error' => $updateBusinessListStmt->errorInfo()
            );
    }
} else {
    $response = array(
        'status' => 'failed',
        'message' => 'Invalid request'
    );
}




echo json_encode($response);
