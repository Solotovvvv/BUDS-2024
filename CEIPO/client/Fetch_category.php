<?php
// Include the database configuration
include '../../includes/config.php';

// Establish a database connection
$pdo = DATABASE::connection();

if (isset($_POST['category'])) {
    // Sanitize user input
    $selectedCategory = $_POST['category'];
    $selectedSubCategory = isset($_POST['subcategory']) ? $_POST['subcategory'] : null;
    $selectedBarangay = isset($_POST['barangays']) ? $_POST['barangays'] : null; // Add barangay filter
    $selectedCapitalization = isset($_POST['capitalization']) ? $_POST['capitalization'] : null; // Add capitalization filter
    $selectedBusinessStatus = 4;

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
        `business_links` AS bsl ON BL.`bus_id` = bsl.`bus_id`";

    // Apply conditions based on the selected category
    if ($selectedBarangay === "") {
        $query .= " WHERE BL.`BusinessCategory` = :selectedCategory  AND BL.`BusinessStatus` = :selectedBusinessStatus";
    }

    if ($selectedBarangay !== "") {
        $query .= " WHERE BL.`BusinessCategory` = :selectedCategory  AND BL.`BusinessStatus` = :selectedBusinessStatus";
    }

    // Include subcategory condition only if it's selected and not "Select"
    if (!empty($selectedSubCategory) && $selectedSubCategory !== "Select") {
        $query .= " AND BL.`BusinessSubCategory` = :selectedSubCategory";
    }

    // Include barangay condition only if it's selected
    if (!empty($selectedBarangay)) {
        $query .= " AND BL.`BusinessBrgy` = :selectedBarangay";
    }

    // Include capitalization condition based on the selected option
    if (!empty($selectedCapitalization)) {
        switch ($selectedCapitalization) {
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
    $statement->bindParam(':selectedCategory', $selectedCategory, PDO::PARAM_STR);
    $statement->bindParam(':selectedBusinessStatus', $selectedBusinessStatus, PDO::PARAM_INT);

    // Bind subcategory parameter only if it's selected and not "Select"
    if (!empty($selectedSubCategory) && $selectedSubCategory !== "Select") {
        $statement->bindParam(':selectedSubCategory', $selectedSubCategory, PDO::PARAM_INT);
    }

    // Bind barangay parameter only if it's selected
    if (!empty($selectedBarangay)) {
        $statement->bindParam(':selectedBarangay', $selectedBarangay, PDO::PARAM_INT);
    }



    // Execute the statement
    $statement->execute();

    // Fetch the results
    $businessData = $statement->fetchAll(PDO::FETCH_ASSOC);
}
else if ($_POST['category'] === 0 && $_POST['subcategory'] === "Select" && isset($_POST['barangays'])) {
    $Barangay = isset($_POST['barangays']) ? $_POST['barangays'] : null; // Add barangay filter
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
    WHERE BL.`BusinessBrgy` = :Barangay AND BL.`BusinessStatus` = :BusinessStatus";

    // Prepare the PDO statement
    $statement = $pdo->prepare($query);

    // Bind parameters
    $statement->bindParam(':BusinessStatus', $BusinessStatus, PDO::PARAM_INT);
    $statement->bindParam(':Barangay', $Barangay, PDO::PARAM_INT);

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
