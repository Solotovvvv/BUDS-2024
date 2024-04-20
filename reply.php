<?php
session_start();
require_once './includes/config.php';
// echo $_SESSION['ownerId'];
if (empty($_SESSION['ownerId']) || empty($_GET['a'])) {
  header('Location: manage.php');
}
$bus_id = $_GET['a'];
$_SESSION['bus_id'] = $_GET['a'];
$sql5 = "SELECT * 
FROM business_reviews AS br 
INNER JOIN business_list AS bl ON br.bus_id = bl.bus_id
INNER JOIN owner_list AS ol ON br.user_id = ol.ID 
WHERE br.bus_id = :id
ORDER BY br.curr_time DESC
;";
$pdo = Database::connection();
$stmt5 = $pdo->prepare($sql5);
$stmt5->bindParam(':id', $bus_id, PDO::PARAM_STR);
$stmt5->execute();
$numRows3 = $stmt5->rowCount();
$datas = $stmt5->fetchAll();

foreach ($datas as $data) {
  $logo = $data['Businesslogo'];
}

$sql6 = "SELECT * 
FROM business_reviews AS br 
INNER JOIN business_list AS bl ON br.bus_id = bl.bus_id
INNER JOIN owner_list AS ol ON br.user_id = ol.ID 
WHERE br.bus_id = :id
-- AND br.rating IS NOT NULL
ORDER BY br.curr_time DESC
LIMIT 5;
";
$stmt6 = $pdo->prepare($sql6);
$stmt6->bindParam(':id', $bus_id, PDO::PARAM_STR);
$stmt6->execute();
$numRows4 = $stmt6->rowCount();
$datas1 = $stmt6->fetchAll();
$totalRating = 0; // Initialize the variable
$counter = 0;

foreach ($datas1 as $data) {
  if (isset($data['rating']) && $data['rating'] != null) {
    $totalRating += $data['rating'];
    $counter++;
  }
}
// echo $numRows3;
// echo $counter;
// echo $totalRating;
if (isset($data['rating']) && $data['rating'] != null) {
  $totalAve = $totalRating / $counter;
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="plugins/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Business Dashboard | Gallery</title>
  <meta name="description" content="" />
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="plugins/assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="plugins/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="plugins/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="plugins/assets/css/demo.css" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

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
          <li class="menu-item active">
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
              <div data-i18n="Analytics">Job Applications</div>
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
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img id="user-profile-img" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img id="user-profile-imgs" alt class="w-px-40 h-auto rounded-circle" />
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
        <div class="container-xxl flex-grow-1 mt-4">
          <div class="row">
            <div class="col-lg-8 order-0">
              <div class="card h-100">
                <div class="d-flex align-items-end row">
                  <div class="col-sm-7">
                    <div class="card-body">
                      <h5 class="card-title text-primary">Congratulations Owner! 🎉</h5>
                      <?php if (isset($data['rating']) && $data['rating'] != null) { ?>
                        <p class="mb-4">
                          You received <span class="fw-bold"><?php echo $totalAve ?>/5 ratings</span> and <?php echo $numRows3 ?> comments to your business as of
                          today.
                        </p>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body px-md-4">
                      <img src="<?php echo "img/logo/" . $logo ?>" height="130" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 order-0">
              <div class="row h-100">
                <div class="col-lg-6 col-md-12 col-6">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="plugins/assets/img/icons/unicons/star.png" alt="chart success" class="rounded" />
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Rating</span>
                      <?php if (isset($data['rating']) && $data['rating'] != null) { ?>
                        <h3 class="card-title mb-2"><?php echo $totalAve . ' ' ?>/ 5</h3>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="plugins/assets/img/icons/unicons/comment.png" alt="Credit Card" class="rounded" />
                        </div>
                      </div>
                      <span class="fw-semibold d-block mb-1">Total Comments</span>
                      <h3 class="card-title mb-2"><?php echo $numRows3 ?></i></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="container max-width-800 justify-content-center mt-4">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recent Comments</h4>
                  <h6 class="card-subtitle">Latest Comments section by users</h6>
                </div>

                <div class="comment-widgets m-b-20">

                  <?php foreach ($datas1 as $data1) {
                    $dateString = $data1['curr_time']; // Assuming you have the date as a string in this format
                    $timestamp = strtotime($dateString);
                    $formattedDate = date('F j, Y', $timestamp); ?>
                    <div class="d-flex flex-row comment-row">
                      <?php if ($_SESSION['photo'] != "") { ?>
                        <div class="p-2"><span class="round"><img src="<?php echo "img/profile-picture/" . $_SESSION['photo'] ?>" alt="user" width="50"></span></div>
                      <?php } else { ?>
                        <div class="p-2"><span class="round"><img src="img/testimonial-author/unknown.jpg" alt="user" width="50"></span></div>
                      <?php } ?>
                      <div class="comment-text w-100">
                        <h5 class="mb-0"><?php echo $data1['Firstname'] . ' ' . $data1['MiddleName'] . ' ' . $data1['Surname'] ?></h5>
                        <div class="pr-rating">
                          <?php for ($j = 0; $j < $data1['rating']; $j++) { ?>
                            <i class='bx bxs-star'></i>
                          <?php } ?>
                        </div>
                        <div class="comment-footer">
                          <span class="date"><?php echo ' ' . $formattedDate ?></span>
                          <a data-bs-toggle="collapse" href="<?php echo "#collapseExample1" . $data1['bus_rev_id'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class='bx bxs-chat'></i>Reply</a>
                          </span>
                        </div>
                        <p class="m-b-5 m-t-5"><?php echo $data1['comment'] ?></p>

                        <div class="collapse" id="<?php echo "collapseExample1" . $data1['bus_rev_id'] ?>">
                          <div class="d-grid d-sm-flex p-3 border">

                            <div class="col mb-0">
                              <textarea class="form-control" id="<?php echo 'replyVal' . $data1['bus_rev_id'] ?>"></textarea>
                              <br>
                              <button type="button" class="btn btn-success" onclick="reply('<?php echo $data1['bus_rev_id'] ?>')">Reply</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>


                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
      </div>
      <script src="plugins/assets/vendor/js/bootstrap.js"></script>
      <!-- Include jQuery from a CDN (Content Delivery Network) -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
      <script src="plugins/assets/vendor/js/menu.js"></script>
      <script src="plugins/assets/js/main.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        $(document).ready(function() {
          // Fetch data when the page loads
          fetchData();
        });

        function fetchData() {
          // Make an AJAX request to fetch data from the server
          $.ajax({
            url: 'fetchUserData.php', // Replace 'fetchUserData.php' with the actual file path to fetch data from your server
            type: 'GET',
            dataType: 'json',
            success: function(data) {

              if (data.photo) {
                $('#user-profile-img').attr('src', data.photo);
                $('#user-profile-imgs').attr('src', data.photo);

              } else {
                $('#user-profile-img').attr('src', 'img/testimonial-author/unknown.jpg');
                $('#user-profile-imgs').attr('src', 'img/testimonial-author/unknown.jpg');

              }

            },
            error: function(xhr, status, error) {
              console.error(xhr.responseText);
              // Handle error
            }
          });
        }

        function reply(repId) {
          var reply = $('#replyVal' + repId).val();
          var replyId = repId;
          var payload = {
            reply: reply,
            replyId: replyId
          };
          $.ajax({
            type: "POST",
            url: 'controllers/business.php',
            data: {
              payload: JSON.stringify(payload),
              setFunction: 'reply'
            },
            success: function(response) {
              data = JSON.parse(response);
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

</html>
</body>

</html>