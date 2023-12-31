<?php
session_start();
include './includes/config.php';

$id = $_SESSION['bus_id'];

$sql = "SELECT * FROM business_applicant WHERE bus_id = :id";
$pdo = Database::connection();
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);

$data = [];

if ($stmt->execute()) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $subarray = [];

        $subarray[] = "<td>" . $row['pos_vacant'] . "</td>";

        if ($row['status'] == 1) {
            $subarray[] = "<td><span class='badge rounded-pill bg-success'>Active</span></td>";
        } elseif ($row['status'] == 0) {
            $subarray[] = "<td><span class='badge rounded-pill bg-danger'>Inactive</span></td>";
        }

        $subarray[] = "<td><button type='button' class='btn btn-warning btn-sm' onclick=editJob(" . $row['bus_applicant'] . ",'" . str_replace(' ', '_', $row['pos_vacant']) . "','" . str_replace(' ', '_', $row['job_desc']) . "','" . str_replace(' ', '_', $row['job_spec']) . "','" . str_replace(' ', '_', $row['degree']) . "','" . str_replace(' ', '_', $row['salary']) . "','" . str_replace(' ', '_', $row['year_exp']) . "')>
                <i class='bx bxs-edit-alt'></i>
                </button>
                <button type='button' class='btn btn-danger btn-sm' onclick=edtJobStatus(" . $row['bus_applicant'] . "," . $row['status'] . ")>
                <i class='bx bx-x-circle'></i></button></td>";
        $data[] = $subarray;
    }
}


$output = [
    'data' => $data,
];

echo json_encode($output);
