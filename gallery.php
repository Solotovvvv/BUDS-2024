<?php
session_start();
require_once './includes/config.php';

if (empty($_SESSION['ownerId']) || empty($_GET['a'])) {
    header('Location: manage.php');
    exit();
}

$bus_id = $_GET['a'];
$_SESSION['bus_id'] = $_GET['a'];
$uploadDir = 'img/gallery1/';

// Create a database connection
$pdo = Database::connection();

// Handle image deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteImage'])) {
    $imagePath = $_POST['imagePath'];

    // Delete the image from the database
    $deleteSql = "DELETE FROM business_carousel WHERE bus_carou_id = :bus_carou_id";
    $deleteStmt = $pdo->prepare($deleteSql);
    $deleteStmt->execute(array(':bus_carou_id' => $imagePath));

    if ($deleteStmt->errorCode() === '00000') {
        // Image deleted from the database, now delete from the local folder
        $fullImagePath = $uploadDir . $imagePath;
        if (file_exists($fullImagePath)) {
            unlink($fullImagePath);
        }
        echo 'Image deleted successfully';
        exit();
    } else {
        $errorInfo = $deleteStmt->errorInfo();
        $errorMsg = "SQL Error: " . $errorInfo[2] . " in query: " . $deleteSql;
        echo $errorMsg;
        exit();
    }
}



// Handle image update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateImage'])) {
    $imagePath = $_POST['imagePath'];

    // Handle the file upload
    $newImagePath = handleFileUpload($uploadDir, 'fileUpload');

    if ($newImagePath === null) {
        echo 'Error uploading file.';
        exit();
    }

    // Delete the old image from the local folder
    $fullImagePath = $uploadDir . $imagePath;
    if (file_exists($fullImagePath)) {
        unlink($fullImagePath);
    }

    // Update the image path in the database
    $updateSql = "UPDATE business_carousel SET images = :newImagePath WHERE bus_carou_id = :bus_carou_id";
    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->execute(array(':newImagePath' => $newImagePath, ':bus_carou_id' => $imagePath));

    if ($updateStmt->errorCode() === '00000') {
        // Image path updated in the database
        echo 'Image updated successfully';
        exit();
    } else {
        $errorInfo = $updateStmt->errorInfo();
        $errorMsg = "SQL Error: " . $errorInfo[2] . " in query: " . $updateSql;
        echo $errorMsg;
        exit();
    }
}

// Function to handle file upload and return the new image path
function handleFileUpload($uploadDir, $fileInputName)
{
    // Check if a file is uploaded
    if (!isset($_FILES[$fileInputName]) || empty($_FILES[$fileInputName]['name'])) {
        return null;  // No file uploaded
    }

    // Get the file details
    $tmp_name = $_FILES[$fileInputName]['tmp_name'];
    $newName = $uploadDir . $_FILES[$fileInputName]['name'];

    // Check file format
    $allowedFormats = array('jpg', 'jpeg', 'png');
    $fileFormat = strtolower(pathinfo($newName, PATHINFO_EXTENSION));

    if (!in_array($fileFormat, $allowedFormats)) {
        return null;  // Invalid file format
    }

    // Move the uploaded file to the desired directory
    move_uploaded_file($tmp_name, $newName);

    return $newName;  // Return the new image path
}




// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileUpload'])) {
    foreach ($_FILES['fileUpload']['name'] as $key => $name) {
        $tmp_name = $_FILES['fileUpload']['tmp_name'][$key];
        $newName = $uploadDir . $name;

        // Check file format
        $allowedFormats = array('jpg', 'jpeg', 'png');
        $fileFormat = strtolower(pathinfo($newName, PATHINFO_EXTENSION));

        if (!in_array($fileFormat, $allowedFormats)) {
            echo 'Invalid file format. Only JPG and PNG files are allowed.';
            exit();
        }

        // Move the uploaded file to the desired directory
        move_uploaded_file($tmp_name, $newName);

        // Insert the new image path into the database
        $sql = "INSERT INTO business_carousel (bus_id, images) VALUES (:bus_id, :images)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':bus_id' => $bus_id, ':images' => $newName));

        if ($stmt->errorCode() !== '00000') {
            $errorInfo = $stmt->errorInfo();
            $errorMsg = "SQL Error: " . $errorInfo[2] . " in query: " . $sql;
            echo $errorMsg;
            exit();
        }
    }

    echo 'Images uploaded successfully';
    exit();
}


