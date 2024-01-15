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
                    <li class="menu-item active">
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
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h3 class="card-header"><strong>Featured Post</strong></h3>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-2">
                                            <div class="button-wrapper">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNew">
                                                    Add New Post
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="Ajax1" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Caption</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="mt-3">
                                            <div class="modal fade" id="modalNew" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalCenterTitles">Add New Post
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" id="titleVal" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row g-2">
                                                                <div class="col mb-0">
                                                                    <label class="form-label">Caption</label>
                                                                    <textarea id="captionVal" class="form-control"></textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label>Upload Photo:</label>
                                                                    <br> <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                                        <span class="d-none d-sm-block">Upload new
                                                                            photo</span>
                                                                        <i class="bx bx-upload d-block d-sm-none"></i></label>
                                                                    <input type="file" name="uploadVal" id="upload" class="form-control" accept="image/png, image/jpeg" hidden>
                                                                </div>
                                                                <div class="publish-date mb-2">
                                                                    <label>Publish Date</label>
                                                                    <input type="date" id="dateVal" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                    Cancel
                                                                </button>
                                                                <button type="button" onclick="uploadPost()" class="btn btn-primary">Upload</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modal-default" data-keyboard="false" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                View Post</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-4">
                                                            <strong style="font-size: 15px;">Title</strong>

                                                            <p class="text-muted" style="text-align: justify; padding: 5px; font-size: 13px;" id="titleView">

                                                            </p>
                                                            <strong style="font-size: 15px;">Caption</strong>
                                                            <p class="text-muted" id="captionView" style="text-align: justify; padding: 5px; font-size: 13px;">

                                                            </p>
                                                            <div class="d-flex justify-content-center">
                                                                <img id="imageView" src="plugins/assets/img/avatars/1.png" alt="user-avatar" class="img-circle img-fluid" width="150" height="150">
                                                            </div>
                                                            <div class="publish-date mb-2">
                                                                <label>Publish Date</label>
                                                                <input type="date" id="dateView" disabled class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="modal-status" data-keyboard="false" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Status</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-4">
                                                            <h3 class="text-muted text-center" style="text-align: justify; padding: 5px;" id="postStatusText">
                                                            </h3>
                                                        </div>
                                                        <div class="d-flex modal-footer">
                                                            <input type="hidden" id="postStatusId">
                                                            <input type="hidden" id="postStatusNum">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                Cancel
                                                            </button>
                                                            <button type="button" onclick="postStatusEdt()" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalEditForm">Edit Post
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col mb-3">
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" id="titleEdt" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                            <div class="row g-2">
                                                                <div class="col mb-0">
                                                                    <label id="captions" class="form-label">Caption</label>
                                                                    <textarea id="captionEdt" class="form-control">You can make your own combination. Enjoy the New Promo Combo Mix & Match for the first time for only 89 pesos!</textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <br> <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                                        <span class="d-none d-sm-block">Upload new
                                                                            photo</span>
                                                                        <i class="bx bx-upload d-block d-sm-none"></i></label>
                                                                    <input type="file" id="uploadEdit" name="uploadEdit" class="form-control" accept="image/png, image/jpeg" hidden>
                                                                </div>
                                                            </div>
                                                            <div class="publish-date mb-2">
                                                                <label>Publish Date</label>
                                                                <input type="date" id="dateEdt" class="form-control">
                                                            </div>
                                                            <div class="d-flex modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                    Cancel
                                                                </button>
                                                                <button type="button" onclick="editPostSubmit()" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
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
            // $('#Ajax1').DataTable();
            $('#Ajax1').DataTable({
                'serverside': true,
                'processing': true,
                'paging': true,
                "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                }, ],
                'ajax': {
                    'url': 'posting_tbl.php',
                    'type': 'post',

                },
            });
        });
    </script>
    <script>
        function uploadPost() {
            var title = $('#titleVal').val();
            var desc = $('#captionVal').val();
            var date = $('#dateVal').val();

            var formData = new FormData();
            var payload = {
                title: title,
                desc: desc,
                date: date
            };
            formData.append('payload', JSON.stringify(payload));
            formData.append('setFunction', 'uploadPost');

            var picInput = $("input[name='uploadVal']")[0]; // Assuming it's the first input element
            var picFile = picInput.files[0];
            formData.append('pic', picFile);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "controllers/business.php", true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    console.log("Server response:", xhr.responseText);
                    if (xhr.status === 200) {
                        // Handle success response
                        var data = JSON.parse(xhr.responseText);
                        // console.log("Data received:", data);
                        swal.fire(data.title, data.message, data.icon);
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        // Handle error
                        console.log("Error:", xhr.statusText);
                    }
                }
            };

            // Send the FormData object
            xhr.send(formData);
        };

        function editPost(title, desc, photo, date) {
            $('#modalEdit').modal('show');
            var titleEdt = $('#titleEdt').val(title.replaceAll('_', ' '));
            var descEdt = $('#captionEdt').val(desc.replaceAll('_', ' '));
            var dateEdt = $('#dateEdt').val(date.replaceAll('_', ' '));
        };

        function editPostSubmit() {
            var titleEdt = $('#titleEdt').val();
            var descEdt = $('#captionEdt').val();
            var dateEdt = $('#dateEdt').val();
            var payload = {
                titleEdt: titleEdt,
                descEdt: descEdt,
                dateEdt: dateEdt
            }
            var formData = new FormData();
            formData.append('payload', JSON.stringify(payload));
            formData.append('setFunction', 'editPost');

            var picInput = $("input[name='uploadEdit']")[0]; // Assuming it's the first input element
            var picFile = picInput.files[0];
            formData.append('pic', picFile);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "controllers/business.php", true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    console.log("Server response:", xhr.responseText);
                    if (xhr.status === 200) {
                        // Handle success response
                        var data = JSON.parse(xhr.responseText);
                        // console.log("Data received:", data);
                        swal.fire(data.title, data.message, data.icon);
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        // Handle error
                        console.log("Error:", xhr.statusText);
                    }
                }
            };

            // Send the FormData object
            xhr.send(formData);
        }

        function viewPost(title, desc, photo, date) {
            $('#modal-default').modal('show');
            $('#titleView').text(title.replaceAll('_', ' '));
            $('#captionView').text(desc.replaceAll('_', ' '));
            // Assuming 'photo' contains the filename without spaces
            var newPhotoSrc = 'img/post/' + photo.replace('_', ' '); // Adjust the file extension if needed
            // Update the 'src' attribute of the image with id 'imageView'
            $('#imageView').attr('src', newPhotoSrc);
            $('#dateView').val(date.replaceAll('_', ' '));
        };

        function edtPostStatus(id, status) {
            $('#modal-status').modal('show');
            if (status == 0) {
                $('#postStatusText').text("Are you sure you want to set this job to active");
            } else {
                $('#postStatusText').text("Are you sure you want to set this job to inactive");
            }
            $('#postStatusId').val(id);
            $('#postStatusNum').val(status);
        };

        function postStatusEdt() {
          var postId = $('#postStatusId').val();
          var status = $('#postStatusNum').val();

          var payload = {
            postId: postId,
            status: status
          }

          $.ajax({
            type: "POST",
            url: 'controllers/business.php',
            data: {
              payload: JSON.stringify(payload),
              setFunction: 'edtPostStatus'
            },
            success: function(response) {
              var data = JSON.parse(response);
              Swal.fire({
                title: data.title,
                text: data.message,
                icon: data.icon,
                customClass: {
                  confirmButton: 'swal-confirm-button',
                },
                showCancelButton: false,
              });
              window.location.reload();
            }
          });

        };
    </script>
</body>


</html>