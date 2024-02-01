<?php
include 'includes/config.php';

$pdo = Database::connection();
$bus_ids = $_POST['bus_id'];
$filter = $_POST['filter']; // Get the selected filter value\





// Initialize SQL query with common part
$sql = "SELECT 
        al.`ID`, 
        al.`bus_app`, 
        al.`app_id`, 
        al.`Status`,
        ba.`bus_id`, 
        ba.`pos_vacant`, 
        ur.`fullname`
    FROM 
        `application_list` AS al
    INNER JOIN 
        `business_applicant` AS ba
    ON 
        al.`bus_app` = ba.`bus_applicant`
    INNER JOIN 
        `user_resume` AS ur
    ON 
        al.`app_id` = ur.`app_id`
    WHERE 
        ba.`bus_id` = :bus_id";

$data = [];

// Add filter conditions based on the selected filter value
if ($filter == "0") {
    $sql .= " AND al.`Status` = 0";
} elseif ($filter == "1") {
    $sql .= " AND al.`Status` = 1";
} elseif ($filter == "2") {
    $sql .= " AND al.`Status` = 2";
} elseif ($filter == "4") {
    // Show all statuses, no additional condition needed
}

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':bus_id', $bus_ids, PDO::PARAM_INT);

if ($stmt->execute()) {
    $totalRecords = $stmt->rowCount(); // Get the total number of records before filtering

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $statusText = ["Pending", "Notified", "Unreachable"][$row['Status']];
        
        $subarray = [
            '<td>' . $row['fullname'] . '</td>',
            '<td>' . $row['pos_vacant'] . '</td>',
            '<td>' . $statusText . '</td>',
            '<td>
                <button type="button" class="btn btn-warning btn-sm" onclick="view(' .$row['app_id'] . ')">
                    <i class="bx bxs-file-doc"></i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" onclick="status(' .$row['ID'] . ')">
                    <i class="bx bx-show-alt"></i>
                </button>
            </td>',
        ];
        $data[] = $subarray;
    }

    $filteredRecords = count($data); // Get the number of filtered records

    $output = [
        'data' => $data,
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $filteredRecords,
    ];

    echo json_encode($output);
} else {
    // Handle the case where the query execution fails
    echo json_encode(['error' => 'Query execution failed']);
}

?>
