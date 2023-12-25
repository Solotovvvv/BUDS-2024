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
    <link rel="stylesheet" href="plugins/general/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        #active {
            background: #494E53;
        }

        #add-question {
            width: 8rem;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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

        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <a href="https://ucc-caloocan.edu.ph/" class="brand-link" target="_blank">
                <img src="dist/img/buds-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">USER NAME</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fa-regular fa-file"></i>
                                <p>Resume</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa-solid fa-location-dot"></i>
                                <p>Near Business</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Resume_Viewer_User.php" class="nav-link" id="active">
                                <i class="nav-icon fa-solid fa-magnifying-glass"></i>
                                <p>Resume</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="container mt-5">
            <form id="fileUploadForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fileInput">Upload Resume (PDF or DOCX only):</label>
                    <input type="file" class="form-control-file" id="fileInput" name="resumeFile" accept=".pdf" required>
                </div>
                <button type="button" class="btn btn-primary" id="uploadBtn" data-toggle="modal" data-target="#fileViewerModal">Upload</button>
                <div id="uploadMessage"></div>
            </form>
        </div>

        <div class="modal fade" id="fileViewerModal" tabindex="-1" role="dialog" aria-labelledby="fileViewerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <div id="fileViewer"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/js/bs-stepper.min.js"></script>

        <script>
            $(document).ready(function() {
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
                            $('#uploadMessage').html('<div class="alert alert-success" role="alert">File uploaded successfully!</div>');

                            var fileExtension = response.fileExtension.toLowerCase();
                            var filePath = response.filePath;

                            if (fileExtension === 'pdf') {
                                $('#fileViewer').html('<iframe src="' + filePath + '" width="100%" height="800px" style="border: none;"></iframe>');
                            } else {
                                $('#fileViewer').html('<p>Unsupported file format.</p>');
                            }

                            // Open the modal after setting the content
                            $('#fileViewerModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            $('#uploadMessage').html('<div class="alert alert-danger" role="alert">Error uploading file: ' + error + '</div>');
                        }
                    });
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

    <footer class="main-footer">
        <strong>
            &copy; 2023-2024 <a href="#" target="_blank" class="text-muted">Business Directory Systems</a>.
        </strong>
        All rights reserved.
    </footer>
    <aside class="control-sidebar control-sidebar-dark"></aside>

</body>

</html>
