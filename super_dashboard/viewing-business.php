<?php
session_start();
if(empty( $_SESSION['admin_user'] )){
header('Location: ../index.php'); // Redirect to the login page if ownerId is not set
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="plugins/assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Business Dashboard</title>
  <meta name="description" content="">
  <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/assets/vendor/fonts/boxicons.css">
  <link rel="stylesheet" href="plugins/assets/vendor/css/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="plugins/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="plugins/assets/css/demo.css">
  <link rel="stylesheet" href="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="icon" type="image/x-icon" href="plugins/assets/img/favicon/favicon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <style>
    #map {
      display: flex;
      margin: auto;
      width: 1000px;
      height: 500px;

    }
  </style>
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
                </a>

                <ul class="menu-sub list-inline">
                <li class="list-inline-block menu-item">
                <a href="approval-registration.php" class="menu-link">
                  <div data-i18n="Without navbar">Approval of Registration</div>
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
                  <li class="menu-item">
                    <a href="business-category.php" class="menu-link">
                      <div data-i18n="Without navbar">Buisness Category </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="menu-item active">
                <a href="viewing-business.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-search"></i>
                  Searching Business
                </a>
              </li>

              <li class="menu-item">
                <a href="business-profile.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-user"></i>
                  <div data-i18n="Analytics">Profile of Business</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="printing-reports.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-report"></i>
                  <div data-i18n="Analytics">Reports</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="posting-activities.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-edit"></i>
                  <div data-i18n="Analytics">Posting Activities/Events</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="add-account.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-edit"></i>
                  <div data-i18n="Analytics">Add Account</div>
                </a>
              </li>
            </ul>
        </aside>
      <div class="layout-page">
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
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
                            <img src="plugins/assets/img/avatars/buds-with-text.png" alt
                              class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                        <span class="fw-semibold d-block">Super Admin</span>
                        <small class="text-muted">Super Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../logout.php">
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

    <div class="content-wrapper">
        <section class="content">
          <div class="row justify-content-center">
            <div class="col-lg-10 align-center">
              <div class="card">
                <div class="card-header">
                  <div class="col-lg-12">
                    <div class="row justify-content-center">
                      <h3>Searching and Viewing Business</h3>

                      <div class="col-sm-2">
    <div class="form-floating">
        <select class="form-select" id="Category" name="category" aria-label="Floating label select example">
            <option selected disabled>Select</option>
            <?php
            include '../includes/config.php'; // Include your database connection code
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



                      <div class="col-sm-2">
                        <div class="form-floating">
                          <select class="form-select" id="SubCategory" aria-label="Floating label select example">
                            <option selected>Select</option>
                            <option value="1">One</option>
                          </select>
                          <label for="floatingSelect">Works with selects</label>
                        </div>
                      </div>



                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="d-flex">
                    <div class="p-1 flex-fill" style="overflow: hidden">
                      <div id="world-map-markers" style="height: 425px; overflow: hidden">
                        <div id="map"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>



    <script src="plugins/assets/vendor/libs/jquery/jquery.js"></script>
<script src="plugins/assets/vendor/js/bootstrap.js"></script>
<script src="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="plugins/assets/vendor/js/menu.js"></script>
<script src="plugins/assets/js/main.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  var map = L.map('map').setView([14.6577, 120.9842], 13);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
  }).addTo(map);

  var caloocanBoundary = L.geoJSON().addTo(map);
  $.getJSON('boundary.geojson.json', function (data) {
    caloocanBoundary.addData(data);

    caloocanBoundary.setStyle(function (feature) {
      var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
      return {
        fillColor: randomColor,
        fillOpacity: 0.7,
        color: 'black',
        weight: 1
      };
    });

    caloocanBoundary.eachLayer(function (layer) {
      layer.bindPopup(layer.feature.properties.NAME_3);
    });

    map.fitBounds(caloocanBoundary.getBounds());
  });

  $('#Category').change(function() {
    var selectedCategory = $(this).val();

    // Clear the options in the SubCategory dropdown
    $('#SubCategory').empty();
    $('#SubCategory').append('<option selected>Select</option>');

    if (selectedCategory !== 'Select') {
      // Fetch subcategories for the selected category using a POST request
      $.ajax({
        url: 'get_subcategories.php',
        type: 'POST', // Use POST request
        data: { catId: selectedCategory }, // Use 'catId' as the parameter name
        dataType: 'json',
        success: function(data) {
          if (data.error) {
            // Handle errors
            alert(data.error);
          } else {
            // Populate the SubCategory dropdown with fetched subcategories
            $.each(data, function(index, subcategory) {
              $('#SubCategory').append('<option value="' + subcategory.ID + '">' + subcategory.subCategory + '</option>');
            });
          }
        },
        error: function() {
          // Handle AJAX errors
          alert('Error fetching subcategories.');
        }
      });
    }
  });

  // Function to update the map based on selected category and subcategory
  function updateMap(selectedCategory, selectedSubCategory) {
    // Clear existing markers on the map
    map.eachLayer(function (layer) {
      if (layer instanceof L.Marker) {
        map.removeLayer(layer);
      }
    });

    // Make an AJAX request to your PHP script
    $.ajax({
      type: "POST",
      url: "Fetch_category.php",
      data: {
        category: selectedCategory,
        subcategory: selectedSubCategory,
      },
      dataType: "json",
      success: function (data) {

        // Loop through the data and add markers to the map
        for (let i = 0; i < data.length; i++) {
          const business = data[i];
          const lat = parseFloat(business.bus_lat);
          const lng = parseFloat(business.bus_long);

          // Create a marker and add it to the map
          const marker = L.marker([lat, lng]).addTo(map);

          // Add a popup to the marker with the BusinessName
          marker.bindPopup(business.BusinessName);

          // Make the marker show the popup on hover
          marker.on("mouseover", function () {
            marker.openPopup();
          });

          // Close the popup on mouseout (optional)
          marker.on("mouseout", function () {
            marker.closePopup();
          });
        }
      },
    });
  }

  // Event listener for category dropdown change
  $("#Category").change(function () {
    const selectedCategory = $(this).val();
    const selectedSubCategory = $("#SubCategory").val(); // Get the selected subcategory

    if (selectedCategory) {
      if (selectedSubCategory === 'Select') {
        // If only the category is selected, update the map with category only
        updateMap(selectedCategory, null);
      } else {
        // If both category and subcategory are selected, update the map
        updateMap(selectedCategory, selectedSubCategory);
      }
    }
  });

  // Event listener for subcategory dropdown change
  $("#SubCategory").change(function () {
    const selectedCategory = $("#Category").val(); // Get the selected category
    const selectedSubCategory = $(this).val();

    if (selectedCategory && selectedSubCategory !== 'Select') {
      // If both category and subcategory are selected (and subcategory is not 'Select'), update the map
      updateMap(selectedCategory, selectedSubCategory);
    }else{
      updateMap(selectedCategory, null);
    }
  });

</script>


</body>
</html>
