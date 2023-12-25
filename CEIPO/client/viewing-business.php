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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
      height: 650px;

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
                              <option selected value=0>Select</option>
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



                        <div class="col-sm-2">
                          <div class="form-floating">
                            <select class="form-select" id="SubCategory" aria-label="Floating label select example">
                              <option selected>Select</option>

                            </select>
                            <label for="floatingSelect">Works with selects</label>
                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-floating">
                            <select class="form-select" id="barangayFilter" aria-label="Floating label select example">
                              <option value="">Select a Barangays</option>
                              <option value="0">All</option>
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
                              <option>All</option>
                              <option value="low">Low</option>
                              <option value="medium">Medium</option>
                              <option value="high">High</option>
                            </select>
                            <label for="floatingSelect">Select Capitalization</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="d-flex">
                      <div class="p-1 flex-fill" style="overflow: hidden">
                        <div id="world-map-markers" style="height: 500; overflow: hidden">
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
        $.getJSON('boundary.geojson.json', function(data) {
          caloocanBoundary.addData(data);

          caloocanBoundary.setStyle(function(feature) {
            var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
            return {
              fillColor: randomColor,
              fillOpacity: 0.7,
              color: 'black',
              weight: 1
            };
          });

          caloocanBoundary.eachLayer(function(layer) {
            layer.bindPopup(layer.feature.properties.NAME_3);
          });

          map.fitBounds(caloocanBoundary.getBounds());
        });

        $('#Category').change(function() {
          var selectedCategory = $(this).val();


          localStorage.setItem('selectedCategory', selectedCategory);
          localStorage.setItem('selectedSubCategory', "Select");

          // Clear the options in the SubCategory dropdown
          $('#SubCategory').empty();
          $('#SubCategory').append('<option selected>Select</option>');

          if (selectedCategory !== 'Select') {
            // Fetch subcategories for the selected category using a POST request
            $.ajax({
              url: 'get_subcategories.php',
              type: 'POST', // Use POST request
              data: {
                catId: selectedCategory
              }, // Use 'catId' as the parameter name
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

                $('#SubCategory').trigger('change');
              },
              error: function() {
                // Handle AJAX errors
                alert('Error fetching subcategories.');
              }
            });
          }

          $('#barangayFilter').val("")

        });

        $('#barangayFilter').change(function() {
          var selectedBarangay = $(this).val();
          var selectedCategory = $('#Category').val();
          var selectedSubCategory = $('#SubCategory').val();
        
          $('#capitalizationFilter').val('Select');

          if (selectedCategory && selectedSubCategory && selectedBarangay) {
            updateMap(selectedCategory, selectedSubCategory, selectedBarangay);
          } else if (!selectedCategory && !selectedSubCategory && selectedBarangay) {
            updateMap(null, null, selectedBarangay, null);
          } else if (selectedCategory && selectedBarangay) {
            updateMap(selectedCategory, null, selectedBarangay);
          }


          if (selectedCategory == 0 && selectedSubCategory == "Select") {
            var Capitalization = $('#capitalizationFilter').val()
            // Call the updateMap_Brgy function with selectedBarangay as an argument
            updateMap_Brgy(selectedBarangay);
          }
        });


        $('#capitalizationFilter').change(function() {
          var selectedCapitalization = $(this).val();
          var selectedCategory = $('#Category').val();
          var selectedSubCategory = $('#SubCategory').val();
          var selectedBarangay = $('#barangayFilter').val();

          if (selectedCategory && selectedSubCategory && selectedBarangay && selectedCapitalization) {
            updateMap(selectedCategory, selectedSubCategory, selectedBarangay, selectedCapitalization);
          } else if (selectedCategory && selectedSubCategory && selectedCapitalization) {
            updateMap(selectedCategory, selectedSubCategory, null, selectedCapitalization);
          } else if (selectedCategory && selectedBarangay && selectedCapitalization) {
            updateMap(selectedCategory, null, selectedBarangay, selectedCapitalization);
          } else if (selectedBarangay && selectedCapitalization) {
            updateMap(null, null, selectedBarangay, selectedCapitalization);
          } else if (selectedCategory && selectedCapitalization) {
            updateMap(selectedCategory, null, null, selectedCapitalization);
          } else if (selectedCapitalization) {
            updateMap(null, null, null, selectedCapitalization);
          }


          
          if (selectedCategory == 0 && selectedSubCategory == "Select" && selectedBarangay !== "") {
            var Capitalization = $('#capitalizationFilter').val()
            // Call the updateMap_Brgy function with selectedBarangay as an argument
            updateMap_Brgy(selectedBarangay,Capitalization);
          }

          if (selectedCategory == 0 && selectedSubCategory == "Select" && selectedBarangay == "") {
            var Capitalization = $('#capitalizationFilter').val()
            // Call the updateMap_Brgy function with selectedBarangay as an argument
            updateMap_Capital(selectedBarangay,Capitalization);
          }


       
        });





        function updateMap(selectedCategory, selectedSubCategory, selectedBarangay, selectedCapitalization) {
          // Clear existing markers on the map
          map.eachLayer(function(layer) {
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
              barangays: selectedBarangay,
              capitalization: selectedCapitalization,
            },
            dataType: "json",
            success: function(data) {
              // Loop through the data and add markers to the map
              for (let i = 0; i < data.length; i++) {
                const business = data[i];
                const lat = parseFloat(business.bus_lat);
                const lng = parseFloat(business.bus_long);

                // Create a marker and add it to the map
                const marker = L.marker([lat, lng]).addTo(map);

                // Add a popup to the marker with the BusinessName
                marker.bindPopup(business.BusinessName);

                // Make the marker show the modal on click
                marker.on("click", function() {
                  // Display modal with business overview and button
                  showModal(business);
                });
              }
            },
          });
        }


        function updateMap_Brgy(selectedBarangay, selectedCapitalization) {
          // Clear existing markers on the map
          map.eachLayer(function(layer) {
            if (layer instanceof L.Marker) {
              map.removeLayer(layer);
            }
          });

          // Make an AJAX request to your PHP script
          $.ajax({
            type: "POST",
            url: "Fetch_category_brgy.php",
            data: {
              barangays: selectedBarangay,
              capitalization: selectedCapitalization,
            },
            dataType: "json",
            success: function(data) {
              // Loop through the data and add markers to the map
              for (let i = 0; i < data.length; i++) {
                const business = data[i];
                const lat = parseFloat(business.bus_lat);
                const lng = parseFloat(business.bus_long);

                // Create a marker and add it to the map
                const marker = L.marker([lat, lng]).addTo(map);

                // Add a popup to the marker with the BusinessName
                marker.bindPopup(business.BusinessName);

                // Make the marker show the modal on click
                marker.on("click", function() {
                  // Display modal with business overview and button
                  showModal(business);
                });
              }
            },
          });
        }

        function updateMap_Capital(selectedBarangay, selectedCapitalization) {
          // Clear existing markers on the map
          map.eachLayer(function(layer) {
            if (layer instanceof L.Marker) {
              map.removeLayer(layer);
            }
          });

          // Make an AJAX request to your PHP script
          $.ajax({
            type: "POST",
            url: "Fetch_category_capital.php",
            data: {
              barangays: selectedBarangay,
              capitalization: selectedCapitalization,
            },
            dataType: "json",
            success: function(data) {
              // Loop through the data and add markers to the map
              for (let i = 0; i < data.length; i++) {
                const business = data[i];
                const lat = parseFloat(business.bus_lat);
                const lng = parseFloat(business.bus_long);

                // Create a marker and add it to the map
                const marker = L.marker([lat, lng]).addTo(map);

                // Add a popup to the marker with the BusinessName
                marker.bindPopup(business.BusinessName);

                // Make the marker show the modal on click
                marker.on("click", function() {
                  // Display modal with business overview and button
                  showModal(business);
                });
              }
            },
          });
        }

        // Function to show a modal with business overview and button
        function showModal(business) {

          // Create a modal HTML content with business overview and button
          const modalContent = `
    <div class="modal fade" id="businessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">${business.BusinessName}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
            </button>
          </div>
          <div class="modal-body">
            <div class="d-flex justify-content-center">
              <img src="../../img/logo/${business.Businesslogo}" alt="user-avatar" class="img-circle img-fluid" width="150" height="150">
            </div>
            <div class="row">
              <strong style="font-size: 20px;">Overview</strong>
              <p class="text-muted" style="text-align: justify; padding: 5px; font-size: 16px;">
                ${business.BusinessDescrip}
              </p>
              <hr>
            </div>
            <div class="row">
              <div class="col-6" style="text-align: left;">
                <strong><i class="bx bx-map"></i> Address</strong>
                <p class="text-muted" style="padding: 5px;">
                  <span class="tag tag-danger">${business.BusinessAddress}</span>
                </p>
              </div>
              <div class="col-6" style="text-align: left;">
              <div class="social-media-links">
              ${business.bus_fb !== undefined && business.bus_fb !== null && business.bus_fb !== '' ? `
                <i class="bx bxl-facebook" style="font-size: 20px; color: #0C8AEF;"></i>
                <a href="${business.bus_fb}" class="d-inline">${business.BusinessName}</a><br>` : ''}
              ${business.bus_twt !== undefined && business.bus_twt !== null && business.bus_twt !== '' ? `
                <i class="bx bxl-twitter" style="font-size: 20px; color: #1C9BF0;"></i>
                <a href="${business.bus_twt}" class="d-inline">${business.BusinessName}</a><br>` : ''}
              ${business.bus_ig !== undefined && business.bus_ig !== null && business.bus_ig !== '' ? `
                <i class="bx bxl-instagram" style="font-size: 20px; color: #E13530;"></i>
                <a href="${business.bus_ig}" class="d-inline">${business.BusinessName}</a><br>` : ''}
              ${business.bus_ig === undefined && business.bus_twt === undefined && business.bus_fb === undefined ? `
                <i class="" style="font-size: 20px; color: #E13530;">Social Media Not Available </i>` : ''}
            </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-6" style="text-align: left;">
                <strong><i class="bx bx-phone"></i> Contact Number</strong>
                <p class="text-muted">
                  <span class="tag tag-danger" style="padding: 5px;">${business.BusinessNumber}</span>
                </p>
              </div>
              <div class="col-6" style="text-align: left;">
                <strong><i class="bx bxs-star-half"></i> Overall Ratings</strong>
                <p class="text-muted">
                  <span class="tag tag-danger" style="padding: 5px;"></span>
                </p>
              </div>
              <hr>
              <div class="col-6" style="text-align: left;">
                <strong><i class="bx bxs-money"></i>Capitalization: </strong>
                <p class="text-muted">
                  <span class="tag tag-danger" style="padding: 5px;">₱ ${business.capitalization}</span>
                </p>
              </div>

              <div class="col-6" style="text-align: left;">
                <strong><i class="bx bxs-money"></i>Barangay</strong>
                <p class="text-muted">
                  <span class="tag tag-danger" style="padding: 5px;">${business.BusinessBrgy}</span>
                </p>
              </div>


              <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="viewDetails(${business.bus_id})">View More</button>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  `;

          // Append the modal content to the body
          $('body').append(modalContent);

          // Show the modal
          $('#businessModal').modal('show');

          // Remove the modal from the DOM after it is hidden
          $('#businessModal').on('hidden.bs.modal', function() {
            $(this).remove();
          });
        }


        //viewDetails in button
        function viewDetails(businessID) {
          // Redirect to details.php with businessID
          window.location.href = `http://localhost/buds/details.php?ID=${businessID}`;
        }


        if (localStorage.getItem('reloadPage') === 'true') {
          // Clear the flag to prevent continuous reloading
          localStorage.removeItem('reloadPage');
          // Reload the page
          location.reload();
        }

        function viewDetails(businessID) {
          // Set the flag to indicate a reload is needed
          localStorage.setItem('reloadPage', 'true');

          // Redirect to details.php with businessID
          window.location.href = `http://localhost/buds/details.php?ID=${businessID}`;
        }


        $('#SubCategory').change(function() {
          var selectedCategory = $('#Category').val(); // Get the selected category
          var selectedSubCategory = $(this).val();

          $('#barangayFilter').val("");
          $('#capitalizationFilter').val('Select');


          // Store selected values in localStorage
          localStorage.setItem('selectedCategory', selectedCategory);
          localStorage.setItem('selectedSubCategory', selectedSubCategory);

          if (selectedCategory && selectedSubCategory !== 'Select') {
            // If both category and subcategory are selected (and subcategory is not 'Select'), update the map or perform additional actions
            updateMap(selectedCategory, selectedSubCategory);
          } else {
            updateMap(selectedCategory, null);
          }
        });

        // Check if there are stored values in localStorage
        var storedCategory = localStorage.getItem('selectedCategory');
        var storedSubCategory = localStorage.getItem('selectedSubCategory');

        // Set the dropdown values based on the stored values
        if (storedCategory) {
          $('#Category').val(storedCategory);
        }

        // Trigger the change event for the Category dropdown to populate the SubCategory dropdown
        $('#Category').trigger('change');
      </script>


</body>

</html>