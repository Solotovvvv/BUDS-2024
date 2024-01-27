
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
  <title>BuDS | Admin Panel</title>
  <meta name="description" content="">
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/assets/vendor/fonts/boxicons.css">
  <link rel="stylesheet" href="plugins/assets/vendor/css/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="plugins/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="plugins/assets/css/demo.css">
  <link rel="stylesheet" href="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="icon" type="image/x-icon" href="plugins/assets/img/favicon/buds-logo.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="plugins/assets/vendor/js/helpers.js"></script>
  <script src="plugins/assets/js/config.js"></script>
  <style>
    .swal-confirm-button {
      width: 100px;
      /* Adjust the width as needed */
    }

    .swal2-container {
      z-index: 9999;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="plugins/assets/img/avatars/buds-logo.png" alt="" class="brand-image" width="30" height="30">
            </span>
            <span class="text-uppercase text-white app-brand-text demo menu-text fw-bolder ms-2">BuDS | Admin</span>
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
          <li class="menu-item active">
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
        <hr>


        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Job Applicants</h3>
                    <div class="d-grid gap- d-sm-flex justify-content-md-start">
                      <button class="btn btn-success me-sm-2" type="button" data-bs-toggle="modal" data-bs-target="#modalCenter"><i class="bx bx-user-pin"></i> Add Position</button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="Ajax1" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>

                      <script>
                        function handleJobSpec1Input(event) {
                          if (event.key === "Enter") {
                            addJobSpec1();
                          }
                        };

                        function handleJobSpec2Input(event) {
                          if (event.key === "Enter") {
                            addJobSpec2();
                          }
                        }
                      </script>

                      <!-- for edit position -->
                      <div class="modal fade" id="modalPos">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalPosTitle">Edit Position</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Position</label>
                                  <input type="text" id="edtPos" class="form-control" placeholder="Position" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Description</label>
                                  <textarea class="form-control" id="edtjobDesc" rows="3"></textarea>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Salary</label>
                                  <input class="form-control" id="edtSalary" ></input>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <label for="exampleFormControlTextarea2" class="form-label">Job Specification</label>
                                  <div id="uiJobDesc1">
                                    <div class="input-group">
                                      <!-- <input class="form-control addJobSpec1" id="exampleFormControlTextarea1" onkeydown="handleJobSpec1Input(event)">
                                      <button type="button" class="btn btn-icon btn-success" onclick="addJobSpec1()"><i class="bx bx-plus"></i></button> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <label for="degree" class="form-label">Additional Information</label>
                              </div>
                              <div class="row">
                                <div class="col-md-5 mb-2">
                                  <label for="degree" class="form-label">Degree</label>
                                  <input type="text" id="degree" class="form-control" placeholder="Degree" />
                                </div>
                                <div class="col-md-5 mb-2">
                                  <label for="experience" class="form-label">Years of Experience</label>
                                  <input type="text" id="experience" class="form-control" placeholder="Years of Experience" />
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" id="hidden_id">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" onclick="edtJob()" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- for add position -->
                      <div class="modal fade" id="modalCenter">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalCenterTitle">Add Position</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Position</label>
                                  <input type="text" id="jobTitle" class="form-control" placeholder="Position" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Description</label>
                                  <textarea class="form-control" id="jobDescription" rows="3"></textarea>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Salary</label>
                                  <input class="form-control" id="jobSalary" ></input>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <label for="exampleFormControlTextarea1" class="form-label">Job Specification</label>
                                  <div id="uiJobDesc2">
                                    <div class="input-group">
                                      <input class="form-control addJobSpec2" id="exampleFormControlTextarea2" onkeydown="handleJobSpec2Input(event)">
                                      <button type="button" class="btn btn-icon btn-success"><i class="bx bx-plus" onclick="addJobSpec2()"></i></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <label for="degree" class="form-label">Additional Information</label>
                              </div>
                              <div class="row">
                                <div class="col-md-5 mb-2">
                                  <label for="degree" class="form-label">Degree</label>
                                  <input type="text" id="degreeVal" class="form-control" placeholder="Degree" />
                                </div>
                                <div class="col-md-5 mb-2">
                                  <label for="experience" class="form-label">Years of Experience</label>
                                  <input type="text" id="experienceVal" class="form-control" placeholder="Years of Experience" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary" onclick="addJob()">Save changes</button>
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
            </div>
        </section>
      </div>

      <!-- Modal for job status -->
      <div class="modal fade" id="jobStatus">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Status</h5>
              <button type="button" onclick="closeModalJobStatus()">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h3 id="jobStatusText" style="text-align: center; color: black;"></h3>
              <input type="hidden" id="jobStatusId">
              <input type="hidden" id="jobStatusNum">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="closeModalJobStatus()">Close</button>
              <button type="button" class="btn btn-primary" onclick="jobStatusEdt()">Save changes</button>
            </div>
          </div>
        </div>
      </div>


      <script src="plugins/assets/vendor/libs/jquery/jquery.js"></script>
      <script src="plugins/assets/vendor/js/bootstrap.js"></script>
      <script src="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
      <script src="plugins/assets/vendor/js/menu.js"></script>
      <script src="plugins/assets/js/main.js"></script>
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
              'url': 'job_tbl.php',
              'type': 'post',

            },
          });

          $(document).on("click", ".minus-button-jobSpec1", function() {
            var key = $(this).data("key");
            removeAuthorDiv(this, key);
          });

          $(document).on("click", ".minus-button-jobSpec2", function() {
            var key = $(this).data("key");
            removeAuthorDiv(this, key);
          });
        });

        function addJobSpec1() {
          let allVal = [];
          $(".addJobSpec1").each(function() {
            let val = $(this).val(); // Trim to remove leading/trailing spaces
            if (val !== "") {
              allVal.push({
                value: val
              });
            }
          });
          if (allVal.length === 0) {
            allVal.push({
              value: ""
            });
          }
          let payload = {
            jobSpecs: JSON.stringify(allVal)
          }
          // console.log(payload);



          $.ajax({
            type: "POST",
            url: 'controllers/business.php',
            data: {
              payload: JSON.stringify(payload),
              setFunction: 'addJobSpec1'
            },
            success: function(response) {
              response = JSON.parse(response);
              // alert(response); // Display a success message
              // console.log(response);
              $('#uiJobDesc1').html(response);
            }
          });

        };

        function addJobSpec2() {
          let allVal = [];
          $(".addJobSpec2").each(function() {
            let val = $(this).val(); // Trim to remove leading/trailing spaces
            if (val !== "") {
              allVal.push({
                value: val
              });
            }
          });
          if (allVal.length === 0) {
            allVal.push({
              value: ""
            });
          }
          let payload = {
            jobSpecs: JSON.stringify(allVal)
          }
          // console.log(payload);


          $.ajax({
            type: "POST",
            url: 'controllers/business.php',
            data: {
              payload: JSON.stringify(payload),
              setFunction: 'addJobSpec2'
            },
            success: function(response) {
              response = JSON.parse(response);
              // alert(response); // Display a success message
              // console.log(response);
              $('#uiJobDesc2').html(response);
            }
          });
        };


        function removeAuthorDiv(button, key) {
          if (key === '') {
            var divToRemove = $(button).closest(".input-group");
            divToRemove.remove();
          } else {
            var divToRemove = $(button).closest(".input-group");
            divToRemove.remove();
          }
        };

        function addJob() {
          var jobTitle = $("#jobTitle").val();
          var jobDesc = $('#jobDescription').val();
          var jobSalary = $('#jobSalary').val();
          var jobSpecificationsValue = [];
          $(".addJobSpec2").each(function() {
            var jobSpecificationValue = $(this).val().trim();
            if (jobSpecificationValue !== "") {
              jobSpecificationsValue.push({
                val: jobSpecificationValue
              });
            }
          });
          var degree = $('#degreeVal').val();
          var experience = $('#experienceVal').val();

          var payload = {
            jobTitle: jobTitle,
            jobDesc: jobDesc,
            jobSpecifications: jobSpecificationsValue,
            degree: degree,
            experience: experience,
            jobSalary: jobSalary
          }

          $.ajax({
            type: "POST",
            url: 'controllers/business.php',
            data: {
              payload: JSON.stringify(payload),
              setFunction: 'addJob'
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

        function edtJob() {
          var pos = $('#edtPos').val();
          var jobDescEdt = $('#edtjobDesc').val();
          var degreeEdt = $('#degree').val();
          var edtSalary = $('#edtSalary').val();
          var expEdt = $('#experience').val();
          var id = $('#hidden_id').val();
          let edtJobSpec = [];
          $(".addJobSpec1").each(function() {
            let val = $(this).val(); // Trim to remove leading/trailing spaces
            if (val !== "") {
              edtJobSpec.push({
                value: val
              });
            }
          });

          var payload = {
            pos: pos,
            jobDescEdt: jobDescEdt,
            degreeEdt: degreeEdt,
            edtJobSpec: edtJobSpec,
            edtSalary: edtSalary,
            expEdt: expEdt,
            id: id
          };

          $.ajax({
            type: "POST",
            url: 'controllers/business.php',
            data: {
              payload: JSON.stringify(payload),
              setFunction: 'edtJob'
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

        function editJob(id, pos, jobdesc, jobspec, degree, salary, exp) {
          $('#modalPos').modal('show');
          $('#edtPos').val(pos.replaceAll('_', ' '));
          $('#edtjobDesc').val(jobdesc.replaceAll('_', ' '));
          $('#degree').val(degree.replaceAll('_', ' '));
          $('#edtSalary').val(salary.replaceAll('_', ' '));
          $('#experience').val(exp.replaceAll('_', ' '));
          $('#hidden_id').val(id);

          // Clear the previous content of #uiJobDesc1
          $("#uiJobDesc1").empty();

          // Declare the jobspecItems array as an empty array
          var jobspecItems = [];

          var jobsec = jobspec.replaceAll('_', ' ');

          jobspecItems = jobsec.split(',');
          $.each(jobspecItems, function(index, item) {
            // Remove any leading/trailing whitespace
            item = item.trim();

            // Skip empty items
            if (item !== '') {
              // Create a new div element with the specified structure
              var newDiv = $("<div class='input-group'></div>");

              // Create an input element and set its value
              var input = $("<input class='form-control addJobSpec1' id='exampleFormControlTextarea1' onkeydown='handleJobSpec1Input(event)'>");
              input.val(item);

              // Create a button element with the specified attributes
              var button = $("<button type='button' class='btn btn-icon btn-success minus-button-jobSpec1'><i class='bx bx-minus'></i></button>");
              button.attr('data-key', item);

              // Append the input and button elements to the new div
              newDiv.append(input, button);

              // Append the new div to #uiJobDesc1
              $("#uiJobDesc1").append(newDiv);
            }
          });

          // Create the plus variable outside the loop
          var plus = $(
            "<div class='input-group'><input class='form-control addJobSpec1' id='exampleFormControlTextarea1' onkeydown='handleJobSpec1Input(event)'><button type='button' class='btn btn-icon btn-success' onclick='addJobSpec1()'><i class='bx bx-plus'></i></button></div>"
          );

          // Append the plus variable outside the loop
          $("#uiJobDesc1").append(plus);
        };

        function edtJobStatus(id, status) {
          $('#jobStatus').modal('show');
          if (status == 0) {
            $('#jobStatusText').text("Are you sure you want to set this job to active");
          } else {
            $('#jobStatusText').text("Are you sure you want to set this job to inactive");
          }
          $('#jobStatusId').val(id);
          $('#jobStatusNum').val(status);
        };

        function closeModalJobStatus() {
          $('#jobStatus').modal('hide');
        };

        function jobStatusEdt() {
          var jobId = $('#jobStatusId').val();
          var status = $('#jobStatusNum').val();

          var payload = {
            jobId: jobId,
            status: status
          }

          $.ajax({
            type: "POST",
            url: 'controllers/business.php',
            data: {
              payload: JSON.stringify(payload),
              setFunction: 'edtJobStatus'
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