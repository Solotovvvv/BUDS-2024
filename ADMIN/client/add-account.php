<?php
require_once '../../includes/config.php';

$pdo = Database::connection();

if (isset($_POST['add'])) {
  try {
    $surname = $_POST['surname'];
    $first_name = $_POST['firstname'];
    $middle_name = $_POST['middlename'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $contact_number = $_POST['contactnumber'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $hashedPassword = sha1($password);
    
    
    $confirm_password = $_POST['confirmpassword'];
    $user_type = "1";

    // Start a transaction
    $pdo->beginTransaction();

    $sql = "INSERT INTO login (email, password, userType) VALUES (:email, :password, :usertype)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':usertype', $user_type);

    if ($stmt->execute()) {
      $login_id = $pdo->lastInsertId();

      $sql1 = "INSERT INTO owner_list(log_id, Surname, Firstname, MiddleName, Email, contactNumber, Address, Sex, Birthday, Age) VALUES
                                  (:log_id, :surname, :firstname, :middlename, :email, :contactnumber, :address, :gender, :birthday, :age)";
      $stmt1 = $pdo->prepare($sql1);
      $stmt1->bindParam(':log_id', $login_id);
      $stmt1->bindParam(':surname', $surname);
      $stmt1->bindParam(':firstname', $first_name);
      $stmt1->bindParam(':middlename', $middle_name);
      $stmt1->bindParam(':email', $email);
      $stmt1->bindParam(':contactnumber', $contact_number);
      $stmt1->bindParam(':address', $address);
      $stmt1->bindParam(':gender', $gender);
      $stmt1->bindParam(':birthday', $birthday);
      $stmt1->bindParam(':age', $age);

      if ($stmt1->execute()) {
        // Commit the transaction if both inserts succeed
        $pdo->commit();
      } else {
        // Rollback the transaction if the second insert fails
        $pdo->rollback();
        echo "Error: Failed to insert into the 'login' table.";
      }
    } else {
      // Rollback the transaction if the first insert fails
      $pdo->rollback();
      echo "Error: Failed to insert into the 'owner_list' table.";
    }

  } catch (PDOException $e) {
    // Handle any exceptions and errors here
    echo "Error: " . $e->getMessage();
  }
  $pdo = null;
}

if (isset($_POST['update'])) {
  try {
      $id             = $_POST['update_id'];
      $surname        = $_POST['up_surname'];
      $first_name     = $_POST['up_firstname'];
      $middle_name    = $_POST['up_middlename'];
      $email          = $_POST['up_email'];
      $username       = $_POST['up_username'];
      $contact_number = $_POST['up_contactnumber'];
      $address        = $_POST['up_address'];
      $gender         = $_POST['up_gender'];
      $birthday       = $_POST['up_birthday'];
      $age            = $_POST['up_age'];
      $password       = md5($_POST['up_password']);
      $cpassword      = md5($_POST['up_confirmpassword']);

        $sql = "UPDATE owner_list AS o
        INNER JOIN login AS l ON o.log_id = l.ID
        SET
            o.Surname = :up_surname,
            o.Firstname = :up_firstname,
            o.MiddleName = :up_middlename,
            o.Email = :up_email,
            o.contactNumber = :up_contactnumber,
            o.Address = :up_address,
            o.Sex = :up_gender,
            o.Birthday = :up_birthday,
            o.Age = :up_age,
            l.email = :up_username,
            l.password = :up_password
        WHERE
            o.log_id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':up_surname', $surname);
      $stmt->bindParam(':up_firstname', $first_name);
      $stmt->bindParam(':up_middlename', $middle_name);
      $stmt->bindParam(':up_email', $email);
      $stmt->bindParam(':up_contactnumber', $contact_number);
      $stmt->bindParam(':up_address', $address);
      $stmt->bindParam(':up_gender', $gender);
      $stmt->bindParam(':up_birthday', $birthday);
      $stmt->bindParam(':up_age', $age);
      $stmt->bindParam(':up_username', $username);
      $stmt->bindParam(':up_password', $password);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      

  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  $pdo = null; // Use $conn to close the connection
}



if (isset($_POST['delete'])) {
    try {
      $id = $_POST['id_rec'];

        $sql = "DELETE o, l
                FROM owner_list AS o
                INNER JOIN login AS l ON o.log_id = l.ID
                WHERE o.log_id = :id AND l.ID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
        $pdo = null;
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="plugins/assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BuDS | Admin Panel</title>
  <meta name="description" content="">
  <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet">
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
              <li class="list-inline-block menu-item active">
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
                  <li class="menu-item active">
                    <a href="business-category.php" class="menu-link active">
                      <div data-i18n="Without navbar">Buisness Category </div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item">
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
              <li class="menu-item active">
                <a href="add-account.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-user-plus"></i>
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
                  <h3 class="card-title">Add Account</h3>
                  <div class="d-grid gap- d-sm-flex justify-content-md-start">
                    <button class="btn btn-success me-sm-2" type="button" data-bs-toggle="modal"
                          data-bs-target="#modalCenter"><i class="bx bx-printer"></i> Add Account</button>
                  </div>
                  <hr>
                </div>

                <!-- TABLE/LIST OF ACCOUNTS -->
                <div class="card-body">
                  <div class="table-responsive">
                    <form action="add-account.php" method="post">
                    <table id="Ajax1" class="table table-bordered table-striped">
                      <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>First Name</th>
                                  <th>Middle Name</th>
                                  <th>Surname</th>
                                  <th>Gender</th>
                                  <th>Email</th>
                                  <th>Username</th>
                                  <th>Contact Number</th>
                                  <th>Age</th>
                                  <th>Birthday</th>
                                  <th>Address</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              try {
                                  $conn = Database::connection();

                                  $sql = "SELECT o.ID AS OwnerID, o.Surname, o.Firstname, o.MiddleName, o.Email AS OwnerEmail, o.contactNumber, o.Address, o.Sex, o.Birthday, o.Age,
                                           l.ID AS LoginID, l.email AS LoginEmail, l.password, l.userType
                                            FROM owner_list o
                                            JOIN login l ON o.log_id = l.ID
                                            WHERE l.userType = '1'";

                                  $stmt = $conn->prepare($sql);
                                  $stmt->execute();
                                  // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                  // var_dump($results);

                                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<tr>
                                              <td>" . $row["LoginID"] . "</td>
                                              <td>" . $row["Firstname"] . "</td>
                                              <td>" . $row["MiddleName"] . "</td>
                                              <td>" . $row["Surname"] . "</td>
                                              <td>" . $row["Sex"] . "</td>
                                              <td>" . $row["OwnerEmail"] . "</td>
                                              <td>" . $row["LoginEmail"] . "</td>
                                              <td>" . $row["contactNumber"] . "</td>
                                              <td>" . $row["Age"] . "</td>
                                              <td>" . $row["Birthday"] . "</td>
                                              <td>" . $row["Address"] . "</td>
                                              <td>
                                                  <div class='text-center' role='group'>
                                                      <input type='hidden' name='id_rec' value='" . $row["LoginID"] . "'>
                                                      <button class='btn btn-danger' type='submit' name='delete' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete'><i class='bx bx-trash'></i></button>
                                                      <button type='button' class='btn btn-success updatebtn'><i class='bx bx-edit'></i></button>
                                                  </div>
                                              </td>
                                          </tr>";
                                  }
                              } catch (PDOException $e) {
                                  echo "Error: " . $e->getMessage();
                              }
                              $conn = null;
                              ?>
                          </tbody>
                        </table>
                    </form>
                  </div>
                </div>



      <!-- MODAL FOR ADDING ACCOUNT -->
                <form action="add-account.php" method="post">
                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="modalCenterTitle"><b>Add Account</b></h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <hr>


                            <div class="modal-body">
                            <div id="errorMessageContainer"></div>
                                <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">First Name</label>
                                      <input
                                        type="text"
                                        name="firstname"
                                        id="nameWithTitle"
                                        class="form-control"
                                        placeholder="First Name"
                                      />
                                </div>
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Middle Name</label>
                                  <input
                                    type="text"
                                    name="middlename"
                                    id="nameWithTitle"
                                    class="form-control"
                                    placeholder="Middle Name"
                                  />
                                </div>
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Surname</label>
                                  <input
                                    type="text"
                                    name="surname"
                                    id="nameWithTitle"
                                    class="form-control"
                                    placeholder="Last Name"
                                  />
                                </div>
                                <div class="col mb-3">
                                  <label for="gender" class="form-label">Gender</label>
                                    <div class="form-check">
                                      <label for="female" class="form-check-label">Female</label>
                                      <input
                                        type="radio"
                                        name="gender"
                                        id="female"
                                        class="form-check-input"
                                        value="Female">
                                    </div>
                                    <div class="form-check">
                                      <label for="male" class="form-check-label">Male</label>
                                      <input
                                        type="radio"
                                        name="gender"
                                        id="male"
                                        class="form-check-input"
                                        value="Male">
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Email</label>
                                  <input
                                    type="text"
                                    name="email"
                                    id="nameWithTitle"
                                    class="form-control"
                                    placeholder="example@email.com"
                                  />
                                </div>
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Username</label>
                                  <input
                                    type="text"
                                    name="username"
                                    id="nameWithTitle"
                                    class="form-control"
                                    placeholder="username"
                                  />
                                </div>
                                <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Contact Number</label>
                                  <input
                                    type="tel"
                                    name="contactnumber"
                                    id="nameWithTitle"
                                    class="form-control"
                                    placeholder="1234-567-891011"
                                    pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}"

                                  />
                                </div>
                              </div>
                              <div class="row g-2">
                                <div class="col mb-3">
                                  <label for="emailWithTitle" class="form-label">Age</label>
                                  <input
                                    type="text"
                                    name="age"
                                    id="emailWithTitle"
                                    class="form-control"
                                  />
                                </div>
                                <div class="col mb-3">
                                    <label for="emailWithTitle" class="form-label">Birthday</label>
                                    <input
                                      type="date"
                                      name="birthday"
                                      id="emailWithTitle"
                                      class="form-control"
                                    />
                                </div>
                                <div class="col mb-3">
                                  <label for="emailWithTitle" class="form-label">Address</label>
                                  <input
                                    type="text"
                                    name="address"
                                    id="emailWithTitle"
                                    class="form-control"
                                    placeholder="Address"
                                  />
                                </div>
                              </div>
                              <div class="row g-2">
                                <div class="col mb-0">
                                  <label for="emailWithTitle" class="form-label">Password</label>
                                  <input
                                    type="password"
                                    name="password"
                                    id="passWithTitle"
                                    class="form-control"
                                    placeholder="Password"
                                  />
                                </div>
                                <div class="col mb-0">
                                  <label for="emailWithTitle" class="form-label"> Confirm Password</label>
                                  <input
                                    type="password"
                                    name="confirmpassword"
                                    id="cpassWithTitle"
                                    class="form-control"
                                    placeholder="Confirm Password"
                                  />
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer" style="padding: 20px;">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="add" class="btn btn-success">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  </form>

                  <!-- MODAL FOR UPDATING ACCOUNT -->
                  <form class="" action="add-account.php" method="post">
                  <div class="modal fade" id="editmodal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="modalCenterTitle"><b>Update Account</b></h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <hr>


                            <div class="modal-body">
                            <div id="errorMessageContainer"></div>
                                <div class="row">
                                    <div class="col mb-3">
                                      <input type="hidden" name="update_id" id="update_id">
                                      <label class="form-label">First Name</label>
                                      <input
                                        type="text"
                                        name="up_firstname"
                                        id="firstname"
                                        class="form-control"
                                        value=""
                                      />
                                </div>
                                <div class="col mb-3">
                                  <label class="form-label">Middle Name</label>
                                  <input
                                    type="text"
                                    name="up_middlename"
                                    id="middlename"
                                    class="form-control"
                                    placeholder="Middle Name"
                                  />
                                </div>
                                <div class="col mb-3">
                                  <label class="form-label">Surname</label>
                                  <input
                                    type="text"
                                    name="up_surname"
                                    id="surname"
                                    class="form-control"
                                    placeholder="Last Name"
                                  />
                                </div>
                                <div class="col mb-3">
                                  <label class="form-label">Gender</label>
                                    <div class="form-check">
                                      <label class="form-check-label">Female</label>
                                      <input
                                        type="radio"
                                        name="up_gender"
                                        id="female"
                                        class="form-check-input"
                                        value="Female">
                                    </div>
                                    <div class="form-check">
                                      <label class="form-check-label">Male</label>
                                      <input
                                        type="radio"
                                        name="up_gender"
                                        id="male"
                                        class="form-check-input"
                                        value="Male">
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label class="form-label">Email</label>
                                  <input
                                    type="text"
                                    name="up_email"
                                    id="email"
                                    class="form-control"
                                    placeholder="example@email.com"
                                  />
                                </div>
                                <div class="col mb-3">
                                  <label class="form-label">Username</label>
                                  <input
                                    type="text"
                                    name="up_username"
                                    id="LoginEmail"
                                    class="form-control"
                                    placeholder="username"
                                  />
                                </div>
                                <div class="col mb-3">
                                  <label class="form-label">Contact Number</label>
                                  <input
                                    type="tel"
                                    name="up_contactnumber"
                                    id="contactnumber"
                                    class="form-control"
                                    placeholder="1234-567-891011"
                                    pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}"
                                  />
                                </div>
                              </div>
                              <div class="row g-2">
                                <div class="col mb-3">
                                  <label  class="form-label">Age</label>
                                  <input
                                    type="text"
                                    name="up_age"
                                    id="age"
                                    class="form-control"
                                  />
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Birthday</label>
                                    <input
                                      type="date"
                                      name="up_birthday"
                                      id="birthday"
                                      class="form-control"
                                    />
                                </div>
                                <div class="col mb-3">
                                  <label class="form-label">Address</label>
                                  <input
                                    type="text"
                                    name="up_address"
                                    id="address"
                                    class="form-control"
                                    placeholder="Address"
                                  />
                                </div>
                              </div>
                              <div class="row g-2">
                              <div class="col mb-0">
                                  <label class="form-label">Old Password</label>
                                  <label class="form-label">Note: This is too long because of the encryption.</label>
                                  <input
                                    type="password"
                                    name="up_oldpassword"
                                    id="oldpassword"
                                    class="form-control"
                                    placeholder="Password"
                                  />
                                </div>
                                <div class="col mb-0">
                                  <label class="form-label">New Password</label>
                                  <input
                                    type="password"
                                    name="up_password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Password"
                                  />
                                </div>
                                <div class="col mb-0">
                                  <label class="form-label"> Confirm Password</label>
                                  <input
                                    type="password"
                                    name="up_confirmpassword"
                                    id="confirmpassword"
                                    class="form-control"
                                    placeholder="Confirm Password"
                                  />
                                </div>

                              </div>
                            </div>
                            <div class="modal-footer" style="padding: 20px;">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="update" class="btn btn-success">Update</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
      $('#Ajax1').DataTable();

      $('.updatebtn').on('click', function() {
        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);
        $('#update_id').val(data[0]);
        $('#firstname').val(data[1]);
        $('#middlename').val(data[2]);
        $('#surname').val(data[3]);

        // Check gender radio buttons based on data[4] (Assuming data[4] represents gender)
       var gender = data[4]; // Assuming data[4] represents gender
       $('input[name="up_gender"]').filter(function() {
         return $(this).val() === gender;
       }).prop('checked', true);


        $('#email').val(data[5]);
        $('#LoginEmail').val(data[6]);
        $('#contactnumber').val(data[7]);
        $('#age').val(data[8]);
        $('#birthday').val(data[9]);
        $('#address').val(data[10]);
        $('#oldpassword').val(data[11]);
        // $('#password').val(data[11]);
        // $('#confirmpassword').val(data[11]);

      });
    });
