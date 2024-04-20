<?php
session_start();
require_once "includes/config.php";
$pdo = DATABASE::connection();

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get other user data from the form
    $firstname = $_POST['Firstname'];
    $middlename = $_POST['MiddleName'];
    $surname = $_POST['Surname'];
    $sex = $_POST['Sex'];
    $age = $_POST['Age'];
    $contact_number = $_POST['contactNumber'];
    $birthday = $_POST['Birthday'];
    $address = $_POST['Address'];
    $email = $_POST['Email'];

    // Check if file is uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Get the file information
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];

        // Set the directory to save the uploaded image
        $upload_dir = 'img/profile-picture/';

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            // File upload success
            // Prepare SQL statement for update
            $stmt = $pdo->prepare("UPDATE owner_list SET Firstname = ?, MiddleName = ?, Surname = ?, Sex = ?, Age = ?, contactNumber = ?, Birthday = ?, Address = ?, Email = ?, photo = ? WHERE ID = ?");
            $stmt->execute([$firstname, $middlename, $surname, $sex, $age, $contact_number, $birthday, $address, $email, $upload_dir . $file_name, $_SESSION['ownerId']]);
        } else {
            // File upload failed
            // Send an error response
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload image']);
            exit(); // Stop further execution
        }
    } else {
        // No file uploaded or error occurred during upload, update only the other fields
        // Prepare SQL statement for update without the photo field
        $stmt = $pdo->prepare("UPDATE owner_list SET Firstname = ?, MiddleName = ?, Surname = ?, Sex = ?, Age = ?, contactNumber = ?, Birthday = ?, Address = ?, Email = ? WHERE ID = ?");
        $stmt->execute([$firstname, $middlename, $surname, $sex, $age, $contact_number, $birthday, $address, $email, $_SESSION['ownerId']]);
    }

    // Send a success response
    echo json_encode(['status' => 'success', 'message' => 'User data saved successfully']);
} else {
    // Invalid request method
    // Send an error response
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
