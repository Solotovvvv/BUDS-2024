<?php
 include '../../includes/config.php';

$pdo = Database::connection();


$sql = "SELECT cl.category, COUNT(bl.bus_id) AS category_count
FROM business_list AS bl
INNER JOIN category_list AS cl ON bl.BusinessCategory = cl.ID
GROUP BY cl.category
ORDER BY category_count DESC
LIMIT 10;
' 
";
$stmt = $pdo->prepare($sql);

$x = 1;

$data = [];

if ($stmt->execute()) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $subarray = [
            '<td>' . $x++ . '</td>',
            '<td>' . $row['category'] . '</td>',
            '<td>' . $row['category_count'] . '</td>',
        ];
        $data[] = $subarray;
    }
}

$output = [
    'data' => $data,
];

echo json_encode($output);
?>
