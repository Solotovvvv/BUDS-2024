<?php
session_start();
include './includes/config.php';

$id = $_SESSION['bus_id'];

$sql = "SELECT * FROM business_post WHERE bus_id = :id";
$pdo = Database::connection();
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);

$data = [];

if ($stmt->execute()) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $subarray = [];

        $subarray[] = "<td>" . $row['post_title'] . "</td>";
        $subarray[] = "<td>" . $row['post_desc'] . "</td>";
        $subarray[] = "<td><img src='img/post/" . $row['photo'] . "' alt='user-avatar' class='mx-auto d-block' height='100' width='100' id='uploadedAvatar'></td>";

        $subarray[] = "<td><button type='button' class='btn btn-warning btn-sm' onclick=editPost('" . str_replace(' ', '_', $row['post_title']) . "','" . str_replace(' ', '_', $row['post_desc']) . "','" . str_replace(' ', '_', $row['photo']) . "','" . str_replace(' ', '_', $row['post_date']) . "')>
                <i class='bx bxs-edit-alt'></i>
                </button>
                <button type='button' class='btn btn-warning btn-sm' onclick=viewPost('" . str_replace(' ', '_', $row['post_title']) . "','" . str_replace(' ', '_', $row['post_desc']) . "','" . str_replace(' ', '_', $row['photo']) . "','" . str_replace(' ', '_', $row['post_date']) . "')>
                <i class='bx bxs-show'></i>
                </button>
                <button type='button' class='btn btn-danger btn-sm' onclick=edtPostStatus(" . $row['bus_post_id'] . "," . $row['status'] . ")>
                <i class='bx bx-x-circle'></i></button></td>";
        $data[] = $subarray;
    }
}


$output = [
    'data' => $data,
];

echo json_encode($output);
