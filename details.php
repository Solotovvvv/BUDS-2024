<?php
session_start();
require_once('includes/config.php');

// if (isset($_SESSION['role'])) {
//     if ($_SESSION['role'] == 1) {
//         header('Location: CEIPO/client/index');
//     }
// }
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);
// print_r($_SESSION);
$role = $_SESSION['role'];


$id = $_GET['ID'];
$_SESSION['bus_id'] = $_GET['ID'];
//old query
// $sql = "SELECT * FROM business_list WHERE bus_id = '$id'";
$sql = "SELECT bl.*, bll.*, bzl.*, bloc.*, COALESCE(AVG(br.rating), 0) AS avg_rating
        FROM business_list AS bl 
        INNER JOIN business_links AS bll ON bl.bus_id = bll.bus_id
        INNER JOIN brgyzone_list AS bzl ON bl.BusinessBrgy = bzl.ID
        INNER JOIN business_location AS bloc ON bl.bus_id = bloc.bus_id
        LEFT JOIN business_reviews AS br ON bl.bus_id = br.bus_id
        WHERE bl.bus_id = $id
        GROUP BY bl.bus_id";
$disp = "";
$overview = "";
$FAQs = "";
$socialMedia = "";
if ($rs = $conn->query($sql)) {
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $avg_rating = ($row['avg_rating']) ? number_format($row['avg_rating'], 1) : "N/A"; // Calculate average rating or set to "N/A" if there are no reviews
            if (strpos($row['Businesslogo'], '../') !== false) {
                // Replace '../' with an empty string if it exists
                $imagePath = str_replace('../', '', $row['Businesslogo']);
            } else {
                // Otherwise, prepend 'img/logo/' to the filename
                $imagePath = 'img/logo/' . $row['Businesslogo'];
            }
           
            $disp .= '<div class="row">
                        <div class="col-lg-4">
                            <div class="profile-agent-info">
                                <div class="pi-pic">
                                  <img src="' . $imagePath . '" alt="' . $row['BusinessName'] . '">
                                    <div class="rating-point">
                                    ' . $avg_rating . '
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h5>' . $row['BusinessName'] . '</h5>
                                    <p>Since April 2001</p>
                                    <p>Opening Time: ' . $row['BusinessOpenHour'] . ' Closing Time: ' . $row['BusinessCloseHour'] . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="profile-agent-widget">
                                <ul>
                                    <li>Address <span>' . $row['BusinessAddress'] . ' Brgy. ' . $row['BusinessBrgy'] . ' Zone: ' . $row['zone'] . '</span></li>
                                    <li>Contact Us <span>123-456-789</span><br><span>123-456-789</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="profile-agent-newslatter">
                                <h5>Mark Us!</h5>
                                <form action="#">
                                    <div class="btn btn-success mx"><i class="fa fa-phone"></i> Call</div>
                                    <div class="btn btn-success mx" id="rateUs"><i class="fa fa-star"></i> Rate Us!</div>
                                </form>
                            </div>
                        </div>
                    </div>';
            $overview .= '<div class="tab-desc">
                        <p>' . $row['BusinessDescrip'] . '</p>
                </div>';
            //business faqs updated
            $sqlfaq = "SELECT * FROM business_faq WHERE bus_id = $id";
            if ($rsfaq = $conn->query($sqlfaq)) {
                if ($rsfaq->num_rows > 0) {
                    $FAQs .= '<div class="tab-desc">';
                    $counter = 1;
                    while ($faqRow = $rsfaq->fetch_assoc()) {
                        $FAQs .= '<div class="dropdown mb-2">
                                <button class="btn btn-success dropdown-toggle" type="button" id="collapseDropdownButton' . $counter . '" data-toggle="collapse" data-target="#collapseContent' . $counter . '" aria-expanded="false" aria-controls="collapseContent' . $counter . '">
                                Question #' . $counter . '. ' . $faqRow['Questions'] . '
                                </button>
                                    <div class="c  ollapse" id="collapseContent' . $counter . '">
                                      <div class="card card-body" style="border: 1px solid rgba(0,0,0,.125)">
                                            ' . $faqRow['Answer'] . '
                                        </div>
                                    </div>
                            </div>';
                        $counter++;
                    }
                    $FAQs .= '</div>';
                } else {
                    $FAQs = '<div class="tab-desc">No FAQs available</div>';
                }
            }

            $socialMedia .= '<div class="section-title sidebar-title">
                        <h5>FOLLOW US</h5>
                    </div>
                    <div class="fu-links">
                        <a href=' . $row['bus_fb'] . ' class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href=' . $row['bus_ig'] . ' class="instagram"><i class="fa fa-instagram"></i></a>
                    </div>';
            $lat = $row['bus_lat'];
            $long = $row['bus_long'];
            $bus_name = $row['BusinessName'];
            $bus_add = $row['BusinessAddress'];
            $bus_category = $row['BusinessCategory'];
            $bus_sub_category = $row['BusinessSubCategory'];
        }
        $bus_category;
        // echo $bus_sub_category;

    }
}


