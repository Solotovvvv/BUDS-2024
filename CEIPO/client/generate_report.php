<?php
// fetchData.php
include '../../includes/config.php';

// Fetch data based on selected criteria
$category = isset($_POST['category']) ? $_POST['category'] : '';
$subcategory = isset($_POST['subcategory']) ? $_POST['subcategory'] : '';
$barangay = isset($_POST['barangay']) ? $_POST['barangay'] : '';
$capitalizationFilter = isset($_POST['capitalization']) ? $_POST['capitalization'] : '';


$query = "SELECT bl.`BusinessName`, bl.`BusinessBrgy`, bl.`capitalization`, 
                 cl.`category` AS `BusinessCategory`, sl.`subCategory`, bl.`BusinessStatus`
          FROM `business_list` bl
          LEFT JOIN `category_list` cl ON bl.`BusinessCategory` = cl.`ID`
          LEFT JOIN `subcategory_list` sl ON bl.`BusinessSubCategory` = sl.`ID`
          WHERE bl.BusinessStatus = 4";


if (!empty($category)) {
  $query .= " AND `BusinessCategory` = '$category'";
}

if (!empty($subcategory)) {
  $query .= " AND `BusinessSubCategory` = '$subcategory'";
}

if (!empty($barangay) && $barangay != '-1') {
  $query .= " AND `BusinessBrgy` = '$barangay'";
}

if (!empty($capitalizationFilter) && $capitalizationFilter != 'All') {
    switch ($capitalizationFilter) {
      case 'low':
        $query .= " AND `capitalization` < 10000";
        break;
      case 'medium':
        $query .= " AND `capitalization` >= 10000 AND `capitalization` <= 100000";
        break;
      case 'high':
        $query .= " AND `capitalization` > 100000";
        break;
      // Add more cases if needed
    }
}
    

try {
  // Execute the query and fetch data
  $pdo = DATABASE::connection(); // Assuming you have a class or function named DATABASE for database connection
  $statement = $pdo->query($query);
  $data = $statement->fetchAll(PDO::FETCH_ASSOC);

  // Send the data as JSON response
  header('Content-Type: application/json');
  echo json_encode($data);
} catch (PDOException $e) {
  // Handle database errors
  echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
