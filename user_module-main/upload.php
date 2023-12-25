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

        // Check for file name conflicts
        $fileCount = 1;
        while (file_exists($targetPath)) {
            $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $targetPath = $uploadDirectory . $fileName . '_' . $fileCount . '.' . $extension;
            $fileCount++;
        }

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // Get the app_id from the session
            session_start();
            $ownerId = isset($_SESSION['ownerId']) ? $_SESSION['ownerId'] : null;

            if ($ownerId) {
                // Save file information to the database using prepared statements
                $sql = "INSERT INTO user_resume (app_id, file) VALUES (?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$ownerId, $targetPath]);
                // Assuming 'file' column in the database is VARCHAR, you might need to adjust accordingly

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