if (isset($_SESSION['ownerId'])) {
    // Execute this block when 'ownerId' is set in the session.
    $sql = "SELECT *
    FROM business_applicant AS bl
    LEFT JOIN application_list AS ap ON ap.bus_app = bl.bus_applicant
    LEFT JOIN business_list AS bll ON bl.bus_id = bll.bus_id
    WHERE (bl.bus_id = :id AND bl.status = 1)
    AND (ap.app_id IS NULL OR ap.app_id <> :app_id)
   
    ";
} else {
    // Execute this block when 'ownerId' is not set in the session.
    $sql = "SELECT *
            FROM business_applicant AS bl
            LEFT JOIN application_list AS ap ON ap.bus_app = bl.bus_applicant
            LEFT JOIN business_list AS bll ON bl.bus_id = bll.bus_id
            WHERE bl.bus_id = :id AND bl.status = 1";
}


$pdo = Database::connection();
$stmt = $pdo->prepare($sql);
// echo "SQL Query: " . $sql;
$stmt->bindParam(':id', $id, PDO::PARAM_STR);

if (isset($_SESSION['ownerId'])) {
    $stmt->bindParam(':app_id', $_SESSION['ownerId'], PDO::PARAM_STR);
}

$stmt->execute();

if ($stmt->errorCode() !== '00000') {
    $errorInfo = $stmt->errorInfo();
    // Log or handle the error appropriately.
    // Example: error_log("SQL Error: " . $errorInfo[2]);
} else {
    $datas = $stmt->fetchAll();
    $numRows = $stmt->rowCount();
}


$sql3 = "SELECT * FROM business_carousel WHERE bus_id = :bus_id";
$stmt3 = $pdo->prepare($sql3);
$stmt3->bindParam(':bus_id', $id, PDO::PARAM_STR);
$stmt3->execute();
$numRows1 = $stmt3->rowCount();
$datas3 = $stmt3->fetchAll();



$sql4 = "SELECT * FROM business_post WHERE bus_id = :id AND status = 1";
$stmt4 = $pdo->prepare($sql4);
$stmt4->bindParam(':id', $id, PDO::PARAM_STR);
$stmt4->execute();
$numRows2 = $stmt4->rowCount();
$datas4 = $stmt4->fetchAll();

if (isset($_SESSION['fname']) || isset($_SESSION['mname']) || isset($_SESSION['lname'])) {
    $nameCommentRate = $nameCommentRate = $_SESSION['fname'] . " " . $_SESSION['mname'] . " " . $_SESSION['lname'];
}


$sql5 = "SELECT * FROM business_reviews AS br 
INNER JOIN business_list AS bl ON br.bus_id = bl.bus_id
INNER JOIN owner_list AS ol ON br.user_id = ol.ID
WHERE (br.bus_id = :id AND bl.bus_id = :id)
ORDER BY br.curr_time DESC";
$stmt5 = $pdo->prepare($sql5);
$stmt5->bindParam(':id', $id, PDO::PARAM_STR);
$stmt5->execute();
$numRows3 = $stmt5->rowCount();
$datas5 = $stmt5->fetchAll();


