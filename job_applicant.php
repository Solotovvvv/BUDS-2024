<?php
session_start();
// echo $_SESSION['ownerId'];
if (empty($_SESSION['ownerId']) || empty($_GET['a'])) {
  header('Location: manage.php');
}
$bus_id = $_GET['a'];
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
          <li class="menu-item ">
            <a href="<?php echo "job_position.php?a=" . $bus_id ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-user"></i>
              <div data-i18n="Analytics">Job Positions</div>
            </a>
          </li>
          <li class="menu-item active">
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
                    <img src="plugins/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="plugins/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="auth-login-basic.php">
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

                    <select name="" id="filter" class="form-select">
                      <option value="" selected disabled>Select</option>
                      <option value="4">All</option>
                      <option value="0">Pending</option>
                      <option value="1">Notified</option>
                      <option value="2">Unreachable</option>
                    </select>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="applicant_tbl" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                      </table>







                      <!-- Modal -->
                      <div class="modal fade" id="Status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <select name="" id="s" class="form-select">
                                <option value="" selected disabled>Select</option>
                                <option value="0" style="display: none">Pending</option>
                                <option value="1">Notified</option>
                                <option value="2">Unreachable</option>
                              </select>
                            </div>
                            <div class="modal-footer">
                              <input type="text" id="hiddendata1">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" onclick="SaveRemarks()">Save changes</button>
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


      <div class="modal fade" id="view_resume" tabindex="-1" role="dialog" aria-labelledby="fileViewerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document"> <!-- Adjust the size if needed, e.g., modal-lg, modal-sm, etc. -->
          <div class="modal-content">
            <div class="modal-body">
              <div id="fileViewer" style="height: 800px;"></div> <!-- Set a fixed height for the viewer -->
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
      <script>
        $(document).ready(function() {


          var dataTable = $('#applicant_tbl').DataTable({
            'serverSide': true,
            'processing': true,
            'paging': true,
            "columnDefs": [{
              "className": "dt-center",
              "targets": "_all"
            }, ],
            'ajax': {
              'url': 'applicant_table.php',
              'type': 'post',
              'data': function(d) {
                // Pass the 'a' parameter from the URL
                d.bus_id = <?php echo json_encode($_GET['a']); ?>;


                // Pass the selected filter value
                d.filter = $('#filter').val();
              },
            },
          });


          $('#filter').change(function() {
            // Get the selected value
            var selectedValue = $(this).val();

            // Reload the DataTable with the updated filter value
            dataTable.ajax.reload();
          });

        })


        // Function to load and show resume in the modal
        function view(app_id) {
          // Use the passed app_id
          $.ajax({
            url: 'get_resume.php',
            type: 'POST',
            data: {
              app_id: app_id
            },
            success: function(pdfPath) {
              if (pdfPath !== 'File not found') {
                // Set the PDF content in the fileViewer div
                $('#fileViewer').html('<iframe src="' + pdfPath + '" width="100%" height="100%" frameborder="0"></iframe>');
                // Show the modal
                $('#view_resume').modal('show');
              } else {
                // Handle case where the file is not found
                console.error('File not found');
              }
            },
            error: function(xhr, status, error) {
              console.error('Error fetching content:', error);
            }
          });
        }

        function status(id) {
          $('#hiddendata1').val(id);

          $.post("jobapplicant_Status.php", {
            id: id
          }, function(data, status) {
            var response = JSON.parse(data);

            if (response.success) {

              $('#s option[value="' + response.Status + '"]').prop('selected', true);
              $('#Status').modal('show');
            } else {
              // Handle error case here (e.g., display an error message)
              alert(response.message);
            }
          });
        }


        function SaveRemarks() {
          var hiddendata1 = $('#hiddendata1').val();
          var status = $('#s').val();


          $.post("jobapplicant_Status.php", {
            hiddendata1: hiddendata1,
            status: status
          }, function(data, status) {
            var jsons = JSON.parse(data);
            status = jsons.status;
            if (status == 'success') {
              var update = $('#applicant_tbl').DataTable().ajax.reload();
            }
          });
          $('#Status').modal("hide");
        }
      </script>

</body>

</html>