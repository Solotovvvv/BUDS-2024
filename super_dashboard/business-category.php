<?php
session_start();
if(empty( $_SESSION['admin_user'] )){
header('Location: ../index.php'); // Redirect to the login page if ownerId is not set
    exit;
}
require_once '../includes/config.php';

$pdo = Database::connection();


if(isset($_POST['add_category'])){
    try{
       
        $category = $_POST['categories'];

        $sql="INSERT INTO category_list (category) VALUES (:category)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':category',$category);
        if ($stmt->execute()) {
          echo '<script>alert("Category Inserted Sucessfully!")</script>';
        }else {
          echo '<script>alert("Category Not Inserted Sucessfully!")</script>';
        }
    }catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
    $pdo = null;

}

if (isset($_POST['add_subcategory'])) {
  try {
    $category = $_POST['subcategoryCategory'];
    $subcategory = $_POST['subcategories'];
    $tags = implode(",",$_POST['tags']);

      $sql = "INSERT INTO subcategory_list(`catId`, `subCategory`, `tags`) VALUES (:catId, :subcategory, :tags)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':catId',$category);
      $stmt->bindParam(':subcategory',$subcategory);
      $stmt->bindParam(':tags',$tags);
      if ($stmt->execute()) {
        echo '<script>alert("Sub Category Inserted Sucessfully!")</script>';
      }else {
        echo '<script>alert("Sub Category Not Inserted Sucessfully!")</script>';
      }
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
  <title>SUPER ADMIN DASHBOARD</title>
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
                    <li class="list-inline-block menu-item">
                      <a href="approval-registration.php" class="menu-link">
                        <div data-i18n="Without navbar">Approval of Registration</div>
                      </a>
                    </li>
                    <li class="list-inline-block menu-item">
                      <a href="business-applicant-status.php" class="menu-link">
                        <div data-i18n="Without menu">Business Applicant Status</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item open active">
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
                      <a href="business-category.php" class="menu-link">
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
                <li class="menu-item">
                  <a href="posting-activities.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-edit"></i>
                    <div data-i18n="Analytics">Posting Activities/Events</div>
                  </a>
                </li>
                <li class="menu-item">
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


    <!-- BUSINESS CATEGORIES TABLE -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Business Categories</h3>
                  <button class="btn btn-success me-sm-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#modalCenter"><i class="bx bx-printer"></i> Add Categories</button>
                  <button class="btn btn-success me-sm-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#modalCenter1"><i class="bx bx-printer"></i> Add Sub Categories</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="Ajax1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>CATEGORY</th>
                          <th>SUBCATEGORY</th>
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        try {
                          $pdo = Database::connection();

                            $sql = "SELECT cl.category AS CATEGORY, sl.subCategory AS SUB_CATEGORY
                                    FROM category_list cl
                                    LEFT JOIN subcategory_list sl ON cl.ID = sl.catId
                                    ORDER BY cl.category, sl.subCategory";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // var_dump($results);

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>
                                        <td>" . $row["CATEGORY"] . "</td>
                                        <td>" . $row["SUB_CATEGORY"] . "</td>
                                        <td>
                                            <div class='text-center' role='group'>
                                                <button class='btn btn-danger' type='submit' name='delete' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete'><i class='bx bx-trash'></i></button>
                                                <button type='button' class='btn btn-success updatebtn'><i class='bx bx-edit'></i></button>
                                            </div>
                                        </td>
                                    </tr>";
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $pdo = null;
                        ?>
                      </tbody>
                    </table>

                    <form class="" action="business-category.php" method="post">
                      <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Add Categories</h5>
                            <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col mb-3">
                                <label class="form-label">Category</label>
                                <input
                                  type="text"
                                  name="categories"
                                  class="form-control"
                                  placeholder="Enter Category"
                                />
                              </div>
                            </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">
                              Close
                            </button>
                            <button type="submit" name="add_category" class="btn btn-success">Save changes</button>
                          </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
   <!-- START OF SUB CATEGORY -->
   <form class="" action="business-category.php" method="post">
        <div class="modal fade" id="modalCenter1" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add Sub Categories</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-3">
                    <label class="form-label">Categories: </label>
                      <select id="subcategoryCategory" name="subcategoryCategory" onchange="enableSubcategoryInput()">

                        <option value="">SELECT CATEGORY</option>
                        <?php
                        try{
                            $conn = Database::connection();


                            $sql = "SELECT * FROM category_list";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo '<option value="'.$row['ID'].'">'.$row['category'].'</option>';
                            }

                        }catch(PDOException $e){
                            echo "Error: " . $e->getMessage();
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <p>Note: Please select a category first before adding a subcategory</p>
                <div class="row">
                  <div class="col mb-3">
                    <label class="form-label">Add Sub Category:</label>
                    <input type="text" name="subcategories" class="form-control" placeholder="Enter Sub Category" id="subcategoryInput" disabled/>
                  </div>
                </div>
                <label class="form-label">Tags: </label>
                <div id="show_item">
                  <div class="row">
                    <div class="col">
                             <div class="input-group">
                                <input type="text" name="tags[]" placeholder="Enter Tags" class="form-control">
                                <button class="bx bx-plus btn-success add_item_btn"></button>
                              </div>
                          </div>
                    </div>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="submit" name="add_subcategory" class="btn btn-success">Save</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    <!-- END OF SUBCATEGORY -->
      </section>
      <!-- END OF BUSINESS CATEGORIES -->

      <!-- BUSINESS SUB CATEGORIES -->
      <!-- <form class="" action="business-category.php" method="post">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Business Sub Categories</h3>
                  <p>Note: Please select a category to view its subcategories</p>
                  <select id="category" name="category" onchange="get_subcategory()">
                    <option value="">SELECT CATEGORY</option>
                    <?php
                    try{
                        $conn = Database::connection();


                        $sql = "SELECT * FROM category_list";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row['ID'].'">'.$row['category'].'</option>';
                        }

                    }catch(PDOException $e){
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                </select>
                <br>
                <button class="btn btn-success me-sm-2" type="button" data-bs-toggle="modal"
                      data-bs-target="#modalCenter1"><i class="bx bx-printer"></i> Add  Sub Categories</button>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table id="Ajax1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Sub Category</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="tableBody">

                      </tbody>
                    </table>

                    <div class="modal fade" id="modalCenter1" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Add Sub Categories</h5>
                            <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col mb-3">
                                <label class="form-label">Categories: </label>
                                <select id="subcategoryCategory" name="subcategoryCategory" onchange="enableSubcategoryInput()">

                                  <option value="">SELECT CATEGORY</option>
                                  <?php
                                  try{
                                      $conn = Database::connection();


                                      $sql = "SELECT * FROM category_list";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->execute();
                                      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                          echo '<option value="'.$row['ID'].'">'.$row['category'].'</option>';
                                      }

                                  }catch(PDOException $e){
                                      echo "Error: " . $e->getMessage();
                                  }
                                  ?>
                              </select>
                              </div>
                            </div>
                            <p>Note: Please select a category first before adding a subcategory</p>
                            <div class="row">
                              <div class="col mb-3">
                                <label class="form-label">Add Sub Category:</label>
                                <input
                              type="text"
                              name="subcategories"
                              class="form-control"
                              placeholder="Enter Sub Category"
                              id="subcategoryInput"
                              disabled
                            />
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">
                              Close
                            </button>
                            <button type="submit" name="add_subcategory" class="btn btn-success">Save</button>
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
      </form> -->
      <!-- END OF BUSINESS SUB CATEGORIES -->
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

        $(".add_item_btn").click(function(e){
          e.preventDefault();
          $("#show_item").prepend(
            `<div class="row">
              <div class="col">
                       <div class="input-group">
                          <input type="text" name="tags[]" placeholder="Enter Tags" class="form-control">
                          <button class="bx bx-x btn-danger remove_item_btn"></button>
                        </div>
                    </div>
              </div>`)
        });
        $(document).on('click', '.remove_item_btn', function(e){
          e.preventDefault();
          let row_item = $(this).parent().parent();
          $(row_item).remove();
        });
      });

  //   function get_subcategory() {
  //   var category = $('#category').val();
  //   console.log('Selected Category:', category); // Add this line
  //   $.ajax({
  //     url: 'ajax.php',
  //     method: 'POST',
  //     data: { category: category },
  //     success: function (data) {
  //       console.log("AJAX success:", data);
  //       $("#tableBody").html(data);
  //     }
  //   });
  // }

  function enableSubcategoryInput() {
    var selectedCategory = $('#subcategoryCategory').val(); // Use the correct select element ID
    console.log("Selected Category:", selectedCategory); // Log the selected category value for debugging

    if (selectedCategory !== '') {
        $('#subcategoryInput').prop('disabled', false);
    } else {
        $('#subcategoryInput').prop('disabled', true);
    }
}


    </script>

</body>
</html>
