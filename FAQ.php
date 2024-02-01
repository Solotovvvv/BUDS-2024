<?php
session_start();
// echo $_SESSION['ownerId'];

if (empty($_SESSION['ownerId']) || empty($_GET['a'])) {
    header('Location: manage.php');
}
$bus_id = $_GET['a'];
$_SESSION['bus_id'] = $_GET['a'];
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="plugins/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Business Dashboard</title>
    <meta name="description" content="">
    <link rel="icon" type="image/x-icon" href="plugins/assets/img/favicon/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="plugins/assets/vendor/fonts/boxicons.css">
    <link rel="stylesheet" href="plugins/assets/vendor/css/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="plugins/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="plugins/assets/css/demo.css">
    <link rel="stylesheet" href="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="plugins/assets/vendor/js/helpers.js"></script>
    <script src="plugins/assets/js/config.js"></script>
    <style>
        .swal2-container {
            z-index: 9999;
        }

        .btn-dashed {
            border: 1.2px dashed #198754;
            color: #198754;
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
                        <span class="text-uppercase text-white app-brand-text demo menu-text fw-bolder ms-2">BUSINESS</span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
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
                    <li class="menu-item ">
                        <a href="<?php echo "feature-post.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-share"></i>
                            <div data-i18n="Analytics">Feature Post</div>
                        </a>
                    </li>

                    <li class="menu-item">
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

                    <li class="menu-item active">
                        <a href="<?php echo "FAQ.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-message-rounded"></i>
                            <div data-i18n="Analytics">FAQ</div>
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
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <?php if ($_SESSION['photo'] != "") { ?>
                                            <img src="<?php echo "img/profile-picture/" . $_SESSION['photo'] ?>" alt="User's Name">
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
                                                            <img src="<?php echo "img/profile-picture/" . $_SESSION['photo'] ?>" alt="User's Name">
                                                        <?php } else { ?>
                                                            <img src="img/testimonial-author/unknown.jpg" alt="User's Name">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?php echo $_SESSION['lname'] . ' , ' . $_SESSION['fname'] ?></span>
                                                    <small class="text-muted"><?php echo $_SESSION['userTypeDesc'] ?></small>
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


                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h3 class="card-header"><strong>FAQ'S</strong></h3>
                                    <div class="card-body">
                                        <div class="container" id="cardContainer">
                                            <!-- Hidden card template -->
                                            <div class="card position-relative" style="display: none;" id="hiddenCard">
                                                <!-- Container for "X" and "edit" icons -->
                                                <div class="icon-container position-absolute top-0 end-0 p-2">
                                                    <!-- Boxicon for "X" sign in the upper right corner -->
                                                    <i class='bx bx-x cursor-pointer' style="font-size: 1.5rem;"></i>
                                                    <!-- Boxicon for edit in the upper right corner -->
                                                    <i class='bx bx-edit cursor-pointer' style="font-size: 1.5rem;"></i>
                                                </div>

                                                <div class="card-body">


                                                    <!-- Input Field 1 -->
                                                    <div class="mb-3">
                                                        <label for="Question" id="lbl" class="form-label">Question</label>
                                                        <input type="text" class="form-control question-input" id="Question">
                                                    </div>

                                                    <!-- Input Field 2 -->
                                                    <div class="mb-3">
                                                        <label for="Answer" class="form-label">Answer</label>
                                                        <input type="text" class="form-control answer-input" id="Answer">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Button to add new question -->
                                            <div class="d-grid mt-4">
                                                <button type="button" id="addbtn" class="btn btn-outline-success btn-dashed mx-auto d-block mb-3 w-100">Add new question</button>
                                            </div>


                                        </div>

                                        <div class="d-grid mt-4">
                                            <button type="button" id="save" class="btn btn-info  mx-auto d-block mb-3 w-10">Saved</button>
                                        </div>
                                        <hr class="my-0">
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>

                <div class="layout-overlay layout-menu-toggle"></div>
            </div>
        </div>
        <script src="plugins/assets/vendor/js/bootstrap.js"></script>
        <script src="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="plugins/assets/vendor/js/menu.js"></script>
        <script src="plugins/assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                var cardCounter = 1;
                var questions = []; // Array to store questions

                
                $("#addbtn").click(function() {
                    var newCard = $("#hiddenCard").clone().removeAttr("style id").addClass("mb-5");;
                    newCard.find("#lbl").text("Question " + cardCounter);
                    newCard.find(".form-control").attr("id", "Question" + cardCounter);

                    // Append the new card to the container
                    $("#cardContainer").append(newCard);
                    cardCounter++;
                });
                // Click event handler for the "Save" button


                $("#save").click(function() {
                    var savedQuestions = [];
                    var savedAnswers = [];

                    // Iterate through each question and save its value by ID
                    $(".question-input").each(function() {
                        var questionId = $(this).attr("id");
                        var questionValue = $(this).val();

                        if (questionValue.trim() !== "") {
                            savedQuestions.push({
                                id: questionId,
                                value: questionValue
                            });
                        }
                    });

                    $(".answer-input").each(function() {
                        var answerId = $(this).attr("id");
                        var answerValue = $(this).val();

                        if (answerValue.trim() !== "") {
                            savedAnswers.push({
                                id: answerId,
                                value: answerValue
                            });
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "faq_controller.php",
                        data: {
                            id: <?php echo $bus_id ?>,
                            questions: JSON.stringify(savedQuestions),
                            answers: JSON.stringify(savedAnswers)
                        },
                        success: function(response) {
                            var jsons = JSON.parse(response);
                            var status = jsons.status;

                            if (status === 'success') {
                                alert("Saved");
                             
                            } else {
                                alert("Failed to save. Please try again.");
                            }
                        },
                        error: function(error) {
                            // Handle error response from the server
                            console.error(error);
                        }
                    });


                    // Log or process the saved questions
                    console.log("Saved Questions:", savedQuestions);
                    console.log("Saved Answer:", savedAnswers);
                });
            });

           
            // Function to display fetched FAQs
      
        </script>


</body>


</html>