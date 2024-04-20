<?php
session_start();
require_once "includes/config.php";
$pdo = DATABASE::connection();

// Assuming $_SESSION['ownerId'] contains the ID value you want to filter by
$ownerId = $_SESSION['ownerId'];

$sql = "SELECT `ID`, CONCAT(`Surname`, ' ', `Firstname`, ' ', `MiddleName`) AS `FullName`,`Surname`,  `Firstname`, `MiddleName` ,`Email`, `contactNumber`, `Address`, `Sex`, `Birthday`, `Age`,`photo` FROM `owner_list` WHERE `ID` = :ownerId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':ownerId', $ownerId, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);
?>
