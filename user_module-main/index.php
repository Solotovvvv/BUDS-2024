<?php
session_start();

// Include your database connection code here (modify it according to your setup)
include 'includes/config.php';

if (isset($_SESSION['ownerId'])) {
    $ownerId = $_SESSION['ownerId'];

    // Fetch the file path from the database based on app_id (ownerId)
    // Modify this query according to your database schema
    $query = "SELECT `file` FROM `user_resume` WHERE `app_id` = '$ownerId'";
    $result = mysqli_query($conn, $query); // Use $conn instead of $your_db_connection

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $filePath = $row['file'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BuDS User Panel</title>
    <link rel="icon" href="dist/img/ucc-logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/css/bs-stepper.min.css">
    <!-- <link rel="stylesheet" href="plugins/general/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        #active {
            background: #027d09;
        }

        #add-question {
            width: 8rem;
        }
        #fileViewer{
            padding-left:25px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <nav class="main-header navbar navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
               
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-success elevation-5">
            <a href="index.php" class="brand-link" target="_blank">
                <img src="dist/img/buds-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">USER NAME</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="Resume_Viewer_User.php" class="nav-link" id="active">
                                <i class="nav-icon fa-solid fa-magnifying-glass"></i>
                                <p>Resumes</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- <div class="container mt-3 mr-3">
            <form id="fileUploadForm" enctype="multipart/form-data">
                <div class="form-group">
                    <h2><strong>UPLOAD RESUME<strong></h2>
                    <label for="fileInput">PDF or DOCX only:</label><br>
                    <div class="custom-file col-6">
                    <input type="file" class="custom-file-input" id="fileInput" name="resumeFile" accept=".pdf" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                    
                </div>
                <button type="button" class="btn btn-success mb-3" id="uploadBtn">Upload</button>
                <div id="uploadMessage"></div>
            </form>
           
        </div>

        <div id="fileViewer"></div> Move the viewer outside the modal -->

        <div class="container">
            <div class="row">
                <div class="col-1">
                </div>
                <div class="col-4 border">
                <form id="fileUploadForm" enctype="multipart/form-data">
                <div class="form-group">
                    <h2 class="fw-bold text-center mt-5">UPLOAD RESUME</h2>
                    <label for="fileInput">PDF or DOCX only:</label><br>
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fileInput" name="resumeFile" accept=".pdf" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                    
                </div>
                <button type="button" class="btn btn-success mb-3" id="uploadBtn">Upload</button>
                <div id="uploadMessage"></div>

                <p class="text-justify">1. Format your resume in a clear and professional manner, utilizing standard fonts and consistent styling throughout.</p>
                <p class="text-justify">2. Tailor your resume to the specific job you're applying for, highlighting relevant skills, experiences, and accomplishments.</p>
                <p class="text-justify">3. Double-check for spelling and grammar errors to present yourself as detail-oriented and competent.</p>
                <p class="text-justify">4. Keep your resume concise and focused, ideally limiting it to one or two pages.</p>
                <p class="text-justify">5. Ensure your contact information is accurate and up-to-date, making it easy for employers to reach you.</p>
            </form>
                </div>

                <div class="col-7">
                    <div id="fileViewer"></div> <!-- Move the viewer outside the modal -->
                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/js/bs-stepper.min.js"></script>

        <script>
            $(document).ready(function() {

                $('body').addClass('sidebar-collapse');

                <?php if (isset($filePath) && !empty($filePath)) { ?>
                    var filePath = '<?php echo $filePath; ?>';

                    // Display the file in the viewer
                    $('#fileViewer').html('<iframe src="' + filePath + '" width="100%" height="800px" style="border: none;"></iframe>');
                <?php } ?>
            });
            $('#uploadBtn').click(function() {
            var fileInput = $('#fileInput')[0].files[0];

            if (!fileInput) {
                alert('Please choose a file to upload.');
                return;
            }

            var formData = new FormData();
            formData.append('resumeFile', fileInput);

            $.ajax({
                url: 'upload.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.hasOwnProperty('error')) {
                        // Handle server-side error
                        $('#uploadMessage').html('<div class="alert alert-danger" role="alert">Error uploading file: ' + response.error + '</div>');
                    } else {
                        // Display success message and show the file in the viewer
                        $('#uploadMessage').html('<div class="alert alert-success" role="alert">File uploaded successfully!</div>');

                        var fileExtension = response.fileExtension.toLowerCase();
                        var filePath = response.filePath;

                        if (fileExtension === 'pdf') {
                            $('#fileViewer').html('<iframe src="' + filePath + '" width="100%" height="800px" style="border: none;"></iframe>');
                        } else {
                            $('#fileViewer').html('<p>Unsupported file format.</p>');
                        }
                    }
                },
                error: function(xhr, status, error) {
                    // Handle client-side error (e.g., network issues)
                    $('#uploadMessage').html('<div class="alert alert-danger" role="alert">Error uploading file: ' + error + '</div>');
                }
            });
            });
          
        </script>


        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="dist/js/adminlte.js"></script>
        <script src="plugins/datatables/bootstrap 4/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/bootstrap 4/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    </div>
    <aside class="control-sidebar control-sidebar-dark"></aside>

    <script>
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            // Get the file name and display it in the label
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>

</body>

</html>