if (isset($_SESSION['ownerId'])) {
    $sql6 = "SELECT * FROM business_reviews AS br 
    INNER JOIN business_list AS bl ON br.bus_id = bl.bus_id
    INNER JOIN owner_list AS ol ON br.user_id = ol.ID
    WHERE (br.bus_id = :id AND ol.ID = :userid)"; // Fixed the ON condition

    $stmt6 = $pdo->prepare($sql6);
    $stmt6->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt6->bindParam(':userid', $_SESSION['ownerId'], PDO::PARAM_STR); // Fixed variable name from $stmt to $stmt6
    $stmt6->execute();

    $numRows6 = $stmt6->rowCount();
    $datas6 = $stmt6->fetchAll();

    if ($stmt6->errorCode() !== '00000') {
        $errorInfo = $stmt6->errorInfo(); // Fixed variable name from $stmt to $stmt6
        // Log or handle the error appropriately.
        echo "SQL Error: " . $errorInfo[2];
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/star.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
    <link rel="stylesheet" href="css/templatemo-plot-listing1.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        /* Add this CSS to your stylesheet */
        .swal-confirm-button {
            width: 100px;
            /* Adjust the width as needed */
        }

        #swal {
            z-index: 9999;
            /* Adjust this value as needed */
        }


        #map {
            display: flex;
            margin: auto;
            width: 600px;
            height: 450px;
        }

        .dropdown-toggle {
            width: 100%;
            /* Set the width to 100% */
            white-space: normal;
            background-color: #ffffff;
            /* Set background color to white */
            color: #000000;
            /* Set text color to black */
            text-align: left;
            /* Align the text to the left */
        }

        .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
            position: absolute;
            right: 15px;
            /* Position the arrow to the right */
            top: 50%;
            /* Align the arrow vertically */
            transform: translateY(-50%);
            /* Center the arrow vertically */
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
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img id="user-profile-img" alt="User's Name" class="w-px-40 h-auto rounded-circle" style="width: 40px; height: auto; border-radius: 50%;">
                                                    </div>
                                                </div>
                                                <ul class="dropdown dropleft">
                                                    <li>
                                                        <h2>
                                                            <?php echo $_SESSION['lname'] . ' , ' . $_SESSION['fname'] ?>
                                                        </h2>
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
        <div class="hs-nav" style="border: 1px solid rgba(0,0,0,.125)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <nav class="nav-menu">
                            <ul>
                                <li class="active"><a href="index.php">Home</a></li>
                                <!-- <li><a href="./listing.php">Business Listing</a></li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="id01" tabindex="-1" style="z-index: 1000;" class="modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content w-100">
                <div class="modal-header">
                    <h3 class="text-center mb-6 font-weight-bold">LOG IN</h3>
                    <span onclick="document.getElementById('id01').style.display='none'" title="Close Modal">&times;</span>
                </div>
                <div class="container mt-4">
                    <div class="card px-2 py-3" id="form1">
                        <div class="form-data">
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
                        <div class="success-data">
                            <div class="text-center d-flex flex-column">
                                <h6 class="text-center fs-1">Don't have a user account? <a href="#id02" data-toggle="modal">Sign Up</a></h6>
                            </div>
                        </div>
                        <div class="success-data">
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
    <div id="id02" style="z-index: 1000; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="modal">
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
    <div id="id03" style="z-index: 1000; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="modal">
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
                                    <p class="form-check-label" for="exampleCheck1">By clicking this, you are agreeing
                                        to the <a href="#">Terms & Conditions </a> and the <a href="#">Privacy
                                            Policy</a>.</p>
                                </div>
                                <div class="mb-3"> <button disabled class="btn w-100" id="signUp" onclick="createBusinessOwner()" name="btnbusiness" type="button">SIGN
                                        UP</button></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header End -->

    <!-- Property Details Section Begin -->



    <section class="property-section latest-property-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h4>BUSINESS INFORMATION</h4>
                    </div>
                </div>
                <!-- Displaying business information -->
                <div class="container">
                    <div class="profile-agent-content">
                        <?php echo $disp; ?>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="pd-text">
                                <div class="pd-board">
                                    <br>
                                    <div class="tab-board">
                                        <!-- Tabs for Overview and FAQs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Overview</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">FAQs</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                                <?php echo $overview; ?>
                                            </div>
                                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                                <?php echo $FAQs; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Gallery Section -->
                                <div class="pd-widget">
                                    <h4>GALLERY</h4>
                                    <?php if ($numRows1 > 0) { ?>
                                        <div class="fp-slider owl-carousel">
                                            <?php foreach ($datas3 as $image) : ?>
                                                <div class="fp-item set-bg mb-4" data-setbg="img/gallery1/<?php echo $image['images']; ?>">
                                                    <div class="fp-text">
                                                        <h5 class="title">
                                                            <?php echo $bus_name; ?>
                                                        </h5>
                                                        <p><span class="icon_pin_alt"></span>
                                                            <?php echo $bus_add; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php } else { ?>
                                        <p class="h4 text-muted mb-2 mt-0 pt-0">No available post</p>
                                    <?php } ?>
                                </div>

                                <!-- Map Location Section -->
                                <div class="pd-widget">
                                    <h4>Map Location</h4>
                                    <div class="map">
                                        <div id="map"></div>
                                        <!-- Your map content or iframe -->
                                    </div>
                                </div>
                                <!-- Feature Post Section -->
                                <div class="blog-item-list"><br><br>
                                    <div class="pd-widget">
                                        <br>
                                        <h4>FEATURE POST</h4>
                                    </div>
                                    <?php if ($numRows2 > 0) {
                                        foreach ($datas4 as $data2) { ?>
                                            <div class="blog-item">
                                                <div class="bi-pic">
                                                    <img src="<?php echo "img/post/" . $data2['photo'] ?>" style="" height="200" width="300" alt="">
                                                </div>
                                                <div class="bi-text">
                                                    <h5>
                                                        <?php echo $data2['post_title'] ?>
                                                    </h5>
                                                    <ul>
                                                        <li>
                                                            <?php echo $data2['post_desc'] ?>
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        <?php echo $data2['post_date'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <p class="h4 text-muted mb-5 mt-0 pt-0">No available post</p>
                                    <?php } ?>
                                </div>
                                <!-- Reviews Section -->
                                <div class="blog-details-content">
                                    <div class="bc-widget">
                                        <h4>
                                            <?php echo $numRows3 . " REVIEWS" ?>
                                        </h4>
                                        <div class="comment-option">
                                            <?php
                                            for ($i = 0; $i < 5 && $i < count($datas5); $i++) {
                                                $data5 = $datas5[$i];
                                                $dateString = $data5['curr_time'];
                                                $timestamp = strtotime($dateString);
                                                $formattedDate = date('F j, Y', $timestamp);
                                            ?>
                                                <div class="co-item">
                                                    <div class="ci-pic">
                                                        <?php if ($data5['photo'] != null && $data5['photo'] != " ") { ?>
                                                            <img src="<?php echo "img/profile-picture/" . $data5['photo'] ?>" alt="">
                                                        <?php } else { ?>
                                                            <img src="img/testimonial-author/unknown.jpg" alt="User's Name">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="ci-text">
                                                        <h5>
                                                            <?php echo $data5['Firstname'] . ' ' . $data5['MiddleName'] . ' ' . $data5['Surname'] ?>
                                                        </h5>
                                                        <div class="pr-rating">
                                                            <?php for ($j = 0; $j < $data5['rating']; $j++) { ?>
                                                                <i class="fa fa-star"></i>
                                                            <?php } ?>
                                                        </div>
                                                        <p>
                                                            <?php echo $data5['comment'] ?>
                                                        </p>
                                                        <ul>
                                                            <li><i class="fa fa-clock-o">
                                                                    <?php echo ' ' . $formattedDate ?>
                                                                </i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <?php if ($data5['bus_reply'] != null && $data5['bus_reply'] != " ") { ?>
                                                    <div class="co-item reply-item">
                                                        <div class="ci-pic">
                                                            <img src="<?php echo "img/logo/" . $data5['Businesslogo'] ?>" alt="">
                                                        </div>
                                                        <div class="ci-text">
                                                            <h5>
                                                                <?php echo $data5['BusinessName'] ?>
                                                            </h5>
                                                            <p>
                                                                <?php echo $data5['bus_reply'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                            <?php }
                                            }
                                            ?>
                                            <div id="UIcommentAndRating"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Leave a Comment Section -->
                                <div class="pd-widget" id="Ratee">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <h4>LEAVE A COMMENT</h4><br>
                                        </div>
                                        <?php if ($numRows6 === 0 || !isset($_SESSION['ownerId'])) { ?>
                                            <div class="row">
                                                <fieldset id="ratingUi" class="rating">
                                                    <!-- Rating UI -->
                                                    <input type="radio" id="star5" name="rating" value="5" />
                                                    <label for="star5">5 stars</label>
                                                    <input type="radio" id="star4" name="rating" value="4" />
                                                    <label for="star4">4 stars</label>
                                                    <input type="radio" id="star3" name="rating" value="3" />
                                                    <label for="star3">3 stars</label>
                                                    <input type="radio" id="star2" name="rating" value="2" />
                                                    <label for="star2">2 stars</label>
                                                    <input type="radio" id="star1" name="rating" value="1" />
                                                    <label for="star1">1 star</label>
                                                </fieldset>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <form class="review-form">
                                        <textarea placeholder="Leave a Comment" id="commentVal"></textarea>
                                        <?php // if (isset($_SESSION['ownerId'])) { 
                                        ?>
                                        <input type="hidden" value="<?php echo $_SESSION['ownerId'] ?>" id="commentAndRatingId">
                                        <?php // } 
                                        ?>
                                        <input type="hidden" value="<?php echo $nameCommentRate ?>" id="nameUserComment">
                                        <?php // if (isset($_SESSION['photo'])) { 
                                        ?>
                                        <input type="hidden" value="<?php echo $_SESSION['photo'] ?>" id="photoCommentVal">
                                        <?php // } 
                                        ?>
                                        <input type="hidden" value="<?php echo $id ?>" id="commentRatingBusId">
                                        <button type="button" onclick="commentAndRating('<?php echo $numRows6 ?>')" class="site-btn">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Section -->
                        <div class="col-lg-4">
                            <div class="property-sidebar">
                                <div class="blog-sidebar">
                                    <div class="follow-us">
                                        <br><br>
                                        <?php echo $socialMedia; ?>
                                    </div>
                                </div>
                                <div class="section-title sidebar-title">
                                    <h5>We're Hiring!</h5>
                                </div>
                                <?php
                                if ($role == 3 || $role == '') {
                                    foreach ($datas as $index => $data) {
                                        $businessLogo = $data['Businesslogo'];
                                        $pos = $data['pos_vacant'];
                                        $jobDes = $data['job_desc'];
                                        $modalId = 'modal_' . $index;
                                        $jobSpec = $data['job_spec'];
                                        $degree = $data['degree'];
                                        $salary = $data['salary'];
                                        $yearExp = $data['year_exp'];
                                        $bus_applicant_id = $data['bus_applicant'];
                                        $user_id = $_SESSION['ownerId'];
                                ?>
                                        <!-- Hiring Modal -->
                                        <div class="single-sidebar m-0 p-0">
                                            <div class="top-agent">
                                                <div class="ta-item">
                                                    <div class="ta-pic set-bg" data-setbg="img/job/381351858_340934731618300_4699644083071352903_n.png"></div>
                                                    <div class="ta-text">
                                                        <h6><a><?php echo $data['pos_vacant'] ?></a></h6>
                                                        <!-- Pass the JavaScript variables as separate parameters to openModal -->
                                                        <button onclick="openModal('<?php echo $businessLogo ?>', '<?php echo $pos ?>', '<?php echo $jobDes ?>', '<?php echo $modalId ?>', '<?php echo $jobSpec ?>', '<?php echo $degree ?>', '<?php echo $yearExp ?>', '<?php echo $salary ?>', `<?php echo $bus_applicant_id ?>`)" class="btn btn-success">Apply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div id="<?php echo $modalId ?>" style="z-index: 1000; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="modal">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content w-100">
                                                    <div class="modal-header">
                                                        <img src="img/company/jollibee.jpg" alt="Company Logo" class="circle-image" style="margin-right: 5px; border: 2px solid #355E3B;">
                                                        <h3 class="text-center mb-6 font-weight-bold" style="margin-top: 7px;">We're Hiring!</h3>
                                                        <span onclick="closeModal('<?php echo $modalId ?>')" class="close" title="Close Modal">&times;</span>
                                                    </div>
                                                    <div class="container mt-4">
                                                        <div class="card px-2" id="jobBoardForm">
                                                            <div class="job-board">
                                                                <!-- Job Listings -->
                                                                <div class="job-listing">
                                                                    <h4 class="jobTitle"><strong>Manager</strong></h4>
                                                                    <p id="des">The Restaurant Manager is responsible for
                                                                        the development and achievement of the store business
                                                                        objectives such as Sales and Profitability targets,
                                                                        customer satisfaction & Food, Safety and Cleanliness
                                                                        standards; People Management and Development; and
                                                                        Stores adherence to operating systems and standards
                                                                        and
                                                                        compliance to all government requirements.</p>
                                                                    <h6><strong>Job Specification</strong></h6>
                                                                    <ul class="bullet-list">
                                                                        <!-- Additional job specification details -->
                                                                    </ul>
                                                                </div>
                                                                <br>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h6><strong>Additional Information</strong></h6>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="degree"><strong>Degree:</strong>
                                                                            Bachelor's Degree</p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="experience"><strong>Years of
                                                                                Experience:</strong> 3 years</p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="salary"><strong>Years of
                                                                                Experience:</strong> 3 years</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="upload-button">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <br>
                                                                        <h4 style="margin-top: 7px;"><strong>Submit
                                                                                Application</strong></h4>
                                                                    </div>
                                                                    <div class="col text-right">
                                                                        <input type="hidden" id="app_id">
                                                                        <br><button class="btn btn-success" onclick="applyUser('<?php echo $modalId ?>', '<?php echo $user_id ?>')" style="margin-bottom: 20px;">Submit
                                                                            Resume</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else {
                                    ?>
                                    <h3 class="mt-0 mb-5 text-success">This Feature is not available to you</h3>
                                <?php  } ?>
                                <!-- Related Business Section -->
                                <div class="single-sidebar">
                                    <?php
                                    $selectRelatedBusiness = "SELECT * FROM business_list WHERE (BusinessCategory = :bus_category AND bus_id != :id) AND (BusinessStatus = 1 OR BusinessStatus = 4)  LIMIT 2";
                                    $stmt7 = $pdo->prepare($selectRelatedBusiness);
                                    $stmt7->bindParam(':id', $id, PDO::PARAM_STR);
                                    $stmt7->bindParam(':bus_category', $bus_category, PDO::PARAM_STR);
                                    $stmt7->execute();
                                    $datas7 = $stmt7->fetchAll();
                                    $numRows7 = $stmt7->rowCount();
                                    ?>
                                    <div class="section-title sidebar-title">
                                        <h5>Related Business</h5>
                                    </div>
                                    <?php
                                    if ($numRows7 > 0) {
                                        foreach ($datas7 as $data7) { ?>
                                            <div class="top-agent">
                                                <div class="ta-item">
                                                    <div class="ta-pic set-bg" data-setbg=<?php echo 'img/logo/' . $data7['Businesslogo'] ?>></div>
                                                    <div class="ta-text" style="height: fit-content;">
                                                        <h6><a href=<?php echo './details.php?ID=' . $data7['bus_id'] ?>><?php echo $data7['BusinessName'] ?></a></h6>
                                                        <span style="font-size: small;">
                                                            <?php echo $data7['BusinessAddress'] ?>
                                                        </span>
                                                        <div class="ta-num">
                                                            <?php echo $data7['BusinessNumber'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





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

    <!-- <div id="id01" class="modal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true"> -->


    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-76614800-1"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            var map = L.map('map').setView([14.6577, 120.9842], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 18,
            }).addTo(map);

            var caloocanBoundary = L.geoJSON().addTo(map);

            // Load the boundary data and add it to the map
            $.getJSON('boundary.geojson1.json', function(data) {
                caloocanBoundary.addData(data);

                caloocanBoundary.setStyle(function(feature) {
                    return {
                        fillColor: 'transparent',
                        fillOpacity: 0,
                        color: 'black',
                        weight: 0.7
                    };
                });

                caloocanBoundary.eachLayer(function(layer) {
                    layer.bindPopup("Barangay " + layer.feature.properties.NAME_3);
                });

                // Add the marker to the map
                var lat = <?php echo $lat ?>;
                var long = <?php echo $long ?>;
                var name = "<?php echo $bus_name ?>";
                var address = "<?php echo $bus_add ?>";

                var marker = L.marker([lat, long]).addTo(map);

                // Customize the popup for the business marker
                var popupContent = "<b>" + name + "</b><br>Address: " + address;
                marker.bindPopup(popupContent);

                // Set the map view to the marker's coordinates with the desired zoom level (e.g., 15)
                map.setView([lat, long], 15);

            });



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

            fetchData();

            $('#rateUs').click(function() {
                $('html, body').animate({
                    scrollTop: $('#Ratee').offset().top
                }, 1000);
            });

        });

        // for comment and ratings
        let commentsAndRatings = [];
        var currentDate = new Date();
        var options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        var formattedDate = currentDate.toLocaleDateString(undefined, options);

        function commentAndRating(userStats) {
            let comment = $("#commentVal").val();
            let rating = parseInt($("input[name='rating']:checked").val(), 10);
            let userid = $("#commentAndRatingId").val();
            let name = $('#nameUserComment').val();
            let photo = $('#photoCommentVal').val();
            let bus_id = $('#commentRatingBusId').val();

            if (userid == "") {
                openLoginModal();
            } else {
                if (userStats >= 1 && commentsAndRatings.length >= 1) {
                    // If there is already one rating in the array, only add the comment
                    commentsAndRatings[0].comment = comment;
                    let commentAndRating = {
                        comment: comment,
                    };
                    commentsAndRatings.push(commentAndRating);
                } else if (userStats >= 1) {
                    var payload = {
                        comment: comment,
                        rating: rating,
                        userid: userid,
                        bus_id: bus_id
                    };
                    if (!comment) {
                        Swal.fire({
                            title: "Warning",
                            text: "Please input a comment.",
                            icon: "warning",
                            customClass: {
                                confirmButton: 'swal-confirm-button',
                            },
                            showCancelButton: false,
                        });
                        return; // Exit the function if comment is missing
                    }
                } else {
                    var payload = {
                        comment: comment,
                        rating: rating,
                        userid: userid,
                        bus_id: bus_id
                    };

                    if (!rating) {
                        Swal.fire({
                            title: "Warning",
                            text: "Please input a rating.",
                            icon: "warning",
                            customClass: {
                                confirmButton: 'swal-confirm-button',
                            },
                            showCancelButton: false,
                        });
                        return; // Exit the function if rating is missing
                    } else {
                        let commentAndRating = {
                            comment: comment,
                            rating: rating
                        };
                        commentsAndRatings.push(commentAndRating);
                        $('#ratingUi').html("");
                    }
                }

                // Rest of your code, including the AJAX request and UI update
                $.ajax({
                    type: "POST",
                    url: 'controllers/business.php',
                    data: {
                        payload: JSON.stringify(payload),
                        setFunction: 'commentAndRating'
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

                let latestCommentRatingPair = commentsAndRatings[commentsAndRatings.length - 1];


                // Create a new div with the desired structure
                let newDiv = $('<div class="co-item">' +
                    '<div class="ci-pic">' +
                    '<img src="' + photo + '" alt="User Photo">' +
                    '</div>' +
                    '<div class="ci-text">' +
                    '<h5>' + name + '</h5>' +
                    '<div class="pr-rating">' + getStarIcons(latestCommentRatingPair.rating) + '</div>' +
                    '<p>' + latestCommentRatingPair.comment + '</p>' +
                    '<ul>' +
                    '<li><i class="fa fa-clock-o"></i>' + formattedDate + '</li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>');

                // Append the new div to a container (e.g., a parent div with an ID)
                $('#UIcommentAndRating').append(newDiv);
            };
        };


        function getStarIcons(rating) {
            // Generate star icons based on the rating
            let starIcons = '';
            for (let i = 0; i < rating; i++) {
                starIcons += '<i class="fa fa-star" style="margin-right: 2px;"></i>';
            }
            return starIcons;
        };

        function openLoginModal() {
            $("#id01").css("display", "block");
        }

        function hideModal(modalId) {
            $("#" + modalId).modal("hide");
        }

        // Function to open the modal
        function openModal(logo, pos, des, modalId, jobspec, degree, exp, salary, id) {
            // console.log(logo);
            // console.log(pos);
            // console.log(id);
            $('#app_id').val(id);

            var companyLogo = $("#" + modalId).find(".circle-image");
            companyLogo.attr("src", "img/logo/" + logo);

            var p = $("#" + modalId).find("#des");
            p.text(des);

            // Set the job title in the modal header
            var jobTitle = $("#" + modalId).find(".jobTitle");
            jobTitle.text(pos);

            // Clear existing list items in the ul
            var ul = $("#" + modalId).find(".bullet-list");
            ul.empty();

            // Split the jobspec string into an array of items using commas as the delimiter
            var jobspecItems = jobspec.split(",");

            // Loop through the items and create list items
            $.each(jobspecItems, function(index, item) {
                // Remove any leading/trailing whitespace
                item = item.trim();

                // Skip empty items
                if (item !== "") {
                    // Create a new list item and append it to the ul
                    var li = $("<li>").text(item);
                    ul.append(li);
                }
            });

            //note bawal parehas ng parameter yung sa var name
            var degreeElement = $("#" + modalId).find(".degree");
            degreeElement.html('<strong>Degree:</strong> ' + degree);

            var expElement = $("#" + modalId).find(".experience");
            expElement.html('<strong>Experience:</strong> ' + exp);


            var expElement = $("#" + modalId).find(".salary");
            expElement.html('<strong>Salary:</strong> ' + salary);




            // Show the modal using jQuery
            $("#" + modalId).modal("show");
        };

        function closeModal(modalId) {
            $("#" + modalId).modal("hide");
        };

        function applyUser(modalId, user_id) {
            var app_id = $('#app_id').val();

            if (user_id == 0) {
                openLoginModal();
                hideModal(modalId);
            } else {
                var payload = {
                    app_id: app_id,
                    user_id: user_id
                };

                $.ajax({
                    type: "POST",
                    url: 'controllers/users.php',
                    data: {
                        payload: JSON.stringify(payload),
                        setFunction: 'applyJobUser'
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
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        };




        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-76614800-1');

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
                // console.log(payload)
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
                    if (data.role == 1) {
                        setTimeout(function() {
                            window.location.href = "CEIPO/client/index.php";
                        }, 2000);

                    } else {
                        if (data.status == "success") {
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        }
                    }
                    //for normal UI AHAHAHHAHAHA
                    // swal.fire(data.title, data.message, data.icon);
                }
            });



        };


        function fetchData() {
            // Make an AJAX request to fetch data from the server
            $.ajax({
                url: 'fetchUserData.php', // Replace 'fetchUserData.php' with the actual file path to fetch data from your server
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
                    // Handle error
                }
            });
        }
    </script>
</body>

</html>