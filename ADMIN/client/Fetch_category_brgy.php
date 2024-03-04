<?php
// Include the database configuration
include '../../includes../config.php';

// Establish a database connection
$pdo = DATABASE::connection();

if (isset($_POST['barangays'])) {
    $Barangay = isset($_POST['barangays']) ? $_POST['barangays'] : null; // Add barangay filter
    $capitalization = isset($_POST['capitalization']) ? $_POST['capitalization'] : null; // Add barangay filter
    $BusinessStatus = 4;


    // Define the SQL query
    // ... (previous code)

    // Define the base SQL query
    $query = "
    SELECT
        BL.*, 
        BLT.`bus_lat`,
        BLT.`bus_long`,
        bz.*,
        Cl.*,
        SL.*,
        ol.*,
        bsl.*
    FROM
        `business_list` AS BL
    INNER JOIN
        `business_location` AS BLT ON BL.`bus_id` = BLT.`bus_id`
    INNER JOIN
        `category_list` AS CL ON BL.`BusinessCategory` = CL.`ID`
    INNER JOIN
        `subcategory_list` AS SL ON BL.`BusinessSubCategory` = SL.`ID`
    INNER JOIN 
        `owner_list` AS ol ON BL.`ownerId` = ol.`ID`
    INNER JOIN
        `brgyzone_list` AS bz ON BL.`BusinessBrgy` = bz.`ID`
    INNER JOIN
        `business_links` AS bsl ON BL.`bus_id` = bsl.`bus_id`
    WHERE BL.`BusinessStatus` = :BusinessStatus";

    // Append barangay condition if $Barangay is not equal to "0"
    if ($Barangay !== "0") {
        $query .= " AND BL.`BusinessBrgy` = :Barangay";
    }

    if ($capitalization !== "Select") {
        switch ($capitalization) {
            case 'low':
                $query .= " AND BL.`capitalization` < 10000";
                break;
            case 'medium':
                $query .= " AND BL.`capitalization` >= 10000 AND BL.`capitalization` <= 100000";
                break;
            case 'high':
                $query .= " AND BL.`capitalization` > 100000";
                break;
        }
    }

    
    // Prepare the PDO statement
    $statement = $pdo->prepare($query);

    // Bind parameters
    $statement->bindParam(':BusinessStatus', $BusinessStatus, PDO::PARAM_INT);

    // Bind barangay parameter only if it's not equal to "0"
    if ($Barangay !== "0") {
        $statement->bindParam(':Barangay', $Barangay, PDO::PARAM_STR);
    }

    // Execute the statement
    $statement->execute();

    // Fetch the results
    $businessData = $statement->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($businessData)) {
    header('Content-Type: application/json');
    echo json_encode($businessData);
} else {
    http_response_code(404); // Not Found
    echo json_encode(['Success' => 'No businesses available for the selected category, subcategory, and capitalization.']);
}
?>
