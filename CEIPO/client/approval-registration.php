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



  #fileViewer {
    flex-grow: 1;
    margin-bottom: 20px;
  }

  iframe#pdfViewer {
    width: 100%;
    height: 500px;
    border: none;
  }

  .buttons-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  #step2_Status {
    font-size: 24px;
    margin-top: 10px;
  }

  #remarksStep2 {
    margin-top: 10px;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- NAV BAR -->
      <?php include 'Navbar.php'; ?>
      <!-- end -->
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
                      <label for="business_name" class="form-label">Business Name</label>
                      <input type="text" id="business_name" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="branch" class="form-label">Business Branch</label>
                      <input type="text" id="branch" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="cardinal_location" class="form-label">Cardinal Location</label>
                      <input type="text" id="cardinal_location" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="category" class="form-label">Business Category</label>
                      <input type="text" id="category" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="sub_category" class="form-label">Business Sub-Category</label>
                      <input type="text" id="sub_category" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="owner" class="form-label">Business Owner</label>
                      <input type="text" id="owner" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="date" class="form-label">Established</label>
                      <input type="text" id="date" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="hours_operated" class="form-label">Opening-Closing Hours</label>
                      <input type="text" id="hours_operated" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" id="address" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="barangay" class="form-label">Barangay</label>
                      <input type="text" id="barangay" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                    <div class="col mb-3">
                      <label for="zone" class="form-label">Zone</label>
                      <input type="text" id="zone" class="form-control" placeholder="Enter Name" readonly />
                    </div>
                  </div>
                </div>
                <!-- Step 2 -->
                <div class="stepper-content" id="step2">

                  <h3>Requirements</h3>
                  <p class="no-image-text" style="display: none;">No requirements found</p>
                  <div class="row">
                    <div class="col-md-4" id="fileViewer">
                      <iframe id="pdfViewer" width="100%" height="400px" style="border: none;"></iframe>
                    </div>
                    <div class="col-md-4  justify-content-between mt-4">
                      <div>
                        <button type="button" class="btn btn-success mb-2" id="passedStep2">Approve</button>
                        <button type="button" class="btn btn-danger mb-2" id="failedStep2">Decline</button>
                      </div>
                      <span id="step2_Status" style="font-size: 24px; display: none;">APPROVED</span>
                      <input type="text" class="form-control mt-2" id="remarksStep2" placeholder="Enter remarks" style="display: none;">
                    </div>
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


              <div class="col mb-3" style="display: none;">
                <label for="nameWithTitle" class="form-label">Cedula</label>
                <input type="text" id="bc_req" class="form-control" placeholder="Enter Name" readonly />
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
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
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

          const contractAddress = '0x5e7649973b0143905b9484EE3B82Cb7E5D43f9C9';

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
                  "name": "_req",
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
                  "internalType": "uint256",
                  "name": "",
                  "type": "uint256"
                }
              ],
              "stateMutability": "view",
              "type": "function",
              "constant": true
            }
          ];

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
      //Realtime Pusher Js 
      var pusher = new Pusher('5b1eb2892347a33d5be9', {
        cluster: 'ap1',
        encrypted: true
      });

      var channel = pusher.subscribe('business-channel');

      channel.bind('business-added', function(data) {
        console.log("Received business-event");
        $('#approval_tbl').DataTable().ajax.reload();
        // Call AJAX request or perform any other action here
      });
      ////////////////////////////


      // Next button click event
      $("#nextStep").click(function() {
        if (currentStep < 2) {
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
      // Show the initial step
      showStep(currentStep);



    });

    //step
    var currentStep = 1;
    let statusStep2 = null;
    var globalBusinessStatus = "";


    // Function to handle "Approve" button click
    $('#passedStep2').click(function() {
      statusStep2 = 1; // Approved
      $('#step2_Status').show().text('APPROVED');
      $('#remarksStep2').hide(); // Hide the remarks input field
      $('#remarksStep2').val(''); // Clear the remarks field
      checkSaveChangesButton()
    });

    // Function to handle "Decline" button click
    $('#failedStep2').click(function() {
      statusStep2 = 2; // Declined
      $('#step2_Status').hide();
      $('#remarksStep2').show(); // Show the remarks input field
      checkSaveChangesButton()
    });






    // Function to show the current step
    function showStep(step) {
      // Get the progress bar
      var progressBar = $(".progress-bar");

      // Set the progress bar value to the current step
      progressBar.css("width", ((step - 1) / 1) * 100 + "%");

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

      if (step === 2) {
        $("#nextStep").hide();

      } else {
        $("#nextStep").show();

      }
      if (step === 2 && globalBusinessStatus !== "1") {
        $('#saveChangesButton').show();
      } else {
        $('#saveChangesButton').hide();
      }

      checkSaveChangesButton()

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
        $('#remarks').val(userid.BusinessRemarks);
        globalBusinessStatus = userid.BusinessStatus;
        $('#pdfViewer').attr('src', '../' + userid.bus_pdf);


        // Check BusinessStatus to determine UI changes
        if (userid.BusinessStatus === "1") {
          // Hide the remarks input field
          $('#remarksRow').hide();
          $('#remarks').val("");
          $('#storeButton').prop('disabled', false);
          // Show the approved status message
          $('#step2_Status').show().text('APPROVED');
          // Assuming you want to set remarksStep2 to "1" when approved
          $('#passedStep2').hide();
          $('#failedStep2').hide();
          $('#saveChangesButton').hide();

        } else {
          // Show the remarks input field
          $('#remarksRow').show();
          $('#storeButton').prop('disabled', true);

          // Hide the approved status message
          $('#step2_Status').hide();
          $('#remarksStep2').val(""); // Adjust as needed

          // if ($("#step2").hasClass("active")) {
          //     $('#saveChangesButton').show();
          // } else {
          //     $('#saveChangesButton').hide();
          // }
        }

        // Show Step 1 initially (assuming you have a showStep function)
        var currentStep = 1;
        showStep(currentStep);
      });

      $('#view').modal("show");
    }

    function resetModalState() {
      currentStep = 1; // Reset currentStep to 1
      showStep(currentStep); // Show the initial step (step 1)
      // Reset any other UI elements as needed
    }

    // View modal close event listener
    $('#view').on('hidden.bs.modal', function() {
      resetModalState();
      statusStep2 = null;
      $('#remarksStep2').hide(); // Hide the remarks input field
      $('#remarksStep2').val(''); // Clear the remarks field
      $('#passedStep2').show();
      $('#failedStep2').show();
    });


    function checkSaveChangesButton() {
      if (statusStep2 === null) {
        $('#saveChangesButton').prop('disabled', true);
      } else {
        $('#saveChangesButton').prop('disabled', false);
      }
    }









    function update() {
      // Get values from form fields
      var remarksDataStep2 = $("#remarksStep2").val() || null;
      var hiddendata = $('#hiddendata').val();

      // Hide modal and clear form fields
      $('#view').modal("hide");
      for (var i = 2; i <= 6; i++) {
        $("#remarksStep" + i).val("");
      }

      // Send AJAX request to update data
      $.ajax({
        type: "POST",
        url: "approval_update.php",
        data: {
          status: statusStep2,
          remarks: remarksDataStep2,
          hiddendata: hiddendata
        },
        success: function(response) {
          var jsons = JSON.parse(response);
          var status = jsons.status;
          if (status === 'success') {
            // Reload DataTable upon successful update
            $('#approval_tbl').DataTable().ajax.reload();
          }
        },
        error: function(error) {
          // Handle error response from the server
          console.error(error);
        }
      });
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
        $('#bc_req').val(userids.bus_pdf);
      });
      $('#blockchain').modal("show");
    }

    function showLoader() {
      console.log('Show Loader called');

      // Create loader overlay
      const loaderOverlay = $('<div id="loaderOverlay"></div>').appendTo('body');

      // Add loader spinner and "Please Wait" message
      const loaderContainer = $('<div class="loader-container"></div>').appendTo(loaderOverlay);
      $('<div class="loader"></div>').appendTo(loaderContainer);
      $('<p  style="font-size: 18px;" ><b>Please wait </b>, it will take a while...</p>').appendTo(loaderContainer);
    }
    // //with blockchain 
    // async function Save() {
    //   try {
    //     showLoader();
    //     const updateData = {
    //       id: $('#hiddendata1').val(),
    //       businessName: $('#bc_businessname').val(),
    //       businessBranch: $('#bc_branch').val(),
    //       ownerName: $('#bc_owner').val(),
    //       cedula: $('#bc_cedula').val(),
    //     };


    //     const gasEstimate = await contract.methods.storeData(
    //       updateData.id,
    //       updateData.businessName,
    //       updateData.businessBranch,
    //       updateData.ownerName,
    //       updateData.cedula,
    //       updateData.businessPermit,
    //       updateData.brgyClearance,
    //       updateData.sanitaryPermit,
    //       updateData.mayorsPermit
    //     ).estimateGas({
    //       from: currentAccount
    //     });



    //     // Fetch the current gas price from MetaMask using ethereum provider
    //     const currentGasPrice = await ethereum.request({
    //       method: 'eth_gasPrice'
    //     });

    //     // Set a lower gas price (adjust this value as needed)
    //     const lowerGasPrice = Math.floor(parseInt(currentGasPrice) * 1); // For example, set to 80% of the current gas price

    //     const gasLimit = gasEstimate + 200000;

    //     const tx = await contract.methods.storeData(
    //       updateData.id,
    //       updateData.businessName,
    //       updateData.businessBranch,
    //       updateData.ownerName,
    //       updateData.cedula,
    //       updateData.businessPermit,
    //       updateData.brgyClearance,
    //       updateData.sanitaryPermit,
    //       updateData.mayorsPermit
    //     ).send({
    //       from: currentAccount,
    //       gasPrice: lowerGasPrice, // Set the lower gas price
    //       gas: gasLimit
    //     });

    //     console.log('Transaction Result:', tx);

    //     // If the transaction is successful, update the status to 'approved' on the server.
    //     if (tx.status === true) {
    //       const hiddendata1 = updateData.id;
    //       const response = await fetch("blockchain_approved.php", {
    //         method: 'POST',
    //         headers: {
    //           'Content-Type': 'application/x-www-form-urlencoded',
    //         },
    //         body: `hiddendata1=${encodeURIComponent(hiddendata1)}`,
    //       });

    //       if (response.ok) {
    //         // Reload DataTable (assuming you have DataTables initialized)
    //         $('#approval_tbl').DataTable().ajax.reload();
    //         hideLoader();
    //         Swal.fire({
    //           title: "Store in blockchain",
    //           icon: "info",
    //           confirmButtonText: "OK"
    //         });

    //       } else {
    //         throw new Error(`Failed to update status on the server. Status: ${response.status}`);
    //       }
    //     }

    //     $('#blockchain').modal('hide');
    //   } catch (error) {
    //     hideLoader();
    //     console.error('Error:', error);
    //   }
    // }


    async function Save() {
  try {
    showLoader();
    const updateData = {
      id: $('#hiddendata1').val(),
      businessName: $('#bc_businessname').val(),
      businessBranch: $('#bc_branch').val(),
      ownerName: $('#bc_owner').val(),
      req: $('#bc_req').val(), // Single field for required data
    };

    const gasEstimate = await contract.methods.storeData(
      updateData.id,
      updateData.businessName,
      updateData.businessBranch,
      updateData.ownerName,
      updateData.req // Passing only the required field
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
      updateData.req // Passing only the required field
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
          title: "Stored in blockchain",
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