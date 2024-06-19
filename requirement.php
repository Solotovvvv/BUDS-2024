<?php
session_start();
require_once './includes/config.php';

if (empty($_SESSION['ownerId']) || empty($_GET['a'])) {
    header('Location: manage.php');
}

$bus_id = $_GET['a'];
$_SESSION['bus_id'] = $_GET['a'];

$sql = "SELECT * FROM business_list AS bl 
INNER JOIN business_requirement AS br ON bl.bus_id = br.bus_id
WHERE bl.bus_id = :id
ORDER BY br.created_at DESC";
$pdo = Database::connection();
$stmt1 = $pdo->prepare($sql);
$stmt1->bindParam(':id', $bus_id, PDO::PARAM_STR);
$stmt1->execute();
$datas = $stmt1->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="plugins/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Business Dashboard</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="plugins/assets/vendor/css/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="plugins/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="plugins/assets/vendor/fonts/boxicons.css">
    <link rel="stylesheet" href="plugins/assets/css/demo.css">
    <link rel="stylesheet" href="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <script src="plugins/assets/vendor/js/helpers.js"></script>
    <script src="plugins/assets/js/config.js"></script>
    <style>
        .job-listing {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .job-listing-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .job-details {
            display: flex;
            flex-direction: column;
        }

        .job-title {
            font-weight: bold;
        }

        .job-location,
        .job-date {
            color: #888;
        }

        .job-action {
            align-self: center;
        }

        .job-action a {
            text-decoration: none;
            color: #007bff;
            border: 1px solid #007bff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .job-action a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .job-detail-container {
            padding: 20px;
            border: 1px solid #ddd;
                height: 100%;
            border-radius: 5px;
            display: none;
        }

        .job-detail-header {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .job-detail-body {
            color: #555;
            /* max-height: auto; */
            height: 100%;
            /* Adjust the height as needed */
            overflow-y: hidden;

        }

        .job-detail-body div {
            margin-bottom: 20px;
            height: 100%;
            /* Add some spacing between image divs */
        }

        .close-btn {
            align-self: flex-end;
            /* Aligns the button to the end of its container */
            /* Add any additional styles here */
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
                            <img src="img/logo/buds-logo.png" alt="" class="brand-image" width="45" height="50">
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
                    <li class="menu-item">
                        <a href="<?php echo "FAQ.php?a=" . $bus_id ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-message-rounded"></i>
                            <div data-i18n="Analytics">FAQ</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Business Document</span>
                    </li>
                    <li class="menu-item active">
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
                        <ul class="navbar-nav align-items-center ms-auto">
                            <li class="nav-item lh-1 me-3">
                                <!-- <h6 class="fw-bold">Bacolod City Business Portal</h6> -->
                            </li>
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="img/testimonial-author/unknown.jpg" alt class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="img/testimonial-author/unknown.jpg" alt class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <!-- <span class="fw-semibold d-block">Bacolod City</span> -->
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
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
                        <h4 class="fw-bold p-2"><span class="text-muted fw-light">Business /</span> Documents</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdropRequiremnents">
                                    Upload Requirements
                                </button>
                                <div class="card mb-4">
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <div class="job-listing">
                                            <?php
                                            foreach ($datas as $data) {
                                                $date = new DateTime($data['created_at']);
                                                $formattedDate = $date->format('F j Y g:i A');
                                                echo '
                                    <div class="job-listing-container">
                                        <div class="job-listing-item" onclick=\'showJobDetails(' . json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) . ')\'>
                                            <div class="job-details">
                                                <div class="job-title">' . htmlspecialchars($formattedDate) . '</div>
                                            </div>
                                            <div class="job-action">
                                                <a href="javascript:void(0)">View Requirements</a>
                                            </div>
                                        </div>
                                    </div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="height:100%">
                                <div class="job-detail-container" id="job-detail-container" style="height: 700px;">
                                    <div class="job-detail-header d-flex justify-content-between align-items-center fs-3" id="job-detail-header">
                                        <div>Business Requirements</div>
                                        <div>
                                            <button class="close-btn btn btn-secondary" onclick="closeJobDetails()">Close</button>
                                        </div>
                                    </div>
                                    <div class="job-detail-body" style="height:100%" id="job-detail-body"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>

                <!-- Modal for business requirements -->
                <div class="modal fade" id="staticBackdropRequiremnents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Upload Requirements</h5>
                                <button type="button" id="closeModalButton" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <h5 class="card-title"><b>Barangay Clearance</b></h5>
                                    <div class="">
                                        <input type="file" name="uploadBrgyClearance[]" class="form-control" id="fileUpload" multiple>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-title"><b>Dti Permit</b></h5>
                                    <div class="">
                                        <input type="file" name="uploadDTIPermit[]" class="form-control" id="fileUpload" multiple>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-title"><b>Sanitary Permit</b></h5>
                                    <div class="">
                                        <input type="file" name="uploadSanitaryPermit[]" class="form-control" id="fileUpload" multiple>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-title"><b>Cedula</b></h5>
                                    <div class="">
                                        <input type="file" name="uploadCedula[]" class="form-control" id="fileUpload" multiple>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-title"><b>Mayor's Permit</b></h5>
                                    <div class="">
                                        <input type="file" name="uploadBusinessPermit[]" class="form-control" id="fileUpload" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="uploadRequirents()">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
    <script src="plugins/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="plugins/assets/vendor/libs/popper/popper.js"></script>
    <script src="plugins/assets/vendor/js/bootstrap.js"></script>
    <script src="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="plugins/assets/vendor/js/menu.js"></script>
    <script src="plugins/assets/js/main.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="plugins/assets/js/dashboards-analytics.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showJobDetails(data) {
            const jobDetailContainer = document.getElementById('job-detail-container');
            const jobDetailBody = document.getElementById('job-detail-body');

            // No need to parse JSON since data is already an object
            const jobData = data;
            console.log(jobData);

            // Remove '../' from the beginning of the path
            let pdfPath = jobData.bus_pdf;
            if (pdfPath.startsWith('../')) {
                pdfPath = pdfPath.substring(3);
            }

            // Set the inner HTML of the jobDetailBody with the iframe
            jobDetailBody.innerHTML = `
        <div>
            <p><strong>Requirements:</strong></p>
            <div class="text-center mb-3">
                <iframe id="pdfViewer" width="100%" height="100%" style="border: none;"></iframe>
            </div>
        </div>
    `;

            // Now set the src attribute of the iframe
            document.getElementById('pdfViewer').src = pdfPath;

            // Display the job details container
            jobDetailContainer.style.display = 'block';
        }



        function deleteImage(key, id) {
            var payload = {
                imagekey: key,
                id: id
            };

            Swal.fire({
                title: 'Delete Image',
                text: 'Are you sure you want to delete this image?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create FormData and append the file and other data
                    const formData = new FormData();
                    formData.append('payload', JSON.stringify(payload));
                    formData.append('setFunction', 'deleteRequirements');
                    // formData.append('imagekey', imageKey);
                    // formData.append('id', id);

                    // Create XMLHttpRequest and send the FormData
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "controllers/business.php", true);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Your image has been deleted.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload(); // Reload the DOM
                                    }
                                });

                            } else {
                                Swal.fire('Error!', 'There was an error uploading your image.', 'error');
                                console.error('Error:', xhr.statusText);
                            }
                        }
                    };

                    xhr.send(formData);
                } else {
                    // User canceled, clear file input
                    input.value = ''; // Clear the file input to reset selection
                    Swal.fire('Cancelled', 'Your image upload was cancelled.', 'info');
                }
            });

        }




        function handleImageUpload(imageKey, input, id) {
            const file = input.files[0];
            var payload = {
                imagekey: imageKey,
                id: id
            }; // You can populate this object with necessary data

            // Display confirmation dialog
            Swal.fire({
                title: 'Upload Image',
                text: 'Are you sure you want to upload this image?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Upload',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create FormData and append the file and other data
                    const formData = new FormData();
                    formData.append('payload', JSON.stringify(payload));
                    formData.append('setFunction', 'editRequirements');
                    formData.append('image', file);
                    // formData.append('imagekey', imageKey);
                    // formData.append('id', id);

                    // Create XMLHttpRequest and send the FormData
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "controllers/business.php", true);

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                Swal.fire({
                                    title: 'Uploaded!',
                                    text: 'Your image has been uploaded.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload(); // Reload the DOM
                                    }
                                });

                            } else {
                                Swal.fire('Error!', 'There was an error uploading your image.', 'error');
                                console.error('Error:', xhr.statusText);
                            }
                        }
                    };

                    xhr.send(formData);
                } else {
                    // User canceled, clear file input
                    input.value = ''; // Clear the file input to reset selection
                    Swal.fire('Cancelled', 'Your image upload was cancelled.', 'info');
                }
            });
        }

        function applyOnCompanySite() {
            // Write your function logic here
            // For example:
            console.log("Applying on company site...");
            // You can redirect the user to the company site or perform any other action
            // window.location.href = jobData.BusinessStatus;
        }

        function closeJobDetails() {
            const jobDetailContainer = document.getElementById('job-detail-container');
            jobDetailContainer.style.display = 'none';
        }


        // function uploadRequirents() {
        //     var payload = {};

        //     var formData = new FormData();

        //     // Append payload data as JSON
        //     formData.append('payload', JSON.stringify(payload));
        //     formData.append('setFunction', 'uploadBusinessRequirements');

        //     // Get the selected file (input element)
        //     var businessBrgyInput = $("input[name='barangayClearance']")[0]; // Assuming it's the first input element
        //     var businessBrgyFile = businessBrgyInput.files[0];

        //     var dtiPermitInput = $("input[name='DTIPermit']")[0]; // Assuming it's the first input element
        //     var dtiPermitFile = dtiPermitInput.files[0];

        //     var sanitaryPermitInput = $("input[name='sanitaryPermit']")[0]; // Assuming it's the first input element
        //     var sanitaryPermitFile = dtiPermitInput.files[0];

        //     var cedulaInput = $("input[name='edtCedula']")[0]; // Assuming it's the first input element
        //     var cedulaFile = dtiPermitInput.files[0];

        //     var mayorsPermitInput = $("input[name='mayorPermit']")[0]; // Assuming it's the first input element
        //     var mayorPermitsFile = dtiPermitInput.files[0];

        //     formData.append('bus_brgyclearance', businessBrgyFile);
        //     formData.append('bus_dtipermit', dtiPermitFile);
        //     formData.append('bus_sanitarypermit', sanitaryPermitFile);
        //     formData.append('bus_cedula', cedulaFile);
        //     formData.append('bus_mayorpermit', mayorPermitsFile);


        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "controllers/business.php", true);

        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState === 4) {
        //             console.log("Server response:", xhr.responseText);
        //             if (xhr.status === 200) {
        //                 // Handle success response
        //                 var data = JSON.parse(xhr.responseText);
        //                 console.log("Data received:", data);

        //                 if (data.title && data.message && data.icon) {
        //                     Swal.fire({
        //                         title: data.title,
        //                         text: data.message,
        //                         icon: data.icon
        //                     })
        //                     // Close the Bootstrap modal using Bootstrap's JavaScript API
        //                     $('#staticBackdropRequiremnents').modal('hide');
        //                     // Remove the 'show' class to hide the modal
        //                     $('#staticBackdropRequiremnents').removeClass('show');
        //                     // Set display to 'none' to ensure the modal is hidden
        //                     $('#staticBackdropRequiremnents').css('display', 'none');

        //                     // Fetch and update the job listings
        //                     // updateJobListings();
        //                     location.reload(); // Reload the DOM

        //                 } else {
        //                     console.error("Response does not contain all required fields.");
        //                 }
        //             } else {
        //                 // Handle error
        //                 console.log("Error:", xhr.statusText);
        //             }
        //         }
        //     };

        //     // Send the FormData object
        //     xhr.send(formData);
        // };

        function uploadRequirents() {
            var payload = {};

            var formData = new FormData();

            // Append payload data as JSON
            formData.append('payload', JSON.stringify(payload));
            formData.append('setFunction', 'uploadBusinessRequirements');

            var brgyClearanceInput = document.querySelector("input[name='uploadBrgyClearance[]']");
            var dtiPermitInput = document.querySelector("input[name='uploadDTIPermit[]']");
            var sanitaryPermitInput = document.querySelector("input[name='uploadSanitaryPermit[]']");
            var cedulaInput = document.querySelector("input[name='uploadCedula[]']");
            var businessPermitInput = document.querySelector("input[name='uploadBusinessPermit[]']");



            // Function to append files to FormData
            function appendFiles(inputElement, formData, fieldName) {
                if (inputElement && inputElement.files.length > 0) {
                    var files = inputElement.files;
                    for (var i = 0; i < files.length; i++) {
                        formData.append(fieldName + '[]', files[i]);
                    }
                }
            }

            appendFiles(brgyClearanceInput, formData, 'brgyClearance');
            appendFiles(dtiPermitInput, formData, 'DTIPermit');
            appendFiles(sanitaryPermitInput, formData, 'sanitaryPermit');
            appendFiles(cedulaInput, formData, 'cedula');
            appendFiles(businessPermitInput, formData, 'businessPermit');

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "controllers/business.php", true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    console.log("Server response:", xhr.responseText);
                    if (xhr.status === 200) {
                        // Handle success response
                        var data = JSON.parse(xhr.responseText);
                        console.log("Data received:", data);

                        if (data.title && data.message && data.icon) {
                            Swal.fire({
                                title: data.title,
                                text: data.message,
                                icon: data.icon
                            });
                            // Close the Bootstrap modal
                            $('#staticBackdropRequiremnents').modal('hide');
                            location.reload(); // Reload the DOM

                        } else {
                            console.error("Response does not contain all required fields.");
                        }
                    } else {
                        // Handle error
                        console.log("Error:", xhr.statusText);
                    }
                }
            };

            // Send the FormData object
            xhr.send(formData);
        }



        function updateJobListings() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "controllers/getUpdatedJobListings.php", true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var updatedData = JSON.parse(xhr.responseText);
                    var jobListingContainers = document.querySelectorAll('.job-listing-container');
                    jobListingContainers.forEach(function(container) {
                        container.innerHTML = ''; // Clear current content for each container
                        // container.classList.add('mb-2'); // Add class
                    });




                    updatedData.forEach(function(data) {
                        // Assuming data.created_at is in ISO 8601 format like "2024-05-26T12:30:00Z"
                        var createdDate = new Date(data.created_at);

                        // Format the date using toLocaleString
                        var formattedDate = createdDate.toLocaleString('en-US', {
                            month: 'long',
                            day: 'numeric',
                            year: 'numeric',
                            hour: 'numeric',
                            minute: 'numeric',
                            hour12: true
                        });

                        var jobListingItem = document.createElement('div');
                        jobListingItem.className = 'job-listing-item';
                        jobListingItem.onclick = function() {
                            showJobDetails(data);
                        };

                        var jobDetails = document.createElement('div');
                        jobDetails.className = 'job-details';

                        var jobTitle = document.createElement('div');
                        jobTitle.className = 'job-title';
                        jobTitle.textContent = formattedDate; // Adjust as necessary

                        jobDetails.appendChild(jobTitle);

                        var jobAction = document.createElement('div');
                        jobAction.className = 'job-action';

                        var viewRequirementsLink = document.createElement('a');
                        viewRequirementsLink.href = 'javascript:void(0)';
                        viewRequirementsLink.textContent = 'View Requirements';

                        jobAction.appendChild(viewRequirementsLink);

                        jobListingItem.appendChild(jobDetails);
                        jobListingItem.appendChild(jobAction);

                        // Append the job listing item to the appropriate container
                        jobListingContainers[0].appendChild(jobListingItem); // Assuming there's only one container
                    });
                    // $('.job-listing-container').addClass('mb-2');
                    document.querySelector('.job-listing').style.gap = '0'; // Set gap to 0px
                }
            };

            xhr.send();
        }
    </script>
</body>

</html>