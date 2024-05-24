<?php
include '../../includes/config.php';

// Fetch data based on selected criteria
$category = isset($_POST['category']) ? $_POST['category'] : '';
$subcategory = isset($_POST['subcategory']) ? $_POST['subcategory'] : '';
$barangay = isset($_POST['barangay']) ? $_POST['barangay'] : '';
$capitalizationFilter = isset($_POST['capitalization']) ? $_POST['capitalization'] : '';

$pdo = Database::connection();

$sql = "SELECT bl.`BusinessName`, bl.`BusinessBrgy`, bl.`capitalization`, 
               cl.`category` AS `BusinessCategory`, sl.`subCategory`, bl.`BusinessStatus`,
               CONCAT(ol.Firstname, ' ', ol.Middlename, ' ', ol.Surname) AS owner_name,
               bl.`BusinessRemarks`
        FROM `business_list` bl
        LEFT JOIN `category_list` cl ON bl.`BusinessCategory` = cl.`ID`
        LEFT JOIN `subcategory_list` sl ON bl.`BusinessSubCategory` = sl.`ID`
        LEFT JOIN `owner_list` ol ON bl.`ownerId` = ol.`ID`
        LEFT JOIN `brgyzone_list` bz ON bl.`BusinessBrgy` = bz.`ID`
        WHERE bl.`BusinessStatus` = 4";

$params = [];

if (!empty($category)) {
    $sql .= " AND bl.`BusinessCategory` = :category";
    $params[':category'] = $category;
}
if (!empty($subcategory)) {
    $sql .= " AND bl.`BusinessSubCategory` = :subcategory";
    $params[':subcategory'] = $subcategory;
}
if (!empty($barangay) && $barangay != '-1') {
    $sql .= " AND bl.`BusinessBrgy` = :barangay";
    $params[':barangay'] = $barangay;
}
if (!empty($capitalizationFilter) && $capitalizationFilter != 'All') {
    switch ($capitalizationFilter) {
        case 'low':
            $sql .= " AND bl.`capitalization` < 10000";
            break;
        case 'medium':
            $sql .= " AND bl.`capitalization` >= 10000 AND bl.`capitalization` <= 100000";
            break;
        case 'high':
            $sql .= " AND bl.`capitalization` > 100000";
            break;
    }
}

$stmt = $pdo->prepare($sql);

foreach ($params as $key => &$val) {
    $stmt->bindParam($key, $val);
}

$data = [];
if ($stmt->execute()) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $capitalization = !empty($row['capitalization']) ? '₱' . number_format($row['capitalization']) : 'N/A';


        $subarray = [
            $row['BusinessName'],
            $row['owner_name'],
            $row['BusinessBrgy'],
            $capitalization,
            $row['BusinessCategory'] . ' - ' . $row['subCategory']
        ];
        $data[] = $subarray;
    }
}

$output = [
    'data' => $data,
];

header('Content-Type: application/json');
echo json_encode($output);
?>