// Fetch the list of images from the database based on bus_id
$sqlFetchImages = "SELECT * FROM business_carousel WHERE bus_id = :bus_id";
$stmtFetchImages = $pdo->prepare($sqlFetchImages);
$stmtFetchImages->execute(array(':bus_id' => $bus_id));
$uploadedImages = $stmtFetchImages->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="plugins/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Business Dashboard</title>
    <meta name="description" content="">

    <link rel="icon" type="image/x-icon" href="plugins/assets/img/favicon/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="plugins/assets/vendor/fonts/boxicons.css">
    <link rel="stylesheet" href="plugins/assets/vendor/css/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="plugins/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="plugins/assets/css/demo.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <script src="plugins/assets/vendor/js/helpers.js"></script>
    <style>
        .photo-gallery {
            color: #313437;
            background-color: #fff;
        }

        .photo-gallery p {
            color: #7d8285;
        }

        .photo-gallery h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: inherit;
        }

        @media (max-width:767px) {
            .photo-gallery h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .photo-gallery . {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto 40px;
        }

        .photo-gallery .intro p {
            margin-bottom: 20px;
        }

        .photo-gallery .photos {
            padding-bottom: 20px;
        }

        .photo-gallery .item {
            padding-bottom: 40px;
        }

        #upload-container {
            width: 200px;
            height: 200px;
            border: 2px dashed #ccc;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        #upload-container:hover {
            border-color: #777;
        }

        #upload-container input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        #plus-icon {
            font-size: 50px;
            color: #777;
        }

    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.php" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="img/logo-main.png" alt="" class="brand-image" width="45" height="50">
                        </span>
                        <span
                            class="text-uppercase text-white app-brand-text demo menu-text fw-bolder ms-2">BUSINESS</span>
                    </a>
                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Business Profile</span>
                    </li>

                    <li class="menu-item">
                        <a href="<?php echo "bulletin.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-pin"></i>
                            <div data-i18n="Analytics">Bulletin Board</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="<?php echo "BusinessPanel.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-info-circle"></i>
                            <div data-i18n="Analytics">Details</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Business Content</span>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo "feature-post.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-share"></i>
                            <div data-i18n="Analytics">Feature Post</div>
                        </a>
                    </li>

                    <li class="menu-item active">
                        <a href="<?php echo "gallery.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-photo-album"></i>
                            <div data-i18n="Analytics">Gallery</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo "reply.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-message-rounded"></i>
                            <div data-i18n="Analytics">Comments & Rating</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Business Document</span>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo "requirement.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-paperclip"></i>
                            <div data-i18n="Analytics">Requirements</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Job Applicants</span>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo "job_position.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-user"></i>
                            <div data-i18n="Analytics">Job Positions</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo "job_applicant.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                            <div data-i18n="Analytics">Job Applicants</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <?php if ($_SESSION['photo'] != "") { ?>
                                            <img src="<?php echo "img/profile-picture/" . $_SESSION['photo'] ?>"
                                                alt="User's Name">
                                        <?php } else { ?>
                                            <img src="img/testimonial-author/unknown.jpg" alt="User's Name">
                                        <?php } ?>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <?php if ($_SESSION['photo'] != "") { ?>
                                                            <img src="<?php echo "img/profile-picture/" . $_SESSION['photo'] ?>"
                                                                alt="User's Name">
                                                        <?php } else { ?>
                                                            <img src="img/testimonial-author/unknown.jpg" alt="User's Name">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">
                                                        <?php echo $_SESSION['lname'] . ' , ' . $_SESSION['fname'] ?>
                                                    </span>
                                                    <small class="text-muted">
                                                        <?php echo $_SESSION['userTypeDesc'] ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- GALLERY CONTAINER -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4 p-4" id="imageContainer">
                                    <h3 class="card-header"><strong>Gallery</strong></h3>
                                    <hr>
                                    <div class="card p-4">
                                        <!-- Gallery container with uploaded images -->
                                        <div id="galleryImagesContainer" class="row">
                                            <?php foreach ($uploadedImages as $image): ?>
                                                <div class="col-3">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <img src="<?php echo $image['images']; ?>" class="img-fluid mb-2"
                                                            alt="Gallery Image">
                                                        <div class="mt-2">
                                                            <!-- Edit button -->
                                                            <button class="btn btn-primary btn-sm"
                                                                onclick="editImage('<?php echo $image['bus_carou_id']; ?>')">Edit</button>
                                                            <!-- Delete button -->
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="deleteImage('<?php echo $image['bus_carou_id']; ?>')">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>

                                            <!-- Upload container -->
                                            <div class="col-3" id="fullcontainer">
                                                <form enctype="multipart/form-data" method="post" action=""
                                                    type="submit" id="uploadForm">
                                                    <div id="upload-container">
                                                        <div id="upload-box">
                                                            <span id="plus-icon">+</span>
                                                            <input type="file" name="fileUpload[]" class="form-control"
                                                                id="fileUpload" multiple>
                                                        </div>
                                                    </div>
                                                </form>
                                                <small class="form-text text-muted">Upload Image (maximum 4)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="plugins/assets/vendor/libs/jquery/jquery.js"></script>
            <script src="plugins/assets/vendor/js/bootstrap.js"></script>
            <script src="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="plugins/assets/vendor/js/menu.js"></script>
            <script src="plugins/assets/js/main.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

<script>


$(document).ready(function () {
    // Bind events after the document is ready
    $('#uploadForm').on('change', '#fileUpload', function (e) {
        console.log('File input changed');
        e.preventDefault();
        uploadImages();
    });

    // Initial update of upload container visibility
    var galleryImagesContainer = document.getElementById('galleryImagesContainer');
    updateUploadContainerVisibility(galleryImagesContainer.children.length);
});

function uploadImages() {

    // Check if at least one file has been selected
    var fileInput = document.getElementById('fileUpload');
    if (fileInput.files.length === 0) {
        Swal.fire({
            icon: "warning",
            title: "No files selected",
            text: "Please choose at least one file to upload.",
            customClass: {
                confirmButton: 'swal-confirm-button',
            },
            showCancelButton: false,
        });
        fileInput.value = ''; // Reset the value to empty
        return;
    }

    // Check if the limit of 4 images is reached
    var galleryImagesContainer = document.getElementById('galleryImagesContainer');
    var maxImagesAllowed = 5;
    var remainingSlots = maxImagesAllowed - galleryImagesContainer.children.length;

    if (fileInput.files.length > remainingSlots) {
        Swal.fire({
            icon: "warning",
            title: "Image limit reached",
            text: "You can only upload up to " + remainingSlots + " more images.",
            customClass: {
                confirmButton: 'swal-confirm-button',
            },
            showCancelButton: false,
        });
        fileInput.value = ''; // Reset the value to empty
        return;
    }

    // Check file formats
    var allowedFormats = ['jpg', 'jpeg', 'png'];
    for (var i = 0; i < fileInput.files.length; i++) {
        var fileName = fileInput.files[i].name;
        var fileFormat = fileName.split('.').pop().toLowerCase();
        if (allowedFormats.indexOf(fileFormat) === -1) {
            Swal.fire({
                icon: "error",
                title: "Invalid file format",
                text: "Only JPG, JPEG, and PNG files are allowed.",
                customClass: {
                    confirmButton: 'swal-confirm-button',
                },
                showCancelButton: false,
            });
            return;
        }
    }

    // Check if the limit of 4 images is reached
    if (galleryImagesContainer.children.length >= maxImagesAllowed) {
        // Hide the entire upload container if the limit is reached
        document.getElementById('upload-container').style.display = 'none';
        Swal.fire({
            icon: "warning",
            title: "Image limit reached",
            text: "You can only upload up to 4 images.",
            customClass: {
                confirmButton: 'swal-confirm-button',
            },
            showCancelButton: false,
        });
        fileInput.value = ''; // Reset the value to empty
        return;
    }

    // Prepare form data
    var formData = new FormData(document.getElementById('uploadForm'));

    // Make AJAX request for image upload
    $.ajax({
        url: 'gallery.php?a=<?php echo $bus_id; ?>',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);

            // Display success message
            Swal.fire({
                icon: "success",
                title: "Upload successful",
                text: "Your files have been uploaded successfully!",
                customClass: {
                    confirmButton: 'swal-confirm-button',
                },
                showCancelButton: false,
            });

            // Fetch and display the newly uploaded images
            fetchNewImages();
            fileInput.value = ''; // Reset the value to empty

            $('#uploadForm').off('change', '#fileUpload').on('change', '#fileUpload', function (e) {
                console.log('File input changed');
                e.preventDefault();
                uploadImages();
            });
        },
        error: function (xhr, status, error) {
            console.error(error);

            var errorMessage = "An error occurred while uploading your files.";
            if (xhr.responseText) {
                errorMessage = xhr.responseText;
            }

            Swal.fire({
                icon: "error",
                title: "Upload failed",
                text: errorMessage,
                customClass: {
                    confirmButton: 'swal-confirm-button',
                },
                showCancelButton: false,
            });
        }
    });
}

