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

<style>
  /* Custom CSS */
  .stepper-container {
    text-align: center;
  }

  .stepper-content {
    display: none;
  }

  .stepper-content.active {
    display: block;
  }

  .stepper-content {
    border: 1px solid gray;
    padding: 1rem;
  }

  .progress {
    margin-top: 1rem;
  }

  .progress-bar {
    width: 0%;
    height: 20px;
    background-color: #067335;
  }

  .swal2-container {
    z-index: 100001;
  }

  #loaderOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
  }

  .loader {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
    margin-bottom: 10%;
  }

  .loader-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding-top: 5%;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }
</style>

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


          <li class="menu-item open active">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bxs-buildings"></i>
              <div data-i18n="Layouts">Business Application</div>
              <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger rounded-circle"></span>
            </a>


            <ul class="menu-sub list-inline">
              <li class="list-inline-block menu-item active">
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
          <li class="menu-item">
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
                    <h3 class="card-title">Approval of Registration</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="approval_tbl" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Company Name</th>
                            <th>Owner</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
        </section>
      </div>

      <!-- modal view  -->
      <div class="modal fade" id="view" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Business Applicant</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="stepper-container">
                <!-- Step 1 -->
                <div class="stepper-content active" id="step1">
                  <h3>DETAILS</h3>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Business Name</label>
                      <input type="text" id="business_name" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Business Branch</label>
                      <input type="text" id="branch" class="form-control" placeholder="Enter Name" readonly />
                    </div>

                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Cardinal Location</label>
                      <input type="text" id="cardinal_location" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Business Category</label>
                      <input type="text" id="category" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Business Sub-Category</label>
                      <input type="text" id="sub_category" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                  </div>


                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Business Owner</label>
                      <input type="text" id="owner" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Established</label>
                      <input type="text" id="date" class="form-control" placeholder="Enter Name" readonly />
                    </div>

                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Opening-Closing Hours</label>
                      <input type="text" id="hours_operated" class="form-control" placeholder="Enter Name" readonly />
                    </div>

                  </div>

                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Address</label>
                      <input type="text" id="address" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Barangay</label>
                      <input type="text" id="barangay" class="form-control" placeholder="Enter Name" readonly />
                    </div>

                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Zone</label>
                      <input type="text" id="zone" class="form-control  mt-2" placeholder="Enter Name" readonly />
                    </div>
                  </div>
                </div>

                <!-- Step 2 -->
                <div class="stepper-content" id="step2">

                  <h3>Brgy Clearance</h3>
                  <img id="busBrgyClearanceImage" src="" alt="Barangay Clearance" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                  <p class="no-image-text" style="display: none;">No requirements found</p>
                  <!-- Other content for Step 2 here -->

                  <br>

                  <div class="mt-4">
                    <button type="button" class="btn btn-success" id="passedStep2">Approve</button>
                    <button type="button" class="btn btn-danger" id="failedStep2">Decline</button>
                    <span id="step2_Status" style="font-size: 100px; display: none;">APPROVED</span>
                    <input type="text" class="form-control mt-2" id="remarksStep2" placeholder="Enter remarks" style="display: none;">

                  </div>



                </div>

                <!-- Step 3 -->
                <div class="stepper-content" id="step3">
                  <h3>DTI Permit</h3>
                  <img id="busDtiPermitImage" src="" alt="DTI Permit" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                  <p class="no-image-text" style="display: none;">No requirements found</p>
                  <!-- Other content for Step 3 here -->

                  <br>
                  <div class="mt-4">
                    <button type="button" class="btn btn-success" id="passedStep3">Approve</button>
                    <button type="button" class="btn btn-danger" id="failedStep3">Decline</button>
                    <span id="step3_Status" style="font-size: 100px; display: none;">APPROVED</span>
                    <input type="text" class="form-control mt-2" id="remarksStep3" placeholder="Enter remarks" style="display: none;">
                  </div>
                </div>

                <!-- Step 4 -->
                <div class="stepper-content" id="step4">
                  <h3>Sanitary Permit</h3>
                  <img id="busSanitaryPermitImage" src="" alt="Sanitary Permit" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                  <p class="no-image-text" style="display: none;">No requirements found</p>
                  <!-- Other content for Step 4 here -->

                  <br>
                  <div class="mt-4">
                    <button type="button" class="btn btn-success" id="passedStep4">Approve</button>
                    <button type="button" class="btn btn-danger" id="failedStep4">Decline</button>
                    <span id="step4_Status" style="font-size: 100px; display: none;">APPROVED</span>
                    <input type="text" class="form-control mt-2" id="remarksStep4" placeholder="Enter remarks" style="display: none;">
                  </div>
                </div>

                <!-- Step 5 -->
                <div class="stepper-content" id="step5">
                  <h3> Cedula </h3>
                  <img id="busCedulaImage" src="" alt="Cedula" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                  <p class="no-image-text" style="display: none;">No requirements found</p>
                  <!-- Other content for Step 5 here -->

                  <br>
                  <div class="mt-4">
                    <button type="button" class="btn btn-success" id="passedStep5">Approve</button>
                    <button type="button" class="btn btn-danger" id="failedStep5">Decline</button>
                    <span id="step5_Status" style="font-size: 100px; display: none;">APPROVED</span>
                    <input type="text" class="form-control mt-2" id="remarksStep5" placeholder="Enter remarks" style="display: none;">
                  </div>
                </div>

                <!-- Step 6 -->
                <div class="stepper-content" id="step6">
                  <h3>Mayors Permit</h3>
                  <img id="busMayorPermitImage" src="" alt="Mayor's Permit" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                  <p class="no-image-text" style="display: none;">No requirements found</p>
                  <!-- Other content for Step 6 here -->

                  <br>
                  <div class="mt-4">
                    <button type="button" class="btn btn-success" id="passedStep6">Approve</button>
                    <button type="button" class="btn btn-danger " id="failedStep6">Decline</button>
                    <br>
                    <span id="step6_Status" style="font-size: 100px; display: none;">APPROVED</span>
                    <input type="text" class="form-control mt-2" id="remarksStep6" placeholder="Enter remarks" style="display: none; ">
                  </div>
                </div>




                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" id="hiddendata">
                <button type="button" class="btn btn-success mt-3" id="prevStep">Previous</button>
                <button type="button" class="btn btn-success mt-3" id="nextStep">Next</button>

                <button type="button" class="btn btn-success mt-3" data-dismiss="modal" id="saveChangesButton" style="display: none;" onclick="update()">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>






  </div>
  </div>

  <!-- blockchain modal  -->
  <div class="modal fade" id="blockchain" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Business Applicant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="stepper-container">

            <div class="row">
              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Business Name</label>
                <input type="text" id="bc_businessname" class="form-control" placeholder="Enter Name" readonly />
              </div>
              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Business Branch</label>
                <input type="text" id="bc_branch" class="form-control" placeholder="Enter Name" readonly />
              </div>

              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Owner</label>
                <input type="text" id="bc_owner" class="form-control" placeholder="Enter Name" readonly />
              </div>


              <div class="row">
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">BRGY CLEARANCE</label>
                  <input type="text" id="bc_clearance" class="form-control" placeholder="Enter Name" readonly />
                </div>
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">DTI PERMIT</label>
                  <input type="text" id="bc_dti" class="form-control" placeholder="Enter Name" readonly />
                </div>

                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">Sanitary</label>
                  <input type="text" id="bc_sanitary" class="form-control" placeholder="Enter Name" readonly />
                </div>



              </div>



              <div class="row">
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">Cedula</label>
                  <input type="text" id="bc_cedula" class="form-control" placeholder="Enter Name" readonly />
                </div>
                <div class="col mb-3">
                  <label for="nameWithTitle" class="form-label">Mayors Permit</label>
                  <input type="text" id="bc_permit" class="form-control" placeholder="Enter Name" readonly />
                </div>


              </div>

            </div>
            <div class="modal-footer">
              <input type="text" id="hiddendata1">


              <button type="button" class="btn btn-success" data-dismiss="modal" onclick="Save()">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>






  <script src="plugins/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="plugins/assets/vendor/js/bootstrap.js"></script>
  <script src="plugins/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="plugins/assets/vendor/js/menu.js"></script>
  <script src="plugins/assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/web3@1.5.3/dist/web3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>
  <script>
    let contract;
    let currentAccount;

    document.addEventListener('DOMContentLoaded', async () => {
      const web3 = new Web3(Web3.givenProvider || 'http://127.0.0.1:7545');

      if (typeof window.ethereum !== 'undefined') {

        const web3 = new Web3(window.ethereum);

        try {
          const accounts = await ethereum.request({
            method: 'eth_requestAccounts'
          });
          currentAccount = accounts[0]; // Assign to the higher-scoped variable

          console.log('Current Ethereum address:', currentAccount);

          const contractAddress = '0xfd6d0CcBd98143fB0B784176A023833d842ff23f';

          const contractAbi = [{
              "inputs": [{
                  "internalType": "string",
                  "name": "_id",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "_businessName",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "_businessBranch",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "_ownerName",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "_cedula",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "_businessPermit",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "_brgyClearance",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "_sanitaryPermit",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "_mayorsPermit",
                  "type": "string"
                }
              ],
              "name": "storeData",
              "outputs": [],
              "stateMutability": "nonpayable",
              "type": "function"
            },
            {
              "inputs": [{
                "internalType": "address",
                "name": "user",
                "type": "address"
              }],
              "name": "getData",
              "outputs": [{
                  "internalType": "string",
                  "name": "",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "",
                  "type": "string"
                },
                {
                  "internalType": "string",
                  "name": "",
                  "type": "string"
                },
                {
                  "internalType": "uint256",
                  "name": "",
                  "type": "uint256"
                }
              ],
              "stateMutability": "view",
              "type": "function",
              "constant": true
            }
          ];;

          contract = new web3.eth.Contract(contractAbi, contractAddress);

          ethereum.on('accountsChanged', newAccounts => {
            console.log('Accounts changed:', newAccounts);
            currentAccount = newAccounts[0]; // Update the higher-scoped variable
            console.log('Updated Ethereum address:', currentAccount);
          });

          ethereum.on('chainChanged', chainId => {
            console.log('Network changed:', chainId);
          });

          $('#approval_tbl').DataTable({
            'serverside': true,
            'processing': true,
            'paging': true,
            "columnDefs": [{
              "className": "dt-center",
              "targets": "_all"
            }, ],
            'ajax': {
              'url': 'Registration_approval_tbl.php',
              'type': 'post',

            },
          });
        } catch (error) {
          console.error('Error fetching accounts:', error);
        }
      } else {
        console.log('MetaMask or an Ethereum-compatible wallet is not installed.');
      }
    });

    $(document).ready(function() {

      // Next button click event
      $("#nextStep").click(function() {
        if (currentStep < 6) {
          currentStep++;
          showStep(currentStep);
        }
      });

      // Previous button click event
      $("#prevStep").click(function() {
        if (currentStep > 1) {
          currentStep--;
          showStep(currentStep);
        }
      });

      // Passed button click event
      $("[id^=passedStep]").click(function() {
        // Extract the step number from the button's ID
        var stepNumber = parseInt($(this).attr("id").replace("passedStep", ""));
        $(this).prop("disabled", true);
        // Remove the step from the failedSteps array
        failedSteps = failedSteps.filter(step => step !== stepNumber);

        // Loop through all steps and update remarksData for each step
        for (var i = 2; i <= 6; i++) {
          if (i === stepNumber) {
            // Store the value "1" in remarksData for the step
            remarksData["remarksStep" + i] = "1";
            // Show the remarks input for the passed step and set its value to "1"
            $("#remarksStep" + i).val("1").hide();
          } else {
            // Hide the remarks input for other steps
            $("#remarksStep" + i).hide();
            // Store an empty string in remarksData for other steps
            remarksData["remarksStep" + i] = "";
          }
        }
        $("#failedStep" + stepNumber).prop("disabled", false);

      });

      // Failed button click event
      $("[id^=failedStep]").click(function() {
        // Extract the step number from the button's ID
        var stepNumber = parseInt($(this).attr("id").replace("failedStep", ""));
        $(this).prop("disabled", true);
        // Add the step to the failedSteps array
        failedSteps.push(stepNumber);
        // Show the remarks input for the failed step
        $("#remarksStep" + stepNumber).val("");
        $("#remarksStep" + stepNumber).show();

        $("#passedStep" + stepNumber).prop("disabled", false);
      });




      // Show the initial step
      showStep(currentStep);

      // Reset failedSteps array and hide remarks on modal show
      $('#view').on('show.bs.modal', function() {
        failedSteps = [];
        remarksData = {};
        currentStep = 1; // Reset the step to 1 when the modal is shown
        showStep(currentStep);
        // Iterate over all passed steps and re-enable them
        $("[id^=passedStep]").each(function() {
          $(this).prop("disabled", false);
        });
        $("[id^=failedStep]").each(function() {
          $(this).prop("disabled", false);
        });
      });

    });
    //step
    var currentStep = 1;
    var failedSteps = []; // Array to store failed steps
    var remarksData = {}; // Object to store remarks for each step

    // Function to show the current step
    function showStep(step) {
      // Get the progress bar
      var progressBar = $(".progress-bar");

      // Set the progress bar value to the current step
      progressBar.css("width", ((step - 1) / 5) * 100 + "%");

      // Hide all stepper content
      $(".stepper-content").removeClass("active");

      // Show the current stepper content
      $("#step" + step).addClass("active");

      // Disable or enable Previous and Next buttons based on the current step
      if (step === 1) {
        $("#prevStep").prop("disabled", true);
      } else {
        $("#prevStep").prop("disabled", false);
      }

      if (step === 6) {
        $("#nextStep").hide();
        $("#saveChangesButton").show();
      } else {
        $("#nextStep").show();
        $("#saveChangesButton").hide();
      }

      // Show remarks input if the step is in the failedSteps array
      if (failedSteps.includes(step)) {
        $("#remarksStep" + step).show();
      } else {
        $("#remarksStep" + step).hide();
      }
    }


    function update() {


      remarksDataStep2 = $("#remarksStep2").val() || null;
      remarksDataStep3 = $("#remarksStep3").val() || null;
      remarksDataStep4 = $("#remarksStep4").val() || null;
      remarksDataStep5 = $("#remarksStep5").val() || null;
      remarksDataStep6 = $("#remarksStep6").val() || null;

      hiddendata = $('#hiddendata').val();



      // console.log(remarksDataStep2)
      // console.log(remarksDataStep3)
      // console.log(remarksDataStep4)
      // console.log(remarksDataStep5)
      // console.log(remarksDataStep6)
      // console.log(hiddendata)

      $('#view').modal("hide");
      for (var i = 2; i <= 6; i++) {
        $("#remarksStep" + i).val("");
      }

      $.ajax({
        type: "POST",
        url: "approval_update.php",
        data: {
          remarksDataStep2: remarksDataStep2,
          remarksDataStep3: remarksDataStep3,
          remarksDataStep4: remarksDataStep4,
          remarksDataStep5: remarksDataStep5,
          remarksDataStep6: remarksDataStep6,
          hiddendata: hiddendata
        },
        success: function(response) {
          var jsons = JSON.parse(response);
          status = jsons.status;
          if (status == 'success') {
            var update = $('#approval_tbl').DataTable().ajax.reload();

            alert("Saved")
          }
        },
        error: function(error) {
          // Handle error response from the server
          console.error(error);
        }
      });
    }

    //Viewing
    function approval_status(views) {
      $('#hiddendata').val(views);
      $.post("approval_update.php", {
        views: views
      }, function(data, status) {
        var userid = JSON.parse(data);

        // Update form fields with data
        $('#business_name').val(userid.BusinessName);
        $('#branch').val(userid.BusinessBranch);
        $('#cardinal_location').val(userid.location);
        $('#category').val(userid.category);
        $('#sub_category').val(userid.subCategory);
        $('#owner').val(userid.owner_name);
        $('#date').val(userid.BusinessEstablish);
        $('#hours_operated').val(userid.BusinessOpenHour + ' - ' + userid.BusinessCloseHour);
        $('#address').val(userid.BusinessAddress);
        $('#barangay').val(userid.barangay);
        $('#zone').val(userid.zone);

        $('#status option[value="' + userid.BusinessStatus + '"]').prop('selected', true);
        $('#remarks').val(userid.BusinessRemarks);


        var imagePath = '../../img/requirements/';
        if (userid.BusinessStatus === "1" || userid.BusinessStatus === "2") {
          // Hide the remarks input field
          $('#remarksRow').hide();
          $('#remarks').val("");
          $('#storeButton').prop('disabled', false);
          console.log('Enabling button');

        } else {
          // Show the remarks input field
          $('#remarksRow').show();
          $('#storeButton').prop('disabled', true);

        }



        // //fetching of appoving and declining of every requirements (OPTIMIZED)
        function updateStep(status, passedId, failedId, statusId, remarksId) {
          if (status === "1") {
            $(passedId).hide();
            $(failedId).hide();
            $(statusId).show();
            $(remarksId).val("1");
          } else {
            $(passedId).show();
            $(failedId).show();
            $(statusId).hide();
            $(remarksId).val(""); // Adjust as needed
          }
        }

        updateStep(userid.remarks_brgyClearance, '#passedStep2', '#failedStep2', '#step2_Status', '#remarksStep2');
        updateStep(userid.remarks_dti, '#passedStep3', '#failedStep3', '#step3_Status', '#remarksStep3');
        updateStep(userid.remarks_sanitary, '#passedStep4', '#failedStep4', '#step4_Status', '#remarksStep4');
        updateStep(userid.remarks_cedula, '#passedStep5', '#failedStep5', '#step5_Status', '#remarksStep5');
        updateStep(userid.remarks_mayorsPermit, '#passedStep6', '#failedStep6', '#step6_Status', '#remarksStep6');


        // //fetching of appoving and declining of every requirements 
        // if (userid.remarks_brgyClearance === "1") {
        //   $('#passedStep2').hide();
        //   $('#failedStep2').hide();
        //   $("#step2_Status").show();
        //   $('#remarksStep2').val("1");
        // } else {
        //   // If condition is false (revert changes)
        //   $('#passedStep2').show();
        //   $('#failedStep2').show();
        //   $("#step2_Status").hide();
        //   $('#remarksStep2').val(""); // Assuming you want to clear the value, change this line accordingly if needed
        // }

        // if (userid.remarks_dti === "1") {
        //   $('#passedStep3').hide();
        //   $('#failedStep3').hide();
        //   $("#step3_Status").show();
        //   $('#remarksStep3').val("1");
        // }

        // if (userid.remarks_sanitary === "1") {
        //   $('#passedStep4').hide();
        //   $('#failedStep4').hide();
        //   $("#step4_Status").show();
        //   $('#remarksStep4').val("1");
        // }

        // if (userid.remarks_cedula === "1") {
        //   $('#passedStep5').hide();
        //   $('#failedStep5').hide();
        //   $("#step5_Status").show();
        //   $('#remarksStep5').val("1");
        // }

        // if (userid.remarks_mayorsPermit === "1") {
        //   $('#passedStep6').hide();
        //   $('#failedStep6').hide();
        //   $("#step6_Status").show();
        //   $('#remarksStep6').val("1");
        // }

        // // Add an event listener to the #status element
        // $('#status').on('change', function() {
        //   // Check if the selected value is 3 and hide or show the #remarks field accordingly
        //   if ($(this).val() === '3') {
        //     $('#remarksRow').show();

        //   } else {
        //     $('#remarksRow').hide();
        //     $('#remarks').val("");

        //   }
        // });


        // Function to handle displaying images or "No requirements found" text
        function displayImageOrText(imageId, imageName) {
          var $imageElement = $('#' + imageId);

          if (imageName && imageName.trim() !== '') {
            $imageElement.attr('src', imagePath + imageName);
            $imageElement.show();
            $imageElement.siblings('.no-image-text').hide();
          } else {
            $imageElement.hide();
            $imageElement.siblings('.no-image-text').show();
          }
        }

        // Populate and handle images for each step
        displayImageOrText('busBrgyClearanceImage', userid.bus_brgyclearance);
        displayImageOrText('busDtiPermitImage', userid.bus_dtipermit);
        displayImageOrText('busSanitaryPermitImage', userid.bus_sanitarypermit);
        displayImageOrText('busCedulaImage', userid.bus_cedula);
        displayImageOrText('busMayorPermitImage', userid.bus_mayorpermit);

        // Show Step 1 initially
        currentStep = 1;
        showStep(currentStep);
      });

      $('#view').modal("show");
    }




    //blockchain-crud

    function Store(id) {
      $('#hiddendata1').val(id);
      $.post("blockchain_approved.php", {
        id: id
      }, function(data,
        status) {
        var userids = JSON.parse(data);
        $('#bc_businessname').val(userids.BusinessName);
        $('#bc_branch').val(userids.BusinessBranch);
        $('#bc_owner').val(userids.owner_name);
        $('#bc_clearance').val(userids.bus_brgyclearance);
        $('#bc_dti').val(userids.bus_dtipermit);
        $('#bc_sanitary').val(userids.bus_sanitarypermit);
        $('#bc_cedula').val(userids.bus_cedula);
        $('#bc_permit').val(userids.bus_mayorpermit);
      });
      $('#blockchain').modal("show");
    }

    // function save without blockchain

    // function Save() {
    //   var hiddendata1 = $('#hiddendata1').val();
    //   $.post("blockchain_approved.php", {
    //     hiddendata1: hiddendata1
    //   }, function (data, status) {
    //     var jsons = JSON.parse(data);
    //     status = jsons.status;
    //     if (status == 'success') {
    //       var update = $('#approval_tbl').DataTable().ajax.reload();
    //       alert("Store in blockchain");
    //     }
    //   });
    //   $('#blockchain').modal("hide");
    // }


    function showLoader() {
      console.log('Show Loader called');

      // Create loader overlay
      const loaderOverlay = $('<div id="loaderOverlay"></div>').appendTo('body');

      // Add loader spinner and "Please Wait" message
      const loaderContainer = $('<div class="loader-container"></div>').appendTo(loaderOverlay);
      $('<div class="loader"></div>').appendTo(loaderContainer);
      $('<p  style="font-size: 18px;" ><b>Please wait </b>, it will take a while...</p>').appendTo(loaderContainer);
    }


    //with blockchain 

    async function Save() {
      try {
        showLoader();
        const updateData = {
          id: $('#hiddendata1').val(),
          businessName: $('#bc_businessname').val(),
          businessBranch: $('#bc_branch').val(),
          ownerName: $('#bc_owner').val(),
          cedula: $('#bc_cedula').val(),
          businessPermit: $('#bc_dti').val(),
          brgyClearance: $('#bc_clearance').val(),
          sanitaryPermit: $('#bc_sanitary').val(),
          mayorsPermit: $('#bc_permit').val(),
        };


        const gasEstimate = await contract.methods.storeData(
          updateData.id,
          updateData.businessName,
          updateData.businessBranch,
          updateData.ownerName,
          updateData.cedula,
          updateData.businessPermit,
          updateData.brgyClearance,
          updateData.sanitaryPermit,
          updateData.mayorsPermit
        ).estimateGas({
          from: currentAccount
        });



        // Fetch the current gas price from MetaMask using ethereum provider
        const currentGasPrice = await ethereum.request({
          method: 'eth_gasPrice'
        });

        // Set a lower gas price (adjust this value as needed)
        const lowerGasPrice = Math.floor(parseInt(currentGasPrice) * 1); // For example, set to 80% of the current gas price

        const gasLimit = gasEstimate + 200000;

        const tx = await contract.methods.storeData(
          updateData.id,
          updateData.businessName,
          updateData.businessBranch,
          updateData.ownerName,
          updateData.cedula,
          updateData.businessPermit,
          updateData.brgyClearance,
          updateData.sanitaryPermit,
          updateData.mayorsPermit
        ).send({
          from: currentAccount,
          gasPrice: lowerGasPrice, // Set the lower gas price
          gas: gasLimit
        });

        console.log('Transaction Result:', tx);

        // If the transaction is successful, update the status to 'approved' on the server.
        if (tx.status === true) {
          const hiddendata1 = updateData.id;
          const response = await fetch("blockchain_approved.php", {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `hiddendata1=${encodeURIComponent(hiddendata1)}`,
          });

          if (response.ok) {
            // Reload DataTable (assuming you have DataTables initialized)
            $('#approval_tbl').DataTable().ajax.reload();
            hideLoader();
            Swal.fire({
              title: "Store in blockchain",
              icon: "info",
              confirmButtonText: "OK"
            });

          } else {
            throw new Error(`Failed to update status on the server. Status: ${response.status}`);
          }
        }

        $('#blockchain').modal('hide');
      } catch (error) {
        hideLoader();
        console.error('Error:', error);
      }
    }



    function hideLoader() {
      // Implement your loader hiding logic here
      // For example, remove the overlay or hide the spinner
      // Example removing the overlay:
      $('#loaderOverlay').remove();
    }
  </script>




</body>

</html>