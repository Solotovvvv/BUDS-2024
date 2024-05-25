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
            border-radius: 5px;
            display: none;
        }

        .job-detail-header {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .job-detail-body {
            color: #555;
            max-height: auto;
            /* Adjust the height as needed */
            overflow-y: auto;

        }

        .job-detail-body div {
            margin-bottom: 20px;
            /* Add some spacing between image divs */
        }

        .job-detail-body img {
            max-width: 100%;
            /* Ensure images don't exceed container width */
            height: 100%;
            /* Maintain aspect ratio */
        }

        .close-btn {
            align-self: flex-end;
            /* Aligns the button to the end of its container */
            /* Add any additional styles here */
        }

        .custom-file-input {
            color: transparent;
            margin-top: 5px;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Upload to edit';
            color: white;
            background-color: #007bff;
            display: inline-block;
            padding: 6px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-file-input:hover::before {
            background-color: #0056b3;
        }

        .custom-file-input:active::before {
            background-color: #004c99;
        }

        .custom-file-label {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            /* margin-left: 10px; */
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        .custom-transition-class {
            transition: transform 0.15s ease-out;
            transform: translateY(-100px) scale(0.8);
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
                                <!-- button for modal business requirements -->
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdropRequiremnents">
                                    Upload Requirements
                                </button>

                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">Status</h5> -->
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <div class="job-listing">
                                            <?php
                                            foreach ($datas as $data) {
                                                $date = new DateTime($data['created_at']);

                                                // Format the DateTime object to the desired format
                                                $formattedDate = $date->format('F j Y g:i A');
                                                echo '
                                                <div id="job-listing-container mb-3">
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
                            <div class="col-md-6">
                                <div class="job-detail-container" id="job-detail-container">
                                    <div class="job-detail-header d-flex justify-content-between align-items-center fs-3" id="job-detail-header">
                                        <div>Business Requirements</div>
                                        <div>
                                            <button class="close-btn btn btn-secondary" onclick="closeJobDetails()">Close</button>
                                        </div>
                                    </div>
                                    <div class="job-detail-body" id="job-detail-body"></div>
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
                                        <input type="file" name="barangayClearance" class="form-control" id="fileUpload" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-title"><b>Dti Permit</b></h5>
                                    <div class="">
                                        <input type="file" name="DTIPermit" class="form-control" id="fileUpload" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-title"><b>Sanitary Permit</b></h5>
                                    <div class="">
                                        <input type="file" name="sanitaryPermit" class="form-control" id="fileUpload" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-title"><b>Cedula</b></h5>
                                    <div class="">
                                        <input type="file" name="edtCedula" class="form-control" id="fileUpload" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="card-title"><b>Mayor's Permit</b></h5>
                                    <div class="">
                                        <input type="file" name="mayorPermit" class="form-control" id="fileUpload" accept=".jpg, .jpeg, .png">
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
            // const jobDetailHeader = document.getElementById('job-detail-header');
            const jobDetailBody = document.getElementById('job-detail-body');

            // No need to parse JSON since data is already an object

            const jobData = data;

            console.log(jobData)


            jobDetailBody.innerHTML = `
    <div>
        <p><strong>Brgy Clearance:</strong></p>
        <div class="text-center mb-3">
            <img src="img/requirements/${jobData.bus_brgyclearance}" alt="Brgy Clearance" style="max-width: 500px; max-height: 500px;">
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <input type="file" class="custom-file-input" id="edit_brgyclearance" accept="image/*" onchange="handleImageUpload('bus_brgyclearance', this)">
            <button class="btn btn-danger ms-2" onclick="deleteImage('bus_brgyclearance')">Delete</button>
        </div>
    </div>
    <div>
        <p><strong>Dti Permit:</strong></p>
        <div class="text-center mb-3">
            <img src="img/requirements/${jobData.bus_dtipermit}" alt="Dti Permit" style="max-width: 500px; max-height: 500px;">
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <input type="file" class="custom-file-input" id="edit_dtipermit" accept="image/*" onchange="handleImageUpload('bus_dtipermit', this)">
            <button class="btn btn-danger ms-2" onclick="deleteImage('bus_dtipermit')">Delete</button>
        </div>
    </div>
    <div>
        <p><strong>Sanitary Permit:</strong></p>
        <div class="text-center mb-3">
            <img src="img/requirements/${jobData.bus_sanitarypermit}" alt="Sanitary Permit" style="max-width: 500px; max-height: 500px;">
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <input type="file" class="custom-file-input" id="edit_sanitarypermit" accept="image/*" onchange="handleImageUpload('bus_sanitarypermit', this)">
            <button class="btn btn-danger ms-2" onclick="deleteImage('bus_sanitarypermit')">Delete</button>
        </div>
    </div>
    <div>
        <p><strong>Cedula:</strong></p>
        <div class="text-center mb-3">
            <img src="img/requirements/${jobData.bus_cedula}" alt="Cedula" style="max-width: 500px; max-height: 500px;">
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <input type="file" class="custom-file-input" id="edit_cedula" accept="image/*" onchange="handleImageUpload('bus_cedula', this)">
            <button class="btn btn-danger ms-2" onclick="deleteImage('bus_cedula')">Delete</button>
        </div>
    </div>
    <div>
        <p><strong>Mayor's Permit:</strong></p>
        <div class="text-center mb-3">
            <img src="img/requirements/${jobData.bus_mayorpermit}" alt="Mayor's Permit" style="max-width: 500px; max-height: 500px;">
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <input type="file" class="custom-file-input" id="edit_cedula" accept="image/*" onchange="handleImageUpload('bus_mayorpermit', this)">
            <button class="btn btn-danger ms-2" onclick="deleteImage('bus_mayorpermit')">Delete</button>
        </div>
    </div>
`;
            jobDetailContainer.style.display = 'block';
        }


        function handleImageUpload(imageKey, input) {
            const file = input.files[0];
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
                    // User confirmed, proceed with upload
                    console.log(`Uploading ${file.name} for ${imageKey}`);
                    // Here you can add your upload logic
                    Swal.fire('Uploaded!', 'Your image has been uploaded.', 'success');
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


        function uploadRequirents() {
            var payload = {};

            var formData = new FormData();

            // Append payload data as JSON
            formData.append('payload', JSON.stringify(payload));
            formData.append('setFunction', 'uploadBusinessRequirements');

            // Get the selected file (input element)
            var businessBrgyInput = $("input[name='barangayClearance']")[0]; // Assuming it's the first input element
            var businessBrgyFile = businessBrgyInput.files[0];

            var dtiPermitInput = $("input[name='DTIPermit']")[0]; // Assuming it's the first input element
            var dtiPermitFile = dtiPermitInput.files[0];

            var sanitaryPermitInput = $("input[name='sanitaryPermit']")[0]; // Assuming it's the first input element
            var sanitaryPermitFile = dtiPermitInput.files[0];

            var cedulaInput = $("input[name='edtCedula']")[0]; // Assuming it's the first input element
            var cedulaFile = dtiPermitInput.files[0];

            var mayorsPermitInput = $("input[name='mayorPermit']")[0]; // Assuming it's the first input element
            var mayorPermitsFile = dtiPermitInput.files[0];

            formData.append('bus_brgyclearance', businessBrgyFile);
            formData.append('bus_dtipermit', dtiPermitFile);
            formData.append('bus_sanitarypermit', sanitaryPermitFile);
            formData.append('bus_cedula', cedulaFile);
            formData.append('bus_mayorpermit', mayorPermitsFile);


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
                            })
                            // Close the Bootstrap modal using Bootstrap's JavaScript API
                            $('#staticBackdropRequiremnents').modal('hide');
                            // Remove the 'show' class to hide the modal
                            $('#staticBackdropRequiremnents').removeClass('show');
                            // Set display to 'none' to ensure the modal is hidden
                            $('#staticBackdropRequiremnents').css('display', 'none');

                            // Fetch and update the job listings
                            updateJobListings();

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
        };

        function updateJobListings() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "controllers/getUpdatedJobListings.php", true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var updatedData = JSON.parse(xhr.responseText);
                    var jobListingContainer = document.getElementById('job-listing-container');
                    jobListingContainer.innerHTML = ''; // Clear current content

                    updatedData.forEach(function(data) {
                        var jobListingItem = document.createElement('div');
                        jobListingItem.className = 'job-listing-item';
                        jobListingItem.onclick = function() {
                            showJobDetails(data);
                        };

                        var jobDetails = document.createElement('div');
                        jobDetails.className = 'job-details';

                        var jobTitle = document.createElement('div');
                        jobTitle.className = 'job-title';
                        jobTitle.textContent = data.created_at; // Adjust as necessary

                        jobDetails.appendChild(jobTitle);

                        var jobAction = document.createElement('div');
                        jobAction.className = 'job-action';

                        var viewRequirementsLink = document.createElement('a');
                        viewRequirementsLink.href = 'javascript:void(0)';
                        viewRequirementsLink.textContent = 'View Requirements';

                        jobAction.appendChild(viewRequirementsLink);

                        jobListingItem.appendChild(jobDetails);
                        jobListingItem.appendChild(jobAction);

                        jobListingContainer.appendChild(jobListingItem);
                    });
                }
            };

            xhr.send();
        }
    </script>
</body>

</html>