function updateUploadContainerVisibility(uploadedImageCount) {
    console.log(uploadedImageCount);
    var fullContainer = document.getElementById('fullcontainer');
    var maxImagesAllowed = 5;

    if (uploadedImageCount >= maxImagesAllowed) {
        // Hide the entire container if the limit is reached
        fullContainer.style.display = 'none';
    } else {
        // Show the container
        fullContainer.style.display = 'block';
    }
}

function editImage(imagePath) {
    // Create a file input element
    var fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.style.display = 'none';

    // Trigger a click event on the file input
    fileInput.click();

    // Handle the file change event
    fileInput.addEventListener('change', function () {
        const selectedFile = fileInput.files[0];

        // Check file format
        var allowedFormats = ['jpg', 'jpeg', 'png'];
        var fileName = selectedFile.name;
        var fileFormat = fileName.split('.').pop().toLowerCase();
        if (allowedFormats.indexOf(fileFormat) === -1) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid file format',
                text: 'Only JPG, JPEG, and PNG files are allowed.',
                customClass: {
                    confirmButton: 'swal-confirm-button',
                },
                showCancelButton: false,
            });
            return;
        }

        // Perform AJAX request to update the image in the database
        const formData = new FormData();
        formData.append('fileUpload', selectedFile);
        formData.append('imagePath', imagePath);
        formData.append('updateImage', true);

        $.ajax({
            url: 'gallery.php?a=<?php echo $bus_id; ?>',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);

                // Display success message
                Swal.fire({
                    icon: 'success',
                    title: 'Image updated successfully',
                    customClass: {
                        confirmButton: 'swal-confirm-button',
                    },
                    showCancelButton: false,
                });
                // Optionally, you can update the displayed images on the page
                fetchNewImages();
            },
            error: function (xhr, status, error) {
                console.error(error);

                var errorMessage = 'An error occurred while updating the image.';
                if (xhr.responseText) {
                    errorMessage = xhr.responseText;
                }

                // Display error message
                Swal.fire({
                    icon: 'error',
                    title: 'Update failed',
                    text: errorMessage,
                    customClass: {
                        confirmButton: 'swal-confirm-button',
                    },
                    showCancelButton: false,
                });
            },
            complete: function () {
                // Check if the fileInput is still present in the DOM before removing it
                if (fileInput.parentNode) {
                    fileInput.parentNode.removeChild(fileInput);
                }
            },
        });
    });
}



