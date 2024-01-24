<?php
// Include your database connection file here
include 'includes/config.php';
$pdo = Database::connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['resumeFile'])) {
        $file = $_FILES['resumeFile'];

        // Check file type and size if needed

        // Move the uploaded file to a desired directory
        $uploadDirectory = 'uploads/';

        // Ensure that the 'uploads' directory exists
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $targetPath = $uploadDirectory . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // Get the app_id from the session
            session_start();
            $ownerId = isset($_SESSION['ownerId']) ? $_SESSION['ownerId'] : null;

            if ($ownerId) {
                // Check if the app_id already exists in the user_resume table
                $checkSql = "SELECT COUNT(*) FROM user_resume WHERE app_id = ?";
                $checkStmt = $pdo->prepare($checkSql);
                $checkStmt->execute([$ownerId]);
                $rowCount = $checkStmt->fetchColumn();

                if ($rowCount > 0) {
                    // App_id exists, update the existing record
                    $updateSql = "UPDATE user_resume SET file = ? WHERE app_id = ?";
                    $updateStmt = $pdo->prepare($updateSql);
                    $updateStmt->execute([$targetPath, $ownerId]);
                } else {
                    // App_id does not exist, insert a new record
                    $insertSql = "INSERT INTO user_resume (app_id, file) VALUES (?, ?)";
                    $insertStmt = $pdo->prepare($insertSql);
                    $insertStmt->execute([$ownerId, $targetPath]);
                }

                // Provide a JSON response with file information
                header('Content-Type: application/json');
                echo json_encode([
                    'fileExtension' => pathinfo($targetPath, PATHINFO_EXTENSION),
                    'filePath' => $targetPath
                ]);
                exit(); // Add this line to stop execution after successful upload
            } else {
                header('HTTP/1.1 401 Unauthorized');
                echo json_encode(['error' => 'User not authorized.']);
                exit(); // Add this line to stop execution if the user is not authorized
            }
        } else {
            // Handle the case where file upload fails
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(['error' => 'Failed to upload the file.']);
            exit(); // Add this line to stop execution after a failed upload
        }
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['error' => 'No file uploaded.']);
        exit(); // Add this line to stop execution if no file is uploaded
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['error' => 'Invalid request method.']);
    exit(); // Add this line to stop execution for invalid request methods
}
?>
