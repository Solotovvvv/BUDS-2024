<?php
include '../../includes../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['categoryId'])) {
    $categoryId = $_GET['categoryId'];

    try {
        $pdo = DATABASE::connection();
        $subcategoryQuery = "SELECT `ID`, `subCategory` FROM `subcategory_list` WHERE `catId` = :categoryId";
        $subcategoryStatement = $pdo->prepare($subcategoryQuery);
        $subcategoryStatement->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $subcategoryStatement->execute();

        $subcategories = $subcategoryStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($subcategories);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
