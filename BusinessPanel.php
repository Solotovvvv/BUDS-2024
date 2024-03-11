<?php
session_start();
require_once './includes/config.php';

if (empty($_SESSION['ownerId'])) {
  header('Location: index.php');
}

$bus_id = $_GET['a'];
$_SESSION['bus_id'] = $bus_id;


$sql = "SELECT * FROM business_list AS bl 
 INNER JOIN business_links AS bll ON bl.bus_id = bll.bus_id
 INNER JOIN business_location AS bloc ON bl.bus_id = bloc.bus_id
 WHERE 
 bl.bus_id = :id";

$pdo = Database::connection();
$stmt1 = $pdo->prepare($sql);
$stmt1->bindParam(':id', $bus_id, PDO::PARAM_STR);
$stmt1->execute();
$datas = $stmt1->fetchAll();

foreach ($datas as $data) {
  $logo = $data['Businesslogo'];
  $bus_name = $data['BusinessName'];
  $number = $data['BusinessNumber'];
  $address = $data['BusinessAddress'];
  $email = $data['BusinessEmail'];
  $establish = $data['BusinessEstablish'];
  $openHour = $data['BusinessOpenHour'];
  $closeHour = $data['BusinessCloseHour'];
  $branch = $data['BusinessBranch'];
  $fb = $data['bus_fb'];
  $ig = $data['bus_ig'];
  $status = $data['BusinessStatus'];
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="plugins/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Business Dashboard</title>
  <meta name="description" content="">

  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="plugins/assets/vendor/fonts/boxicons.css">
  <link rel="stylesheet" href="plugins/assets/vendor/css/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="plugins/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="plugins/assets/css/demo.css">
  <link rel="stylesheet" href="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <script src="plugins/assets/vendor/js/helpers.js"></script>
  <script src="plugins/assets/js/config.js"></script>
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

          <!-- <li class="menu-item">
            <a href="<?php echo "bulletin.php?a=" . $bus_id ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-pin"></i>
              <div data-i18n="Analytics">Bulletin Board</div>
            </a>
          </li> -->

          <li class="menu-item active">
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
                  <h3 class="card-header"><strong>Business Details</strong></h3>
                  <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                      <img src="<?php echo "img/logo/" . $logo ?>" alt="user-avatar" class="d-block rounded-circle" height="100" width="100" id="uploadedAvatar" />
                      <div class="button-wrapper">
                        <form id="formAccountSettings" method="POST" enctype="multipart/form-data">
                          <?php //if ($status == 4 || $status == 1) { 
                          ?>
                          <!-- <label for="upload" class="btn btn-success me-2 mb-4" tabindex="0">
                              <span class="d-none d-sm-block">Upload new photo</span>
                              <i class="bx bx-upload d-block d-sm-none"></i>
                              <input type="file" id="upload" name="bus_logo" class="account-file-input" hidden accept="image/png, image/jpeg" disabled />
                            </label> -->
                          <?php //} else { 
                          ?>
                          <label for="upload" class="btn btn-success me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="bus_logo" class="account-file-input" hidden accept="image/png, image/jpeg" />
                          </label>
                          <?php //} 
                          ?>
                          <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                          <i class="bx bx-reset d-block d-sm-none"></i>
                           <span class="d-none d-sm-block">Reset</span> -->
                          <!-- </button>  -->
                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                      </div>
                    </div>
                  </div>
                  <hr class="my-0" />
                  <div class="card-body">
                    <?php if ($status == 4 || $status == 1) { ?>
                      <div class="row">
                        <div class="mb-3 col-md-12">
                          <label for="businessname" class="form-label">Buisness Name</label>
                          <input class="form-control" type="text" id="businessName" name="BuisnessName" value="<?php echo $bus_name ?>" placeholder="Business Name" disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="contactnumber" class="form-label">Contact Number</label>
                          <input class="form-control" type="number" id="contactNumber" name="contactNumber" value="<?php echo $number ?>" placeholder="Contact Number" disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>" placeholder="Address" disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="email">email</label>
                          <input type="email" id="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Email" disabled />
                        </div>
                        <!-- <div class="mb-3 col-md-6">
                          <label class="form-label" for="country">Line of Buisness</label>
                          <select id="country" class="select2 form-select">
                            <option value="">Select </option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                          </select>
                        </div> -->
                        <div class="mb-3 col-md-6">
                          <label for="date" class="form-label">Year Established</label>
                          <input class="form-control" type="date" id="yearEstablished" name="yearEstablished" value="<?php echo $establish ?>" placeholder="Year Established" disabled />
                        </div>
                        <div class="mb-3 col-md-3">
                          <label for="time" class="form-label">Opening Hours</label>
                          <input class="form-control" type="time" id="Opening" value="<?php echo $openHour ?>" name="opening" disabled />
                        </div>
                        <div class="mb-3 col-md-3">
                          <label for="time" class="form-label">Closing Hours</label>
                          <input class="form-control" type="time" id="Closing" value="<?php echo $closeHour ?>" name="closing" disabled />
                        </div>
                        <div class="mb-3 col-md-12">
                          <label class="form-label" for="Branches">Branches</label>
                          <input type="text" id="branch" name="branch" class="form-control" value="<?php echo $branch ?>" placeholder="Branches" disabled />
                        </div>
                        <!-- <div class="mb-3 col-md-3">
                          <label for="address" class="form-label">Website</label>
                          <input type="url" class="form-control" id="link" name="wLink" placeholder="www.example.com" />
                        </div> -->
                        <div class="mb-3 col-md-3">
                          <label for="state" class="form-label">Facebook</label>
                          <input class="form-control" type="text" id="fb" name="facebook" value="<?php echo $fb ?>" placeholder="www.facebook.com/example" disabled />
                        </div>
                        <div class="mb-3 col-md-3">
                          <label for="zipCode" class="form-label">Instagram</label>
                          <input type="url" class="form-control" id="ig" name="instagram" value="<?php echo $ig ?>" placeholder="www.instagram.com/example" disabled />
                        </div>
                        <!-- <div class="mb-3 col-md-3">
                          <label for="zipCode" class="form-label">Twitter</label>
                          <input type="url" class="form-control" id="ig" name="instagram" placeholder="www.instagram.com/example" />
                        </div> -->
                      </div>
                      <div class="mt-2">
                        <button disabled type="button" class="btn btn-success me-2" onclick="editBusiness()">Save changes</button>
                        <!-- <button type="reset" class="btn btn-outline-secondary">Cancel</button> -->
                      </div>
                      </form>
                    <?php } else { ?>
                      <div class="row">
                        <div class="mb-3 col-md-12">
                          <label for="businessname" class="form-label">Buisness Name</label>
                          <input class="form-control" type="text" id="businessName" name="BuisnessName" value="<?php echo $bus_name ?>" placeholder="Business Name" />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="contactnumber" class="form-label">Contact Number</label>
                          <input class="form-control" type="number" id="contactNumber" name="contactNumber" value="<?php echo $number ?>" placeholder="Contact Number" />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>" placeholder="Address" />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="email">email</label>
                          <input type="email" id="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Email" />
                        </div>
                        <!-- <div class="mb-3 col-md-6">
                          <label class="form-label" for="country">Line of Buisness</label>
                          <select id="country" class="select2 form-select">
                            <option value="">Select </option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                          </select>
                        </div> -->
                        <div class="mb-3 col-md-6">
                          <label for="date" class="form-label">Year Established</label>
                          <input class="form-control" type="date" id="yearEstablished" name="yearEstablished" value="<?php echo $establish ?>" placeholder="Year Established" />
                        </div>
                        <div class="mb-3 col-md-3">
                          <label for="time" class="form-label">Opening Hours</label>
                          <input class="form-control" type="time" id="Opening" value="<?php echo $openHour ?>" name="opening" />
                        </div>
                        <div class="mb-3 col-md-3">
                          <label for="time" class="form-label">Closing Hours</label>
                          <input class="form-control" type="time" id="Closing" value="<?php echo $closeHour ?>" name="closing" />
                        </div>
                        <div class="mb-3 col-md-12">
                          <label class="form-label" for="Branches">Branches</label>
                          <input type="text" id="branch" name="branch" class="form-control" value="<?php echo $branch ?>" placeholder="Branches" />
                        </div>
                        <!-- <div class="mb-3 col-md-3">
                          <label for="address" class="form-label">Website</label>
                          <input type="url" class="form-control" id="link" name="wLink" placeholder="www.example.com" />
                        </div> -->
                        <div class="mb-3 col-md-3">
                          <label for="state" class="form-label">Facebook</label>
                          <input class="form-control" type="text" id="fb" name="facebook" value="<?php echo $fb ?>" placeholder="www.facebook.com/example" />
                        </div>
                        <div class="mb-3 col-md-3">
                          <label for="zipCode" class="form-label">Instagram</label>
                          <input type="url" class="form-control" id="ig" name="instagram" value="<?php echo $ig ?>" placeholder="www.instagram.com/example" />
                        </div>
                        <!-- <div class="mb-3 col-md-3">
                          <label for="zipCode" class="form-label">Twitter</label>
                          <input type="url" class="form-control" id="ig" name="instagram" placeholder="www.instagram.com/example" />
                        </div> -->
                      </div>
                      <div class="mt-2">
                        <button type="button" class="btn btn-success me-2" onclick="editBusiness()">Save changes</button>
                        <!-- <button type="reset" class="btn btn-outline-secondary">Cancel</button> -->
                      </div>
                      </form>
                    <?php  } ?>
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

  <script src="plugins/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="plugins/assets/vendor/js/bootstrap.js"></script>
  <script src="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="plugins/assets/vendor/js/menu.js"></script>
  <script src="plugins/assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function editBusiness() {
      var bus_name = $('#businessName').val();
      var number = $('#contactNumber').val();
      var address = $('#address').val();
      var email = $('#email').val();
      var establish = $('#yearEstablished').val();
      var opening = $('#Opening').val();
      var closing = $('#Closing').val();
      var branch = $('#branch').val();
      var fb = $('#fb').val();
      var ig = $('#ig').val();

      var payload = {
        bus_name: bus_name,
        number: number,
        address: address,
        email: email,
        establish: establish,
        opening: opening,
        closing: closing,
        branch: branch,
        fb: fb,
        ig: ig
      };

      var formData = new FormData();

      // Append payload data as JSON
      formData.append('payload', JSON.stringify(payload));
      formData.append('setFunction', 'edtBusinessDetails');

      // Get the selected file (input element)
      var businessLogoInput = $("input[name='bus_logo']")[0]; // Assuming it's the first input element
      var businessLogoFile = businessLogoInput.files[0];


      formData.append('businessLogo', businessLogoFile);

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
  </script>

</body>

</html>