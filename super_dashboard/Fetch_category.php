<?php
// Include the database configuration
include '../includes/config.php';

// Establish a database connection
$pdo = DATABASE::connection();

if (isset($_POST['category'])) {
    // Sanitize user input
    $selectedCategory = $_POST['category'];
    $selectedSubCategory = isset($_POST['subcategory']) ? $_POST['subcategory'] : null;
    
    // Additional filter for BusinessStatus
    $selectedBusinessStatus = 4;

    try {
        // Define the SQL query
        $query = "
            SELECT
                BL.`bus_id`,
                BL.`ownerId`,
                BL.`BusinessName`,
                BLT.`bus_lat`,
                BLT.`bus_long`
            FROM
                `business_list` AS BL
            INNER JOIN
                `business_location` AS BLT ON BL.`bus_id` = BLT.`bus_id`
            INNER JOIN
                `category_list` AS CL ON BL.`BusinessCategory` = CL.`ID`
            INNER JOIN
                `subcategory_list` AS SL ON BL.`BusinessSubCategory` = SL.`ID`
            WHERE
                BL.`BusinessCategory` = :selectedCategory
                AND BL.`BusinessStatus` = :selectedBusinessStatus"; // Added the condition for BusinessStatus

        if (!empty($selectedSubCategory)) {
            $query .= " AND  BL.BusinessSubCategory = :selectedSubCategory";
        }

        $statement = $pdo->prepare($query);
        $statement->bindParam(':selectedCategory', $selectedCategory, PDO::PARAM_STR);
        $statement->bindParam(':selectedBusinessStatus', $selectedBusinessStatus, PDO::PARAM_INT);

        if (!empty($selectedSubCategory)) {
            $statement->bindParam(':selectedSubCategory', $selectedSubCategory, PDO::PARAM_INT);
        }

        $statement->execute();

        $businessData = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($businessData)) {
            header('Content-Type: application/json');
            echo json_encode($businessData);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(['error' => 'No businesses available for the selected category and subcategory.']);
        }
    } catch (PDOException $e) {
        http_response_code(500); // Internal Server Error
        echo "Database error: " . $e->getMessage();
    }

}
?>
