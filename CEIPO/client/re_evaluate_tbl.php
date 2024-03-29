<?php
include '../../includes/config.php';

$pdo = Database::connection();


$sql = "SELECT *,
CONCAT(ol.Firstname, ' ', ol.Middlename, ' ', ol.Surname) AS owner_name
FROM business_list AS bl
INNER JOIN business_requirement AS br ON bl.bus_id = br.bus_id
INNER JOIN owner_list AS ol ON bl.ownerId = ol.ID
INNER JOIN brgyzone_list AS bz ON bl.BusinessBrgy = bz.ID
INNER JOIN category_list as c ON bl.BusinessCategory = c.ID
INNER JOIN subcategory_list as sc ON bl.BusinessSubCategory = sc.ID
WHERE bl.BusinessStatus = '3' 
";
$stmt = $pdo->prepare($sql);


$data = [];

if ($stmt->execute()) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $businessStatus = '';
  
    if ($row['BusinessStatus']== 3){
            $businessStatus = 'Re-Evaluate';
    }
      

        $storeButtonId = 'storeButton_' . $row['bus_id'];
        
        $subarray = [
            '<td>' . $row['BusinessName'] . '</td>',
            '<td>' . $row['owner_name'] . '</td>',
            '<td>' . $row['category'] . '</td>',
            '<td>' . $row['BusinessRemarks'] . '</td>',
            '<td>' . $businessStatus. '</td>'
        
        ];
        $data[] = $subarray;
    }
}

$output = [
    'data' => $data,
];

echo json_encode($output);
?>
