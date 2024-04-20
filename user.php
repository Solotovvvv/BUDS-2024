<?php
include('includes/config.php');
session_start();
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
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Wrapper Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <span class="icon_close"></span>
        </div>
        <div class="logo">
            <a href="./index.php">
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
                            <a href="./index.php"><img src="img/logo-main.png" alt=""></a><br>
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
                                                <img id="user-profile-img" alt="User's Name">
                                            </div>

                                            <ul class="dropdown dropleft">
                                                <li><a href="user.php">MY PROFILE</a></li>
                                                <?php if ($_SESSION['role'] == 3) { ?>
                                                    <li><a href="user_module-main/index.php">CREATE RESUME</a></li>
                                                <?php } ?>
                                                <?php if ($_SESSION['role'] == 2) { ?>
                                                    <li><a href="manage.php">MANAGE BUSINESS</a></li>
                                                    <li><a href="listing-form.php">ADD BUSINESS</a></li>
                                                <?php } ?>
                                                <li><a href="logout.php">LOGOUT</a></li>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pd-text">
                        <br>
                        <div class="pd-widget">
                            <div class="col-lg-5">
                                <div class="section-title">
                                    <h4>MY PROFILE</h4>
                                </div>
                            </div>
                            <div class="container">
                                <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                                    <div class="profile-tab-nav border-right">

                                        <div class="p-4">
                                            <div class="img-circle text-center mb-3" style="position: relative;">

                                                <div class="profile">
                                                    <img id="uploadedImage" src="https://as1.ftcdn.net/v2/jpg/03/53/11/00/1000_F_353110097_nbpmfn9iHlxef4EDIhXB1tdTD0lcWhG9.jpg" alt="Profile Picture" width="150">
                                                </div>

                                                <div class="form-group mb-3">

                                                    <input type="file" class="form-control-file" id="fileUpload" style="display: none">
                                                    <button id="uploadBtn" type="button" class="btn btn-primary" style="display: none" onclick="document.getElementById('fileUpload').click()">Upload Photo</button>
                                                </div>
                                            </div>
                                            <h4 class="text-center" id="name"></h4>
                                        </div>


                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                                                <i class="fa fa-home text-center mr-1"></i>
                                                My Profile
                                            </a>
                                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                                                <i class="fa fa-key text-center mr-1"></i>
                                                Password
                                            </a>
                                        </div>
                                    </div>

                                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                            <button type="button" class="btn btn-primary float-right" id="editUserInfo"><i class="fa fa-cogs text-center"></i></button>
                                            <h3 class="mb-4">User's Information</h3>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="inputName" id="nameLabel">Name:</label>
                                                        <input type="text" id="update_fname" class="form-control mb-2" style="display: none">
                                                        <input type="text" id="update_mname" class="form-control mb-2" style="display: none">
                                                        <input type="text" id="update_sname" class="form-control" style="display: none">
                                                        <p id="nameParagraph"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail">Email:</label>
                                                        <input type="text" id="update_email" class="form-control" style="display: none">
                                                        <p id="emailParagraph"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputAddress">Addresss:</label>
                                                        <input type="text" id="update_address" class="form-control" style="display: none">
                                                        <p id="addressParagraph"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputBirthday">Birthday:</label>
                                                        <input type="date" id="update_birthday" class="form-control" style="display: none">
                                                        <p id="bdayParagraph"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputContactNumber">Contact Number:</label>
                                                        <input type="text" id="update_number" class="form-control" style="display: none">
                                                        <p id="numberParagraph"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputAge">Age:</label>
                                                        <input type="text" id="update_age" class="form-control" style="display: none">
                                                        <p id="ageParagraph"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputGender">Gender:</label>
                                                        <input type="text" id="update_gender" class="form-control" style="display: none">
                                                        <p id="genderParagraph"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" id="SaveBtn" class="btn btn-primary" style="display: none" onclick="Save()">Save</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                            <h3 class="mb-4">Password Settings</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputOldPassword">Old password:</label>
                                                        <div class="input-group">
                                                            <input type="password" id="inputOldPassword" class="form-control">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#inputOldPassword">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputNewPassword">New password:</label>
                                                        <div class="input-group">
                                                            <input type="password" id="inputNewPassword" class="form-control">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#inputNewPassword">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputConfirmPassword">Confirm new password:</label>
                                                        <div class="input-group">
                                                            <input type="password" id="inputConfirmPassword" class="form-control">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#inputConfirmPassword">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <!-- Add an ID to the button for easier selection -->
                                                <button class="btn btn-success" id="updatePasswordBtn">Update</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fetch data when the page loads
            $('.toggle-password').click(function() {
                var target = $($(this).data('target'));
                var icon = $(this).find('i');

                if (target.attr('type') === 'password') {
                    target.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    target.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            fetchData();

            // Add click event listener to the "Settings" button
            $('#editUserInfo').click(function() {
                toggleFields();
            });


        });




        function toggleFields() {
            // Toggle display between input field and paragraph for each field
            var fieldsToToggle = [{
                    input: '#uploadBtn, #SaveBtn',
                    paragraph: null
                },
                {
                    input: '#update_fname',
                    paragraph: '#nameParagraph'
                },
                {
                    input: '#update_mname',
                    paragraph: null
                },
                {
                    input: '#update_sname',
                    paragraph: '#nameParagraph'
                },
                {
                    input: '#update_gender',
                    paragraph: '#genderParagraph'
                },
                {
                    input: '#update_age',
                    paragraph: '#ageParagraph'
                },
                {
                    input: '#update_number',
                    paragraph: '#numberParagraph'
                },
                {
                    input: '#update_birthday',
                    paragraph: '#bdayParagraph'
                },
                {
                    input: '#update_address',
                    paragraph: '#addressParagraph'
                },
                {
                    input: '#update_email',
                    paragraph: '#emailParagraph'
                }
            ];

            fieldsToToggle.forEach(function(field) {
                $(field.input).toggle();
                if (field.paragraph) {
                    $(field.paragraph).toggle();
                }
            });
        }

        function fetchData() {
            // Make an AJAX request to fetch data from the server
            $.ajax({
                url: 'fetchUserData.php', // Replace 'fetchUserData.php' with the actual file path to fetch data from your server
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate input field with fetched data when Settings button is clicked
                    $('#update_fname').val(data.Firstname);
                    $('#update_mname').val(data.MiddleName);
                    $('#update_sname').val(data.Surname);
                    $('#nameParagraph').text(data.FullName);

                    $('#update_gender').val(data.Sex);
                    $('#genderParagraph').text(data.Sex);

                    $('#update_age').val(data.Age);
                    $('#ageParagraph').text(data.Age);

                    $('#update_number').val(data.contactNumber);
                    $('#numberParagraph').text(data.contactNumber);

                    $('#update_birthday').val(data.Birthday);
                    $('#bdayParagraph').text(data.Birthday);

                    $('#update_address').val(data.Address);
                    $('#addressParagraph').text(data.Address);

                    $('#update_email').val(data.Email);
                    $('#emailParagraph').text(data.Email);


                    if (data.photo) {
                        $('#user-profile-img').attr('src', data.photo);
                        $('#uploadedImage').attr('src', data.photo);
                    } else {
                        $('#user-profile-img').attr('src', 'img/testimonial-author/unknown.jpg');
                        $('#uploadedImage').attr('src', 'img/testimonial-author/unknown.jpg');
                    }

                    $('#name').text(data.FullName);

                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error
                }
            });
        }

        function Save() {
            // Get the selected file from the file input
            var file = $('#fileUpload')[0].files[0];

            // Prepare form data to send both the file and the user data
            var formData = new FormData();
            formData.append('file', file);
            formData.append('Firstname', $('#update_fname').val());
            formData.append('MiddleName', $('#update_mname').val());
            formData.append('Surname', $('#update_sname').val());
            formData.append('Sex', $('#update_gender').val());
            formData.append('Age', $('#update_age').val());
            formData.append('contactNumber', $('#update_number').val());
            formData.append('Birthday', $('#update_birthday').val());
            formData.append('Address', $('#update_address').val());
            formData.append('Email', $('#update_email').val());

            // Make an AJAX request to save the data and the image
            $.ajax({
                url: 'saveUserDataAndImage.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success
                    console.log('Data and image saved successfully:', response);

                    // Toggle visibility based on the "Settings" button state
                    var settingsVisible = $('#uploadBtn').is(':visible');
                    if (!settingsVisible) {
                        // If settings are not visible, show input fields and hide p tags
                        toggleFields();
                    } else {
                        // If settings are visible, hide input fields and show p tags
                        toggleFields();
                    }


                    // For other fields, toggle visibility based on the same logic
                    // Repeat for other fields

                    fetchData();
                    swal({
                        title: "Success!",
                        text: "Data updated successfully.",
                        icon: "success",
                        button: "OK",
                    });

                },
                error: function(xhr, status, error) {
                    console.error('Error saving data and image:', error);
                    // Handle error
                }
            });
        }



        $('#updatePasswordBtn').on('click', function() {
            var oldPassword = $('#inputOldPassword').val();
            var newPassword = $('#inputNewPassword').val();
            var confirmPassword = $('#inputConfirmPassword').val();

            if (newPassword !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'New password and Confirm password do not match.'
                });
                return;
            }

            $.ajax({
                type: 'POST',
                url: 'change_password.php',
                data: {
                    oldPassword: oldPassword,
                    newPassword: newPassword
                },
                success: function(response) {
                    if (response === "Password updated successfully.") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response
                        }).then(() => {
                            // Clear input fields
                            $('#inputOldPassword').val('');
                
                        });;
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred: ' + error
                    }).then(() => {
                        // Clear input fields
                        $('#inputOldPassword').val('');
                        $('#inputNewPassword').val('');
                        $('#inputConfirmPassword').val('');
                    });;
                }
            });
        });
    </script>
</body>

</html>