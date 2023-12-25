<?php
include '../includes/config.php'; // Include your database connection code
$pdo = DATABASE::connection();

if (isset($_POST['catId'])) {
    $catId = $_POST['catId'];

    try {
        // Define the SQL query to fetch subcategories for the selected category
        $subcategoryQuery = "SELECT `ID`, `subCategory` FROM `subcategory_list` WHERE `catId` = :catId";

        // Prepare and execute the query
        $subcategoryStatement = $pdo->prepare($subcategoryQuery);
        $subcategoryStatement->bindParam(':catId', $catId, PDO::PARAM_INT);
        $subcategoryStatement->execute();

        // Fetch subcategories and return as JSON
        $subcategories = $subcategoryStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($subcategories);
    } catch (PDOException $e) {
        // Handle database errors
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Category ID (catId) not provided']);
}
?>
