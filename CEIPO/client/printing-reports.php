<?php
session_start();
if (empty($_SESSION['ownerId'])) {
  header('Location: ../index.php'); // Redirect to the login page if ownerId is not set
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="plugins/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Business Dashboard</title>
  <meta name="description" content="">
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/assets/vendor/fonts/boxicons.css">
  <link rel="stylesheet" href="plugins/assets/vendor/css/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="plugins/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="plugins/assets/css/demo.css">
  <link rel="stylesheet" href="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="icon" type="image/x-icon" href="plugins/assets/img/favicon/favicon.ico">
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
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="plugins/assets/img/avatars/buds-logo.png" alt="" class="brand-image" width="50" height="50">
            </span>
            <span class="text-uppercase text-white app-brand-text demo menu-text fw-bolder ms-2">CEIPO</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <li class="menu-header text-uppercase">
          </li>

          <li class="menu-item">
            <a href="index.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-dashboard"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>


          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bxs-buildings"></i>
              <div data-i18n="Layouts">Business Application</div>
              <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger rounded-circle"></span>

            </a>

            <ul class="menu-sub list-inline">
              <li class="list-inline-block menu-item">
                <a href="approval-registration.php" class="menu-link">
                  <div data-i18n="Without navbar">Approval of Registration</div>
                  <span class="position-absolute top-6 start-100 translate-middle badge rounded-pill bg-danger" style="margin-left: -0.5rem;">99+</span>
                </a>
              </li>

              <li class="list-inline-block menu-item">
                <a href="re-evaluation.php" class="menu-link">
                  <div data-i18n="Without navbar">Re-Evaluation</div>
                </a>
              </li>

              <li class="list-inline-block menu-item">
                <a href="business-applicant-status.php" class="menu-link">
                  <div data-i18n="Without menu">Approved Business</div>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bxs-category"></i>
              <div data-i18n="Layouts">Business Categories</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="top-business.php" class="menu-link">
                  <div data-i18n="Without menu">Top 10 Business Category</div>
                </a>
              </li>
              <!-- <li class="menu-item">
                <a href="business-category.php" class="menu-link">
                  <div data-i18n="Without navbar">Buisness Category </div>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="menu-item">
            <a href="viewing-business.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-search"></i>
              Searching Business
            </a>
          </li>
          <li class="menu-item active">
            <a href="printing-reports.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-report"></i>
              <div data-i18n="Analytics">Reports</div>
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
                          <span class="fw-semibold d-block"><?php echo $_SESSION['lname'] . ', ' . $_SESSION['fname'] ?></span>
                          <small class="text-muted"><?php echo $_SESSION['userTypeDesc'] ?></small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../../logout.php">
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
                    <h3 class="card-title">Reports</h3>
                    <hr>
                  </div>
                  <div class="card-body">
                    <div>
                      <div class="row">
                        <!-- First Column for Categories -->
                        <div class="col-sm-3">
                          <div class="form-floating">
                            <select class="form-select" id="Category" name="category" aria-label="Floating label select example">
                              <option selected value="0">Select</option>
                              <?php
                              include '../../includes../config.php'; // Include your database connection code
                              $pdo = DATABASE::connection();

                              try {
                                // Define the SQL query to fetch categories
                                $categoryQuery = "SELECT `ID`, `category` FROM `category_list`";

                                // Prepare and execute the query
                                $categoryStatement = $pdo->query($categoryQuery);

                                // Fetch categories and populate the dropdown
                                while ($row = $categoryStatement->fetch(PDO::FETCH_ASSOC)) {
                                  echo "<option value='" . $row['ID'] . "'>" . $row['category'] . "</option>";
                                }
                              } catch (PDOException $e) {
                                // Handle database errors
                                echo "Database error: " . $e->getMessage();
                              }
                              ?>
                            </select>
                            <label for="Category">Select a Category</label>
                          </div>
                        </div>

                        <!-- Second Column for Subcategories -->
                        <div class="col-sm-3">
                          <div class="form-floating">
                            <select class="form-select" id="SubCategory" name="subcategory" aria-label="Floating label select example" disabled>
                              <option selected value="0">Select</option>
                            </select>
                            <label for="SubCategory">Select a Subcategory</label>
                          </div>
                        </div>


                        <div class="col-sm-2">
                          <div class="form-floating">
                            <select class="form-select" id="barangayFilter" aria-label="Floating label select example">
                              <option value="">Select a Barangays</option>
                              <option value="-1">All</option>
                              <?php
                              $populateBrgy = "SELECT * FROM brgyzone_list";
                              $pdo = Database::connection();
                              $stmt1 = $pdo->prepare($populateBrgy);
                              $stmt1->execute();
                              $datas1  = $stmt1->fetchAll();
                              foreach ($datas1 as $data) { ?>
                                <option value="<?php echo $data['ID'] ?>"><?php echo $data['barangay'] ?></option>';
                              <?php } ?>
                            </select>

                            <label for="floatingSelect">Select Barangay</label>
                          </div>
                        </div>


                        <div class="col-sm-2">
                          <div class="form-floating">
                            <select class="form-select" id="capitalizationFilter" aria-label="Floating label select example">
                              <option selected>Select</option>
                              <option value="All">All</option>
                              <option value="low">Low</option>
                              <option value="medium">Medium</option>
                              <option value="high">High</option>
                            </select>
                            <label for="floatingSelect">Select Capitalization</label>
                          </div>
                        </div>

                        <!-- Third Column for Button -->
                        <div class="col-sm-2">
                          <div class="form-floating">
                            <button id="printButton" class="btn btn-success me-sm-2" type="button"><i class="bx bx-printer"></i> Print</button>
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



        <script src="plugins/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="plugins/assets/vendor/js/bootstrap.js"></script>
        <script src="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="plugins/assets/vendor/js/menu.js"></script>
        <script src="plugins/assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          $(document).ready(function() {
            $("#Category").change(function() {
              var categoryId = $(this).val();

              // Clear existing options in subcategory dropdown
              $("#SubCategory").html("<option selected value='0'>Select</option>");

              if (categoryId !== "0") {
                // Fetch subcategories based on the selected category using AJAX
                $.ajax({
                  url: "getSubcategories.php",
                  type: "GET",
                  data: {
                    categoryId: categoryId
                  },
                  dataType: "json",
                  success: function(data) {
                    if (!data.error) {
                      // Populate the subcategory dropdown with fetched data
                      $.each(data, function(index, subcategory) {
                        $("#SubCategory").append("<option value='" + subcategory.ID + "'>" + subcategory.subCategory + "</option>");
                      });

                      // Enable the subcategory dropdown
                      $("#SubCategory").prop("disabled", false);
                    } else {
                      console.error("Error fetching subcategories: " + data.error);
                    }
                  },
                  error: function(xhr, status, error) {
                    console.error("AJAX error: " + error);
                  }
                });
              } else {
                // Disable the subcategory dropdown if no category is selected
                $("#SubCategory").prop("disabled", true);
              }
            });

            $("#printButton").click(function() {
              var selectedCategory = $("#Category").val();
              var selectedSubCategory = $("#SubCategory").val();
              var selectedBarangay = $("#barangayFilter").val();
              var capitalization = $("#capitalizationFilter").val();


              console.log("selectedCategory:", selectedCategory);
              console.log("selectedSubCategory:", selectedSubCategory);
              console.log("selectedBarangay:", selectedBarangay);
              console.log("capitalization:", capitalization);


              if (selectedCategory === "0" && !selectedBarangay && capitalization === "Select") {
                // Display sweet alert indicating that at least one filter needs to be selected
                Swal.fire("Select Filter", "Please select at least one filter before generating the report", "warning");
                return; // Stop further execution
              }

              // Send AJAX request to fetch data based on selected criteria
              $.ajax({
                url: "generate_report.php",
                type: "POST",
                data: {
                  category: selectedCategory,
                  subcategory: selectedSubCategory,
                  barangay: selectedBarangay,
                  capitalization: capitalization
                },
                dataType: "json",
                success: function(data) {
                  // Generate PDF using pdfmake
                  var docDefinition = {
                    content: [{
                        text: 'Business List',
                        style: 'header'
                      }, // Title

                      // Add space after the title
                      {
                        text: '\n'
                      },

                      // Business List table
                      {
                        table: {
                          headerRows: 1,
                          widths: ['auto', '*', '*', '*', '*'], // Adjust the width as needed
                          body: [
                            [{
                                text: 'No.',
                                style: 'tableHeader'
                              },
                              {
                                text: 'Business Name',
                                style: 'tableHeader'
                              },
                              {
                                text: 'Business Brgy',
                                style: 'tableHeader'
                              },
                              {
                                text: 'Capitalization',
                                style: 'tableHeader'
                              },
                              {
                                text: 'Category - Subcategory',
                                style: 'tableHeader'
                              },
                            ],
                            // Populate table rows with additional information and numbering
                            ...data.map((row, index) => [{
                                text: (index + 1).toString(),
                                alignment: 'center'
                              },
                              row.BusinessName || 'N/A',
                              row.BusinessBrgy || 'N/A',
                              row.capitalization || 'N/A',
                              (row.BusinessCategory + ' - ' + row.subCategory) || 'N/A'
                            ])
                          ]
                        },
                        alignment: 'center'
                      }
                    ],
                    styles: {
                      header: {
                        fontSize: 18,
                        bold: true,
                        alignment: 'center'
                      },
                      tableHeader: {
                        bold: true,
                        fontSize: 12,
                        color: 'black'
                      }
                    }
                  };

                  pdfMake.createPdf(docDefinition).download('output.pdf');
                },
                error: function(xhr, status, error) {
                  console.error("AJAX error: " + error);
                }
              });
            });
          });
        </script>

</body>

</html>