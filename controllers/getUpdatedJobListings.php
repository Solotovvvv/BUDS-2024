<?php
require_once("../includes/config.php");

session_start(); // Start the session to access session variables

// Check if the session variable 'bus_id' is set
if (!isset($_SESSION['bus_id'])) {
    echo json_encode(array('error' => 'Business ID not set in session.'));
    exit;
}

$bus_id = $_SESSION['bus_id'];
// Escape the bus_id to prevent SQL injection
$bus_id = mysqli_real_escape_string($conn, $bus_id);

// Query to fetch updated job listings for the specific business ID
$query = "SELECT * FROM business_requirement WHERE bus_id = '$bus_id' ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

$jobListings = array();
while ($row = mysqli_fetch_assoc($result)) {
    $jobListings[] = $row;
}

// Return the job listings as JSON
echo json_encode($jobListings);