</script>

//update acc
<script>
  $(document).ready(function () {
    $('#editmodal').on('hidden.bs.modal', function () {
      // Clear input fields and error message when the modal is hidden
      $('form').trigger('reset');
      $('#errorMessageContainer').empty();
    });

    $('form').submit(function (event) {
      // Check password match before form submission
      var password = $('#password').val();
      var confirmPassword = $('#confirmpassword').val();

      if (password !== confirmPassword) {
        // Display error message in the modal
        var errorMessage = '<div class="alert alert-danger">Password and Confirm Password do not match.</div>';
        $('#errorMessageContainer').html(errorMessage);

        // Prevent form submission
        event.preventDefault();
      }
    });
  });
</script>

//adding acc
<script>
  $(document).ready(function () {
    $('#modalCenter').on('hidden.bs.modal', function () {
      // Clear input fields and error message when the modal is hidden
      $('form').trigger('reset');
      $('#errorMessageContainer').empty();
    });

    $('form').submit(function (event) {
      // Check password match before form submission
      var password = $('#passWithTitle').val();
      var confirmPassword = $('#cpassWithTitle').val();

      if (password !== confirmPassword) {
        // Display error message in the modal
        var errorMessage = '<div class="alert alert-danger">Password and Confirm Password do not match.</div>';
        $('#errorMessageContainer').html(errorMessage);

        // Prevent form submission
        event.preventDefault();
      }
    });
  });
</script>


</body>
</html>
