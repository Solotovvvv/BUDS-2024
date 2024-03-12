<?php
require_once './includes/config.php';
session_start();

if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 1) {
    header('Location: ceipo/index.php');
  }
}

$pdo = Database::connection();

// Get the search query from the form submission

if ((isset($_GET['a']) && $_GET['a'] != null)) {
  $search_query = $_GET['a'];

  $search_query = '%' . $search_query . '%';

  // Assuming you're using PHP's PDO for database interactions
  $stmt = $pdo->prepare("
      SELECT *
      FROM business_list AS bl
      INNER JOIN category_list AS cl ON bl.BusinessCategory = cl.ID
      INNER JOIN brgyzone_list AS blg ON bl.BusinessBrgy = blg.ID
      WHERE
          blg.barangay LIKE :search_query
          OR
          cl.category LIKE :search_query
          OR
          bl.BusinessName LIKE :search_query
          AND 
          (bl.BusinessStatus = '1' 
          OR
          bl.BusinessStatus = '4')
         LIMIT 5");

  $stmt->bindParam(':search_query', $search_query, PDO::PARAM_STR);
  $stmt->execute();
  // echo "Executed Query: " . $stmt->queryString . "<br>";


  if ($stmt === false) {
    $errorInfo = $pdo->errorInfo();
    echo "SQL Error: " . $errorInfo[2];
  } else {
    // Debugging: Output the executed query for verification
    // echo "Executed Query: " . $sql1 . "<br>";
    $datas = $stmt->fetchAll();

    if (empty($datas)) {
      echo "No results found.";
    }
    // echo "Number of rows returned: " . $stmt->rowCount();
  }
} elseif (isset($_GET['b']) && $_GET['b'] != null) {
  $cat = $_GET['b'];
  $sql = "SELECT * FROM business_list AS bl
  INNER JOIN category_list AS cl ON bl.BusinessCategory = cl.ID
  INNER JOIN brgyzone_list AS blg ON bl.BusinessBrgy = blg.ID
  WHERE bl.BusinessCategory = :cat AND cl.ID = :cat 
  AND (bl.BusinessStatus = 1 OR bl.BusinessStatus = 4) LIMIT 4";

  // Assuming you have previously created a PDO object named $pdo
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':cat', $cat, PDO::PARAM_STR);

  if (!$stmt->execute()) {
    $errorInfo = $stmt->errorInfo();
    echo "SQL Error: " . $errorInfo[2];
  } else {
    $datas = $stmt->fetchAll();

    if (empty($datas)) {
      echo "No results found.";
    }
  }
} elseif (isset($_GET['c']) && $_GET['c'] != null) {
  $subcat = $_GET['c'];
  $sql = "SELECT DISTINCT bl.*, cl.*,blg.*
  FROM business_list AS bl
  INNER JOIN category_list AS cl ON bl.BusinessCategory = cl.ID
  -- INNER JOIN subcategory_list AS scl ON scl.catid = cl.ID
  INNER JOIN brgyzone_list AS blg ON bl.BusinessBrgy = blg.ID
  WHERE bl.BusinessSubCategory = :subcat 
  AND (bl.BusinessStatus = 1 OR bl.BusinessStatus = 4)
  LIMIT 4";



  // Assuming you have previously created a PDO object named $pdo
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':subcat', $subcat, PDO::PARAM_STR);

  if (!$stmt->execute()) {
    $errorInfo = $stmt->errorInfo();
    echo "SQL Error: " . $errorInfo[2];
  } else {
    $datas = $stmt->fetchAll();

    if (empty($datas)) {
      echo "No results found.";
    }
  }
} elseif (isset($_GET['d']) && $_GET['d'] != null) {
  $limit = $_GET['d'];
  $sql = "SELECT * FROM business_list WHERE BusinessStatus = 1 OR BusinessStatus = 4 LIMIT ".$limit."";

  $stmt = $pdo->prepare($sql);
  // $stmt->bindParam(':subcat', $subcat, PDO::PARAM_STR);

  if (!$stmt->execute()) {
    $errorInfo = $stmt->errorInfo();
    echo "SQL Error: " . $errorInfo[2];
  } else {
    $datas = $stmt->fetchAll();

    if (empty($datas)) {
      echo "No results found.";
    }
  }
} else {
  // die("No search query provided.");
  $counter1 = 0;
  $totalRating1 = 0;
  $sql = "SELECT * FROM business_list WHERE BusinessStatus = 1 OR BusinessStatus = 4  LIMIT 5";
  $disp = "";
  if ($rs = $conn->query($sql)) {
    if ($rs->num_rows > 0) {
      while ($row = $rs->fetch_assoc()) {
        $uniqueId = 'businessDescription_' . $row['bus_id'];
        $idRate = $row['bus_id'];
        $disp .= '
          <div class="py-3 px-2 pb-1 border-bottom">
          <div class="row">
            <div class="col-lg-4">
              <img src="img/logo/' . $row['Businesslogo'] . '" style="border-radius: 20px;" alt="no pic">
            </div>
            <div class="col-lg-8">
              <div class="d-md-flex align-items-md-center">
                <div class="name"><h4><a href="./details.php?ID=' . $row['bus_id'] . '"><strong>' . $row['BusinessName'] . '</strong></a></h4>
                <span class="city">' . $row['BusinessAddress'] . ' Brgy. ' . $row['BusinessBrgy'] . '</span>
                </div>
              </div>';
        $disp .= '<div class="text-warning mb-1 me-2">';
        $sql3 = "SELECT * FROM business_reviews WHERE bus_id = $idRate";
        if ($rq = $conn->query($sql3)) {
          if ($rq->num_rows > 0) {
            while ($row1 = $rq->fetch_assoc()) {
              if ($row1['rating'] != null) {
                $totalRating1 += $row1['rating'];
                $counter1++;
              }
            }
            $totalAve = (int)($totalRating1 / $counter1);
            for ($j = 0; $j < $totalAve; $j++) {
              $disp .= '<i class="fa fa-star"></i>';
            }
          } else {
            $disp .= "Please Rate Us";
          }
        } else {
          echo "Error";
        }
        $disp .= '</div>';
        $disp .= '<p class="text-truncate mb-4 mb-md-0">
                    <i class="fa fa-info"></i>
                    <span id="' . $uniqueId . '">' . substr($row['BusinessDescrip'], 0, 50) . '</span>
        </p>
    </div>
</div>
</div>';
      }
    }
  }
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
  <title>BuDS</title>

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
  <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="css/style1.css" type="text/css">
  <link rel="stylesheet" href="css/templatemo-plot-listing1.css" type="text/css">
  <style>
    /* Add this CSS to your stylesheet */
    .swal-confirm-button {
      width: 100px;
      /* Adjust the width as needed */
    }

    .link-button {
      background: none;
      border: none;
      color: #007bff;
      /* Set the color to the desired link color */
      text-decoration: underline;
      cursor: pointer;
      padding: 0;
      font: inherit;
      display: block;
      /* Make the button a block element */
      margin: auto;
      /* Center the button horizontally */
    }

    /* Optionally, you can remove the default button styling */
    .link-button:focus {
      outline: none;
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
      <a href="index.php">
        <img src="img/logo-main.png" alt="">
      </a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="om-widget">
      <!-- <ul>
                <li><i class="icon_mail_alt"></i> Aler.support@gmail.com</li>
                <li><i class="fa fa-mobile-phone"></i> 125-711-811 <span>125-668-886</span></li>
            </ul> -->
      <a href="#" class="hw-btn">Sign-In</a>
    </div>
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
              <!-- <ul>Business Directory</ul> -->
            </div>
          </div>
          <?php if (empty($_SESSION['email'])) { ?>
            <div class="col-lg-9">
              <div class="ht-widget">
                <button onclick="document.getElementById('id01').style.display='block'">Login</a>
              </div>
            </div>
          <?php } else { ?>
            <div class="col-lg-9">
              <div class="ht-widget">
                <div class="hs-nav">
                  <nav class="nav-menu">
                    <ul>
                      <li class="profile-dropdown">
                        <div class="user-profile">
                          <?php if ($_SESSION['photo'] != "") { ?>
                            <img src="<?php echo "img/profile-picture/" . $_SESSION['photo'] ?>" alt="User's Name">
                          <?php } else { ?>
                            <img src="img/testimonial-author/unknown.jpg" alt="User's Name">
                          <?php } ?>
                        </div>
                        <ul class="dropdown dropleft">
                          <li>
                            <h2><?php echo $_SESSION['lname'] . ' , ' . $_SESSION['fname'] ?></h2>
                          </li>
                          <li><a href="user.php">MY PROFILE</a></li>
                          <?php if ($_SESSION['role'] == 3) { ?>
                            <li><a href="user_module-main/index.php">CREATE RESUME</a></li>
                          <?php } ?>
                          <?php if ($_SESSION['role'] == 2) { ?>
                            <li><a href="manage.php">MANAGE BUSINESS</a></li>
                            <li><a href="listing-form.php">ADD BUSINESS</a></li>
                          <?php } ?>
                          <li><a href="logout.php">LOGOUT</a></li>
                        </ul>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          <?php } ?>
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
                <li class="active"><a href="./listing.php">Business Listing</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="id01" class="modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content w-100">
        <div class="modal-header">
          <h3 class="text-center mb-6 font-weight-bold">LOG IN</h3>
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="container mt-4">
          <div class="card px-2 py-3" id="form1">
            <div class="form-data" v-if="!submitted">
              <div class="forms-inputs mb-4">
                <!-- <form method="post"> -->
                <span>Email</span>
                <input type="text" name="txtEmail" id="email_log" required>
              </div>
              <div class="forms-inputs mb-4">
                <span>Password</span>
                <input type="password" name="txtUserPass" id="password_log" required>
                <h6><a href="#">Forgot Password?</a></h6>
              </div>
              <div class="mb-3">
                <button type="button" class="btn w-100" onclick="loginUser()">LOG IN</button>
              </div>
            </div>
            </form>
            <div class="success-data" v-else>
              <div class="text-center d-flex flex-column">
                <h6 class="text-center fs-1">Don't have a user account? <a href="#id02" data-toggle="modal">Sign Up</a></h6>
              </div>
            </div>
            <div class="success-data" v-else>
              <div class="text-center d-flex flex-column">
                <h6 class="text-center fs-1">Don't have a business account? <a href="#id03" data-toggle="modal">Sign Up</a></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- modal for user create -->
  <div id="id02" class="modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content w-100">
        <div class="modal-header">
          <h3 class="text-center mb-6 font-weight-bold">USER ACCOUNT REGISTRATION</h3>
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="container mt-4">
          <div class="card px-2 py-3" id="form2">
            <div class="form-data" v-if="!submitted">
              <form class="" action="index.php" method="post">

              </form>
              <div class="row">
                <div class="col">
                  <div class="forms-inputs mb-4"> <span>First Name</span> <input id="f_name" type="text">
                  </div>
                </div>
                <div class="col">
                  <div class="forms-inputs mb-4"> <span>Middle Name</span> <input id="m_name" type="text">
                  </div>
                </div>

                <div class="col">
                  <div class="forms-inputs mb-4"> <span>Last Name</span> <input id="l_name" type="text">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="forms-inputs mb-4"> <span>Email</span> <input type="text" id="emailUser"> </div>
                </div>
              </div>
              <div class="forms-inputs mb-4"> <span>Password</span> <input type="password" id="pass">
              </div>
              <div class="forms-inputs mb-4"> <span>Confirm Password</span> <input type="password" id="con_pass">
              </div>
              <!-- <div class="form-group form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <p class="form-check-label" for="exampleCheck1">By clicking this, you are agreeing to the <a href="#">Terms & Conditions </a> and the <a href="#">Privacy Policy</a>.</p>
                            </div> -->
              <div class="mb-3"> <button class="btn w-100" onclick="createUser()">SIGN UP</button> </div>
            </div>
            <!-- <div class="success-data" v-else>
                          <div class="text-center d-flex flex-column"> <i class='bx bxs-badge-check'></i> <h6 class="text-center fs-1">Already have an Account? <a href="#id01" data-toggle="modal">Sign In</a></h6> </div>
                      </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- modal for business create -->
  <div id="id03" class="modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content w-100">
        <div class="modal-header">
          <h3 class="text-center mb-6 font-weight-bold">BUSINESS ACCOUNT REGISTRATION</h3>
          <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="container mt-4">
          <div class="card px-2 py-3" id="form2">
            <div class="form-data" v-if="!submitted">
              <form>
                <div class="row">
                  <div class="col">
                    <div class="forms-inputs mb-4"> <span>Email</span> <input type="email" name="email" id="ownerEmail"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="forms-inputs mb-4"> <span>First Name</span> <input type="text" name="firstname" id="ownerFname"></div>
                  </div>
                  <div class="col">
                    <div class="forms-inputs mb-4"> <span>Middle Name</span> <input type="text" name="middlename" id="ownerMname"></div>
                  </div>

                  <div class="col">
                    <div class="forms-inputs mb-4"> <span>Last Name</span> <input type="text" name="surname" id="ownerLname">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="forms-inputs mb-4"> <span>Birthday</span> <input type="date" name="birthday" required id="ownerBirthday"></div>
                  </div>
                  <div class="col">
                    <div class="forms-inputs mb-4"> <span>Age</span> <input type="text" name="age" required id="ownerAge"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group form-check">
                      <span>Sex</span>
                      <br>
                      <input type="radio" id="Female" name="sex" value="Female" required> Female
                      <input type="radio" id="Male" name="sex" value="Male" required> Male
                    </div>
                  </div>
                  <div class="col">
                    <div class="forms-inputs mb-4"> <span>Contact Number</span> <input type="tell" name="contactnumber" id="ownerNumber"></div>
                  </div>
                </div>
                <div class="forms-inputs mb-4"> <span>Address</span> <input type="text" name="address" id="ownerAddress"></div>
                <div class="forms-inputs mb-4"> <span>Password</span> <input type="password" name="password" id="ownerPass"></div>
                <div class="forms-inputs mb-4"> <span>Confirm Password</span> <input type="password" name="passwordconfirm" id="ownerConPass"></div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="checkTerms">
                  <p class="form-check-label" for="exampleCheck1">By clicking this, you are agreeing to the <a href="#">Terms & Conditions </a> and the <a href="#">Privacy Policy</a>.</p>
                </div>
                <div class="mb-3"> <button disabled class="btn w-100" id="signUp" onclick="createBusinessOwner()" name="btnbusiness" type="button">SIGN UP</button></div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header End
  <section class="property-section latest-property-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-title">
            <h4>BUSINESS LISTING</h4>
          </div>
        </div>
        <div class="container">
          <div id="content">
            <div class="d-sm-flex align-items-sm-center py-sm-3 location">
              <input type="text" required placeholder="Search" id="searchVal" class="mx-sm-2 my-sm-0 form-control">
              <button type="button" onclick="searchpage()" class="btn btn-success my-sm-0 mb-2">Search</button>
            </div>
            <div class="d-sm-flex">
              <div class="col-lg-4 me-sm-2">
                <div id="filter" class="p-5 bg-light ms-lg-4 ms-lg-2 border">
                  <div class="border-bottom h5 text-uppercase">Filter By</div>
                  <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Location </div>
                    <div class="my-1">
                      <div><input type="checkbox" onclick ="filterBus()" class="tick busloc" value="North" id="north"> <label>NORTH </label></div>
                      <div><input type="checkbox"  onclick ="filterBus()" class="tick busloc" value="South" id="south"> <label>SOUTH </label></div>
                    </div>
                  </div>
                  <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Category</div>
                    <div class="my-1">
                      <?php
                      $query = "SELECT * FROM category_list";
                      $result = $conn->query($query);
                      while ($row = $result->fetch_assoc()) {
                        echo '<div><input type="checkbox" class="tick buscat" onclick ="filterBus()" value="' . $row['ID'] . '" id="brand_' . $row['ID'] . '"> <label> ' . $row['category'] . ' </label></div>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 bg-white p-2 border">
                <div class="py-3 px-2 pb-1 border-bottom">
                <div id="newFilteredUi">
                  <?php if ((isset($_GET['a']) && $_GET['a'] != null) || (isset($_GET['b']) && $_GET['b'] != null)
                    || (isset($_GET['c']) && $_GET['c'] != null)
                  ) { ?>
                    <?php foreach ($datas as $data) {
                      $uniqueId = 'businessDescription_' . $data['bus_id'];
                    ?>
                      <div class="row">
                        <div class="col-lg-4">
                          <img src="<?php echo "img/logo/" . $data['Businesslogo'] ?>" style="border-radius: 20px;" alt="no pic">
                        </div>
                        <div class="col-lg-8">
                          <div class="d-md-flex align-items-md-center">
                            <div class="name">
                              <h4><a href=<?php echo "details.php?ID=" . $data['bus_id'] ?>><strong><?php echo $data['BusinessName'] ?></strong></a></h4>
                              <span class="city"><?php echo $data['BusinessAddress'] . ' Brgy ' . $data['BusinessBrgy'] ?></span>
                            </div>
                          </div>
                          <?php
                          $id_rating = $data['bus_id'];
                          $populateRatingQuery = "SELECT * FROM business_reviews WHERE bus_id = :id;";
                          $stmt3 = $pdo->prepare($populateRatingQuery);
                          $stmt3->bindParam(':id', $id_rating, PDO::PARAM_STR);
                          if (!$stmt3->execute()) {
                            $errorInfo = $stmt3->errorInfo();
                            echo "SQL Error: " . $errorInfo[2];
                          } else {
                            $datas2 = $stmt3->fetchAll();
                            if (empty($datas2)) {
                              echo "Please rate us.";
                            }
                          }
                          ?>
                          <div class="text-warning mb-1 me-2">
                          <?php $counter = 0;
                          $totalRating2 = 0; // Initialize the variable
                          ?>
                            <?php foreach ($datas2 as $data2) {
                              if ($data2['rating'] != null) {
                                $totalRating2 += $data2['rating'];
                                $counter++;
                              }
                            }
                            if ($totalRating2 != null) {
                              $totalAve = $totalRating2 / $counter;
                              for ($j = 0; $j < $totalAve; $j++) {
                            ?> 
                              <i class="fa fa-star"></i>
                              <?php }
                            }

                              ?>
                          </div>
                          <p class="text-truncate mb-4 mb-md-0">
                           <ul>
                              <li>
                                <i class="fa fa-info"></i>
                                <span id="<?php echo $uniqueId; ?>">
                                <?php echo substr($data1['BusinessDescrip'], 0, 50); ?>
                                </span>
                                <button class="link-button center text-info" onclick="toggleDescription(this, '<?php echo $uniqueId; ?>', '<?php echo htmlspecialchars(json_encode($data1['BusinessDescrip'])); ?>')">See More</button>
                              </li>
                            </ul>
                          </p>
                        </div>
                            </div>
                            </div>
                    <?php } ?>
                    <?php } else { ?>
                      <div id="newFilteredUi">
                       <?php echo $disp; ?>
                      </div>
                      <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <section class="property-section latest-property-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-title">
            <h4>BUSINESS LISTING</h4>
          </div>
        </div>
        <div class="container">
          <div id="content">
            <div class="d-sm-flex align-items-sm-center py-sm-3 location">
              <input type="text" required placeholder="Search" id="searchVal" class="mx-sm-2 my-sm-0 form-control">
              <button type="button" onclick="searchpage()" class="btn btn-success my-sm-0 mb-2">Search</button>
            </div>
            <div class="d-sm-flex">
              <div class="col-lg-4 me-sm-2">
                <div id="filter" class="p-5 bg-light ms-lg-4 ms-lg-2 border">
                  <div class="border-bottom h5 text-uppercase">Filter By</div>
                  <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Location </div>
                    <div class="my-1">
                      <div><input type="checkbox" onclick="filterBus()" class="tick busloc" value="North" id="north"> <label>NORTH </label></div>
                      <div><input type="checkbox" onclick="filterBus()" class="tick busloc" value="South" id="south"> <label>SOUTH </label></div>
                    </div>
                  </div>
                  <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Category</div>
                    <div class="my-1">
                      <?php
                      $query = "SELECT * FROM category_list";
                      $result = $conn->query($query);
                      while ($row = $result->fetch_assoc()) {
                        echo '<div><input type="checkbox" class="tick buscat" onclick="filterBus()" value="' . $row['ID'] . '" id="brand_' . $row['ID'] . '"> <label> ' . $row['category'] . ' </label></div>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 bg-white p-2 border">
                <div class="py-3 px-2 pb-1 border-bottom">
                  <div id="newFilteredUi">
                    <?php if ((isset($_GET['a']) && $_GET['a'] != null) || (isset($_GET['b']) && $_GET['b'] != null)
                      || (isset($_GET['c']) && $_GET['c'] != null) || (isset($_GET['d']) && $_GET['d'] != null)
                    ) { ?>
                      <?php foreach ($datas as $data) {
                        $uniqueId = 'businessDescription_' . $data['bus_id'];
                      ?>
                        <div class="row">
                          <div class="col-lg-4">
                            <img src="<?php echo "img/logo/" . $data['Businesslogo'] ?>" style="border-radius: 20px;" alt="no pic">
                          </div>
                          <div class="col-lg-8">
                            <div class="d-md-flex align-items-md-center">
                              <div class="name">
                                <h4><a href=<?php echo "details.php?ID=" . $data['bus_id'] ?>><strong><?php echo $data['BusinessName'] ?></strong></a></h4>
                                <span class="city"><?php echo $data['BusinessAddress'] . ' Brgy ' . $data['BusinessBrgy'] ?></span>
                              </div>
                            </div>
                            <?php
                            $id_rating = $data['bus_id'];
                            $populateRatingQuery = "SELECT * FROM business_reviews WHERE bus_id = :id;";
                            $stmt3 = $pdo->prepare($populateRatingQuery);
                            $stmt3->bindParam(':id', $id_rating, PDO::PARAM_STR);
                            if (!$stmt3->execute()) {
                              $errorInfo = $stmt3->errorInfo();
                              echo "SQL Error: " . $errorInfo[2];
                            } else {
                              $datas2 = $stmt3->fetchAll();
                              if (empty($datas2)) {
                                echo "Please rate us.";
                              }
                            }
                            ?>
                            <div class="text-warning mb-1 me-2">
                              <?php $counter = 0;
                              $totalRating2 = 0; // Initialize the variable
                              ?>
                              <?php foreach ($datas2 as $data2) {
                                if ($data2['rating'] != null) {
                                  $totalRating2 += $data2['rating'];
                                  $counter++;
                                }
                              }
                              if ($totalRating2 != null) {
                                $totalAve = $totalRating2 / $counter;
                                for ($j = 0; $j < $totalAve; $j++) {
                              ?>
                                  <i class="fa fa-star"></i>
                              <?php }
                              }

                              ?>
                            </div>
                            <p class="text-truncate mb-4 mb-md-0">
                              <i class="fa fa-info"></i>
                              <span id="<?php echo $uniqueId; ?>">
                                <?php echo substr($data['BusinessDescrip'], 0, 50); ?>
                              </span>
                              <!-- <button class="link-button center text-info" onclick="toggleDescription(this, '<?php echo $uniqueId; ?>', '<?php echo htmlspecialchars(json_encode($data['BusinessDescrip'])); ?>')">See More</button> -->
                            </p>
                          </div>
                        </div>
                      <?php } ?>
                    <?php } else { ?>
                      <div id="newFilteredUi">
                        <?php echo $disp; ?>
                      </div>
                    <?php } ?>

                    <div class="container">
                      <div class="row">
                        <div class="col-12 text-center">
                          <a class="btn btn-success text" href="#" onclick="increaseLimit(10)" role="button">See More</a>
                        </div>
                      </div>
                    </div>
  </section>

  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>


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
  <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
  <script>
    $(document).ready(function() {
      // Get a reference to the checkbox element
      var checkbox = $("#checkTerms");
      var signUpButton = $("#signUp");

      // Add a change event handler
      checkbox.change(function() {
        // Check if the checkbox is checked
        if (checkbox.is(":checked")) {
          // Checkbox is checked
          // alert("Checkbox is checked!");
          signUpButton.prop("disabled", false);
          // You can add your code to handle the checked state here
        } else {
          // Checkbox is unchecked
          // alert("Checkbox is unchecked!");
          signUpButton.prop("disabled", true);
          // You can add your code to handle the unchecked state here
        }
      });
    });

    function searchpage() {
      var searchVal = encodeURIComponent($('#searchVal').val()); // Encode the searchVal
      setTimeout(function() {
        window.location.href = "listing.php?a=" + searchVal;
      }, 1);
    };

    function increaseLimit(value) {
        var currentLimit = parseInt(<?php echo isset($_GET['d']) ? $_GET['d'] : 5; ?>);
        var newLimit = currentLimit + 5;
        window.location.href = "listing.php?d=" + newLimit;
    }

    function createUser() {
      var fname = $('#f_name').val();
      var mname = $('#m_name').val();
      var lname = $('#l_name').val();
      var email = $('#emailUser').val();
      var pass = $('#pass').val();
      var conpass = $('#con_pass').val();

      if (
        !fname ||
        !mname ||
        !lname ||
        !email ||
        !pass ||
        !conpass
      ) {
        Swal.fire({
          title: 'Warning',
          text: 'Please fill out all required fields.',
          icon: 'warning',
          customClass: {
            confirmButton: 'swal-confirm-button',
          },
          showCancelButton: false,
        });
        return;
      }

      var payload = {
        fname: fname,
        mname: mname,
        lname: lname,
        email: email,
        pass: pass
      };

      if (pass == conpass) {
        console.log(payload)
        $.ajax({
          type: "POST",
          url: 'controllers/users.php',
          data: {
            payload: JSON.stringify(payload),
            setFunction: 'createUser'
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
            //for normal UI AHAHAHHAHAHA
            // swal.fire(data.title, data.message, data.icon);
            if (data.status == "success") {
              setTimeout(function() {
                window.location.reload();
              }, 2000);
            }
          }
        });
      } else {
        Swal.fire({
          title: 'Warning',
          text: 'Passwords didn\'t match',
          icon: 'warning',
          customClass: {
            confirmButton: 'swal-confirm-button',
          },
          showCancelButton: false,
        });
      }
    };

    function createBusinessOwner() {
      var ownerEmail = $('#ownerEmail').val();
      var ownerFname = $('#ownerFname').val();
      var ownerMname = $('#ownerMname').val();
      var ownerLname = $('#ownerLname').val();
      var ownerBirthday = $('#ownerBirthday').val();
      var ownerAge = $('#ownerAge').val();
      var ownerSex = $("[name='sex']:checked").val();
      var ownerNumber = $('#ownerNumber').val();
      var ownerAddress = $('#ownerAddress').val();
      var ownerPass = $('#ownerPass').val();
      var ownerConPass = $('#ownerConPass').val();

      if (
        !ownerEmail ||
        !ownerFname ||
        !ownerMname ||
        !ownerLname ||
        !ownerBirthday ||
        !ownerAge ||
        !ownerSex ||
        !ownerNumber ||
        !ownerAddress ||
        !ownerPass ||
        !ownerConPass
      ) {
        Swal.fire({
          title: 'Warning',
          text: 'Please fill out all required fields.',
          icon: 'warning',
          customClass: {
            confirmButton: 'swal-confirm-button',
          },
          showCancelButton: false,
        });
        return;
      }

      var payload = {
        ownerEmail: ownerEmail,
        ownerFname: ownerFname,
        ownerMname: ownerMname,
        ownerLname: ownerLname,
        ownerBirthday: ownerBirthday,
        ownerAge: ownerAge,
        ownerSex: ownerSex,
        ownerNumber: ownerNumber,
        ownerAddress: ownerAddress,
        ownerPass: ownerPass
      };

      if (ownerPass == ownerConPass) {
        // console.log(payload)
        $.ajax({
          type: "POST",
          url: 'controllers/users.php',
          data: {
            payload: JSON.stringify(payload),
            setFunction: 'createOwner'
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
            //for normal UI AHAHAHHAHAHA
            // swal.fire(data.title, data.message, data.icon);
            if (data.status == "success") {
              setTimeout(function() {
                window.location.reload();
              }, 2000);
            }
          }
        });
      } else {
        Swal.fire({
          title: 'Warning',
          text: 'Passwords didn\'t match',
          icon: 'warning',
          customClass: {
            confirmButton: 'swal-confirm-button',
          },
          showCancelButton: false,
        });
      }
    };

    function loginUser() {
      var username = $("#email_log").val();
      var pass = $('#password_log').val();

      var payload = {
        username: username,
        pass: pass
      };

      $.ajax({
        type: "POST",
        url: 'controllers/users.php',
        data: {
          payload: JSON.stringify(payload),
          setFunction: 'loginUser'
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
          //for normal UI AHAHAHHAHAHA
          // swal.fire(data.title, data.message, data.icon);
          if (data.role == 1) {
            setTimeout(function() {
              window.location.href = "ceipo/index.php";
            }, 2000);

          } else {
            if (data.status == "success") {
              setTimeout(function() {
                window.location.reload();
              }, 2000);
            }
          }
        }
      });
    };

    function filterBus() {
      var locSpecificationsValue = [];
      $(".busloc:checked").each(function() {
        var locSpecificationValue = $(this).val().trim();
        if (locSpecificationValue !== "") {
          locSpecificationsValue.push({
            val: locSpecificationValue
          });
        }
      });

      var catSpecificationsValue = [];
      $(".buscat:checked").each(function() {
        var catSpecificationValue = $(this).val().trim();
        if (catSpecificationValue !== "") {
          catSpecificationsValue.push({
            value: catSpecificationValue
          });
        }
      });

      var payload = {
        location: locSpecificationsValue,
        category: catSpecificationsValue
      };

      $.ajax({
        type: "POST",
        url: 'controllers/business.php',
        data: {
          payload: JSON.stringify(payload),
          setFunction: 'searchBusinessFilter'
        },
        success: function(response) {
          $("#newFilteredUi").html(response);
        }
      });
    };

    function toggleDescription(button, uniqueId, fullDescription) {
      var descriptionElement = document.getElementById(uniqueId);

      if (descriptionElement) {
        if (descriptionElement.innerText.length < fullDescription.length) {
          descriptionElement.innerText = fullDescription;
          button.innerText = 'See Less';
        } else {
          descriptionElement.innerText = fullDescription.substring(0, 50);
          button.innerText = 'See More';
        }
      }
    }
  </script>
</body>

</html>