function fetchNewImages() {
    $.ajax({
        url: 'gallery.php?a=<?php echo $bus_id; ?>',
        type: 'GET',
        success: function (response) {
            // Update the gallery images container
            $('#galleryImagesContainer').html($(response).find('#galleryImagesContainer').html());
            
            // Update the visibility of the upload container
            updateUploadContainerVisibility($('#galleryImagesContainer').children().length);
            
            $('#uploadForm').off('change', '#fileUpload').on('change', '#fileUpload', function (e) {
                console.log('File input changed');
                e.preventDefault();
                uploadImages();
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

function deleteImage(imagePath) {
    // Confirm deletion
    Swal.fire({
        icon: 'warning',
        title: 'Delete Image',
        text: 'Are you sure you want to delete this image?',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        customClass: {
            confirmButton: 'swal-confirm-button',
            cancelButton: 'swal-cancel-button',
        },
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete the image
            $.ajax({
                url: 'gallery.php?a=<?php echo $bus_id; ?>',
                type: 'POST',
                data: { deleteImage: true, imagePath: imagePath },
                success: function (response) {
                    console.log(response);

                    // Display success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Image deleted successfully',
                        customClass: {
                            confirmButton: 'swal-confirm-button',
                        },
                        showCancelButton: false,
                    });

                    // Fetch and display the updated images
                    fetchNewImages();
                },
                error: function (xhr, status, error) {
                    console.error(error);

                    var errorMessage = 'An error occurred while deleting the image.';
                    if (xhr.responseText) {
                        errorMessage = xhr.responseText;
                    }

                    // Display error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Deletion failed',
                        text: errorMessage,
                        customClass: {
                            confirmButton: 'swal-confirm-button',
                        },
                        showCancelButton: false,
                    });
                },
            });
        }
    });
}

</script>


</body>

</html>