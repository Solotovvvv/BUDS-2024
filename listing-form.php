<?php
require_once './includes/config.php';
session_start();

if (empty($_SESSION['ownerId'])) {
  header('Location: ../index.php'); // Redirect to the login page if ownerId is not set
  exit;
}

if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM `owner_list` WHERE email = '$email'";
  $row = $conn->query($sql);
  $data = $row->fetch_assoc();
}

$ownerId = $_SESSION['ownerId'];

//Category and sub-Category
$Category = "";
$sql = "SELECT * FROM category_list";
if ($rs = $conn->query($sql)) {
  if ($rs->num_rows > 0) { // record checking
    while ($row = $rs->fetch_assoc()) {
      $Category .= '<option value =' . $row['ID'] . '>' . $row['category'] . '</option>';
    }
  }
} else {
  die("Error:" . $conn->error);
}
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
  <title>Add Listing</title>

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
  <link rel="stylesheet" href="css/richtext.min.css" type="text/css">
  <link rel="stylesheet" href="css/image-uploader.min.css" type="text/css">
  <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="css/style1.css" type="text/css">
  <link rel="stylesheet" href="css/templatemo-plot-listing1.css" type="text/css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

  <style>
    #map {
      display: flex;
      margin: auto;
      width: 700px;
      height: 300px;
    }

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
                        <li>
                          <h2><?php echo $_SESSION['lname'] . ' , ' . $_SESSION['fname'] ?></h2>
                        </li>
                        <li><a href="user.php">MY PROFILE</a></li>
                        <li><a href="manage.php">MANAGE BUSINESS</a></li>
                        <li><a href="listing-form.php">ADD BUSINESS</a></li>
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
  <section class="property-section latest-property-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-title">
            <h4>ADD LISTING FORM</h4>
          </div>
        </div>
        <div class="col-lg-12">
          <br>
          <div class="property-submit-form">
            <form method="post" enctype="multipart/form-data">
              <div class="pf-title">
                <h4>Business Name</h4>
                <input name="BusinessName" id="busName" type="text" placeholder="Enter Business Name">
              </div>
              <h4>Business Logo</h4>
              <div class="custom-file">
                <input class="custom-file-input" name="businessLogo" id="businessLogo" type="file" >
                <label class="custom-file-label" for="BusinessLogo">Choose files...</label>
              </div>
              <div class="pf-title">
                <br>
                <h4>Business Email</h4>
                <input name="BusinessEmail" id="BusinessEmail" type="email" placeholder="Enter Business Email">
              </div>
              <div class="pf-title">
                <h4>Business Branch</h4>
                <input name="BusinessBranch" id="BusinessBranch" type="text" placeholder="Enter Business Branch">
              </div>
              <div class="pf-title">
                <h4>Business Year Established</h4>
                <input name="BusinessEstablish" id="BusinessEstablish" type="date" placeholder="Enter Business Year Establish"> <br>
                <br>
                <input id="BusinessCapital" type="text" placeholder="Enter the Estimated Capital.">
              </div>
              <div class="pf-summernote">
                <h4>Business Description</h4>
                <input name="BusinessDescrip" id="BusinessDescrip" type="text" placeholder="Enter your Business Description">
              </div>
              <div class="pf-title">
                <h4>Business Contact Number</h4>
                <input name="BusinessNumber" id="BusinessNumber" type="tel" placeholder="Enter Business Contact Number">
              </div>
              <div class="pf-location">
                <h4>Business Office Hour</h4>
                <div class="location-inputs">
                  <h6>Opening & Closing Time:</h6>
                  <br>
                  <input name="BusinessOpenHour" id="BusinessOpenHour" placeholder="Opening Time" type="time">
                  <input name="BusinessCloseHour" id="BusinessCloseHour" type="time" placeholder="Closing Time">
                </div>
              </div>
              <div class="pf-location">
                <h4>Business Location</h4>
                <div class="pf-title">
                  <h6>ADDRESS: </h6>
                  <br>
                  <input name="BusinessAddress" id="BusinessAddress" type="text" placeholder="Enter your Complete Address - [Unit No] [Building Name] [Street No] [Street Name] [City]."><br>
                  <br>
                  <input type="text" id="BusinessZone" placeholder="Enter Zone"> <br>
                  <br>
                  <input type="text" id="BusinessDistrict" placeholder="Enter District"> <br>
                  <br>
                  <select id="filter" name="BusinessBrgy">
                    <option value="" disabled selected>Select a Barangay</option>
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
                </div>
              </div>
              <div class="pf-map">
                <h4>Map Location</h4>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="map-inputs">
                      <h4>Directions:</h4>
                      <p>First,
                        select the barangay. Then, pin the exact location of the business by simply dragging the pin on the map below to the desired location, ensuring it accurately reflects the business's position</p>
                      <input id="lat" type="hidden" name="Latitude" placeholder="Latitude" readonly>
                      <input id="long" type="hidden" name="Longitude" placeholder="Longitude" readonly>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="g-map">
                      <div id="map"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pf-location">
                <h4>Business Websites Links</h4>
                <h6>Note: Please input the link of your social media.</h6>
                <div class="pf-title">
                  <div class="location-inputs">
                    <br><input name="BusinessFb" id="BusinessFb" type="text" placeholder="Facebook">
                    <input name="BusinessIg" id="BusinessIg" type="text" placeholder="Instagram">
                    <input name="BusinessTiktok" id="BusinessTiktok" type="text" placeholder="Tiktok">
                  </div>
                </div>
              </div>
              <div class="pf-title">
                <h4>Category</h4>
                <select id="category" name="BusinessCategory" onchange="get_subcategory()">
                  <option value="">Select Category</option>
                  <?php echo $Category; ?>
                </select>
              </div>
              <div class="pf-title">
                <h4>Sub Category</h4>
                <div id="dispSubClass">
                  <select id="subcategory" name="BusinessSubCategory">
                    <option value="">Select Sub Category</option>
                  </select>
                </div>
              </div>
              <div class="property-details-inputs">
                <h4>Upload Scan Picture of Barangay Clearance</h4>
                <div class="custom-file">
                  <input class="custom-file-input" name="uploadBrgyClearance[]" id="uploadBrgyClearance" type="file" multiple>
                  <label class="custom-file-label" for="uploadBrgyClearance">Choose files...</label>
                </div>
              </div>
              <div class="property-details-inputs">
                <br>
                <h4>Upload Scan Picture of DTI Permit</h4>
                <div class="custom-file">
                  <input class="custom-file-input" name="uploadDTIPermit[]" id="uploadDTIPermit" type="file" multiple>
                  <label class="custom-file-label" for="uploadDTIPermit">Choose files...</label>
                </div>
              </div>
              <div class="property-details-inputs">
                <br>
                <h4>Upload Scan Picture of Sanitary Document</h4>
                <div class="custom-file">
                  <input class="custom-file-input" name="uploadSanitaryPermit[]" id="uploadSanitaryPermit" type="file" multiple>
                  <label class="custom-file-label" for="uploadSanitaryPermit">Choose files...</label>
                </div>
              </div>
              <div class="property-details-inputs">
                <br>
                <h4>Upload Scan Picture of Cedula</h4>
                <div class="custom-file">
                  <input class="custom-file-input" name="uploadCedula[]" id="uploadCedula" type="file" multiple>
                  <label class="custom-file-label" for="uploadCedula">Choose files...</label>
                </div>
              </div>
              <div class="property-details-inputs">
                <br>
                <h4>Upload Scan Picture of Business Permit</h4>
                <div class="custom-file">
                  <input class="custom-file-input" name="uploadBusinessPermit[]" id="uploadBusinessPermit" type="file" multiple>
                  <label class="custom-file-label" for="uploadBusinessPermit">Choose files...</label>
                </div>
              </div>
              <br>
              <button name="SubmitProperty" type="button" onclick="addBusiness()" class="site-btn">Submit Property</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- Property Submit Section End -->

  <!-- Footer Section Begin -->
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

  <script>
    $(document).ready(function() {
      $('#filter').on('click', function() {
        $(this).attr('size', 5); // Set the size of the dropdown to 5 options
      });

      $('#filter').on('focusout', function() {
        $(this).removeAttr('size'); // Remove the size attribute when focus is lost
      });

      fetchData();
    });

    function get_subcategory() {
      var category = $('#category').val();
      $.ajax({
        url: 'dependentcat.php',
        method: 'POST',
        data: {
          category: category
        },
        success: function(data) {
          console.log("AJAX success:", data);
          $("#dispSubClass").html(data);
        }
      });
    }

    var map = L.map('map').setView([14.6577, 120.9842], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);

    var caloocanBoundary = L.geoJSON().addTo(map);

    // Load the barangay GeoJSON or coordinates file
    $.getJSON('boundary.geojson1.json', function(data) {
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
        layer.bindPopup("Barangay " + layer.feature.properties.NAME_3);
      });

      var draggableMarker = L.marker([14.6577, 120.9842], {
        draggable: true
      }).addTo(map);
      draggableMarker.on('dragend', function(event) {
        var marker = event.target;
        var position = marker.getLatLng();
        $('#lat').val(position.lat.toFixed(6));
        $('#long').val(position.lng.toFixed(6));
      });

      map.fitBounds(caloocanBoundary.getBounds());

      $('#filter').change(function() {
        var selectedBarangay = $(this).val();

        if (selectedBarangay) {
          caloocanBoundary.eachLayer(function(layer) {
            if (layer.feature.properties.NAME_3 === selectedBarangay) {
              console.log("match layer found");
              var center = layer.getBounds().getCenter();
              draggableMarker.setLatLng(center);
              $('#lat').val(center.lat.toFixed(6));
              $('#long').val(center.lng.toFixed(6));
              map.setView(center, 20);
              draggableMarker.bindPopup("Drag and pin this to your location").openPopup();
              return;
            }
          });
        } else {
          map.fitBounds(caloocanBoundary.getBounds());
        }
      });
    });

    function addBusiness() {
  // Collect form values
  var businessName = $('#busName').val();
  var businessEmail = $('#BusinessEmail').val();
  var businessBranch = $('#BusinessBranch').val();
  var businessEstablish = $('#BusinessEstablish').val();
  var businessDescrip = $('#BusinessDescrip').val();
  var businessNumber = $('#BusinessNumber').val();
  var businessOpenHour = $('#BusinessOpenHour').val();
  var businessCloseHour = $('#BusinessCloseHour').val();
  var businessAddress = $('#BusinessAddress').val();
  var businessBarangay = $('#filter').val();
  var businessLat = $('#lat').val();
  var businessLong = $('#long').val();
  var businessFb = $('#BusinessFb').val();
  var businessIg = $('#BusinessIg').val();
  var businessCategory = $('#category').val();
  var subCategory = $('#subcategory').val();
  var businessZone = $('#BusinessZone').val();
  var businessDistrict = $('#BusinessDistrict').val();
  var businessCapital = $('#BusinessCapital').val();
  var businessTiktok = $('#BusinessTiktok').val();

  // Check if any required fields are empty
  if (
    !businessName ||
    !businessEmail ||
    !businessBranch ||
    !businessEstablish ||
    !businessDescrip ||
    !businessNumber ||
    !businessOpenHour ||
    !businessCloseHour ||
    !businessAddress ||
    !businessBarangay ||
    !businessLat ||
    !businessLong ||
    !businessCategory ||
    !subCategory ||
    !businessZone ||
    !businessDistrict ||
    !businessCapital
  ) {
    Swal.fire({
      title: 'Warning',
      text: 'Please fill out all required fields except the requirements.',
      icon: 'warning',
      customClass: {
        confirmButton: 'swal-confirm-button',
      },
      showCancelButton: false,
    });
    return;
  }

  // Construct payload object
  var payload = {
    businessName: businessName,
    businessEmail: businessEmail,
    businessBranch: businessBranch,
    businessEstablish: businessEstablish,
    businessDescrip: businessDescrip,
    businessNumber: businessNumber,
    businessOpenHour: businessOpenHour,
    businessCloseHour: businessCloseHour,
    businessAddress: businessAddress,
    businessBarangay: businessBarangay,
    businessLat: businessLat,
    businessLong: businessLong,
    businessFb: businessFb,
    businessIg: businessIg,
    businessCategory: businessCategory,
    subCategory: subCategory,
    businessZone: businessZone,
    businessDistrict: businessDistrict,
    businessCapital: businessCapital,
    businessTiktok: businessTiktok
  };

  var formData = new FormData();
  formData.append('payload', JSON.stringify(payload));
  formData.append('setFunction', 'addBusiness');

  // Function to append files to FormData
  function appendFiles(inputElement, formData, fieldName) {
    if (inputElement && inputElement.files.length > 0) {
      var files = inputElement.files;
      for (var i = 0; i < files.length; i++) {
        formData.append(fieldName + '[]', files[i]);
      }
    } else if (inputElement) {
      formData.append(fieldName, inputElement.files[0]);
    }
  }

  // Select input elements
  var businessLogoInput = document.querySelector("input[name='businessLogo']");
  // var businessLogoInput = $("input[name='BusinessLogo']")[0]; // Assuming it's the first input element
  // var businessLogoFile = businessLogoInput.files[0];

  var brgyClearanceInput = document.querySelector("input[name='uploadBrgyClearance[]']");
  var dtiPermitInput = document.querySelector("input[name='uploadDTIPermit[]']");
  var sanitaryPermitInput = document.querySelector("input[name='uploadSanitaryPermit[]']");
  var cedulaInput = document.querySelector("input[name='uploadCedula[]']");
  var businessPermitInput = document.querySelector("input[name='uploadBusinessPermit[]']");

  // Append files to FormData
  appendFiles(businessLogoInput, formData, 'businessLogo');
  appendFiles(brgyClearanceInput, formData, 'brgyClearance');
  appendFiles(dtiPermitInput, formData, 'DTIPermit');
  appendFiles(sanitaryPermitInput, formData, 'sanitaryPermit');
  appendFiles(cedulaInput, formData, 'cedula');
  appendFiles(businessPermitInput, formData, 'businessPermit');

  // Send formData via AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "controllers/business.php", true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      console.log("Server response:", xhr.responseText);
      if (xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        Swal.fire(data.title, data.message, data.icon);
        setTimeout(function () {
          window.location.reload(); // Reload the page after successful submission
        }, 2000);
      } else {
        console.log("Error:", xhr.statusText);
      }
    }
  };

  xhr.send(formData);
}


    function fetchData() {
      $.ajax({
        url: 'fetchUserData.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          if (data.photo) {
            $('#user-profile-img').attr('src', data.photo);
          } else {
            $('#user-profile-img').attr('src', 'img/testimonial-author/unknown.jpg');
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    $(document).ready(function() {
      $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
      fetchData();
    });
  </script>
</body>

</html>
