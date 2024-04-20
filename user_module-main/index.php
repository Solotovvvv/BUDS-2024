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

    // Check if the query was successful and if it returned rows
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the data from the result set
        $row = mysqli_fetch_assoc($result);
        $filePath = $row['file'];
    } else {
        // Set a default file path if no rows were returned by the query
        $filePath = ''; // You can set it to any default value you want
    }
} else {
    // Handle the case when $_SESSION['ownerId'] is not set
    // For example, you can redirect the user to a login page
    header("Location: login.php");
    exit(); // Make sure to exit after redirecting
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aler Template">
    <meta name="keywords" content="Aler, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/profilestyle.css">
    <title>BuDS</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
    <link rel="stylesheet" href="css/templatemo-plot-listing1.css" type="text/css">
    <style>
        .swal-confirm-button {
            width: 100px;
            /* Adjust the width as needed */
        }
    </style>

</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Offcanvas Menu Wrapper Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <span class="icon_close"></span>
        </div>
        <div class="logo">
            <a href="../index.php">
                <img src="img/logo-main.png" alt="">
            </a>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu Wrapper End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="hs-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="../index.php"><img src="img/logo-main.png" alt=""></a><br>
                            <!-- <ul>Business Directory</ul> -->
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="ht-widget">
                            <div class="hs-nav">
                                <nav class="nav-menu">
                                    <ul>
                                        <li class="profile-dropdown">
                                            <div class="user-profile">
                                            <img id="user-profile-img" alt class="w-px-40 h-auto rounded-circle" />
                                            </div>
                                            <ul class="dropdown dropleft">
                                                <li><a href="../user.php">MY PROFILE</a></li>
                                                <?php if ($_SESSION['role'] == 3) { ?>
                                                    <li><a href="index.php">CREATE RESUME</a></li>
                                                <?php } ?>
                                                <?php if ($_SESSION['role'] == 2) { ?>
                                                    <li><a href="../manage.php">MANAGE BUSINESS</a></li>
                                                    <li><a href="../listing-form.php">ADD BUSINESS</a></li>
                                                <?php } ?>
                                                <li><a href="../logout.php">LOGOUT</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas-open">
                    <span class="icon_menu"></span>
                </div>
            </div>
        </div>
        <div class="hs-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <nav class="nav-menu">
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <!-- <li><a href="./listing.html">Business Listing</a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Property Details Section Begin -->
    <section class="property-details-section">
    <div class="container-fluid" style="padding-left: 50px; padding-right: 40px;">
            <div class="row">
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

                <div class="col-8">
                    <div id="fileViewer"></div> <!-- Move the viewer outside the modal -->
                </div>
            </div>
        </div>

    </section>

    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="fs-about">
                        <div class="fs-logo">
                            <a href="#">
                                <img src="img/flogo.png" alt="">
                            </a>
                        </div>
                        <p>BuDS (Business Directory System of Caloocan City) is a convenient platform connecting residents and visitors with local businesses, offering easy access to essential information for fostering community engagement and economic growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.richtext.min.js"></script>
    <script src="js/image-uploader.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/myprofile1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

                fetchData();
            });

            function fetchData() {
            // Make an AJAX request to fetch data from the server
            $.ajax({
                url: '../fetchUserData.php', // Replace 'fetchUserData.php' with the actual file path to fetch data from your server
                type: 'GET',
                dataType: 'json',
                success: function(data) {

                    if (data.photo) {
                        $('#user-profile-img').attr('src', '../' + data.photo);
                     
                    } else {
                        $('#user-profile-img').attr('src', 'img/testimonial-author/unknown.jpg');
                     
                    }

                
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error
                }
            });
        }
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