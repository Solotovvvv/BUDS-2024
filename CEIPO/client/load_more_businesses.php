<?php
// Include your config.php to establish the database connection
include '../../includes/config.php';
$pdo = DATABASE::connection();

$offset = $_POST['offset'];
$limit = $_POST['limit'];

// Function to fetch and display businesses
function fetchAndDisplayBusinesses($pdo, $offset, $limit) {
  $query = "SELECT *
    FROM business_list AS bl
    INNER JOIN business_requirement AS br ON bl.bus_id = br.bus_id
    INNER JOIN owner_list AS ol ON bl.ownerId = ol.ID
    INNER JOIN brgyzone_list AS bz ON bl.BusinessBrgy = bz.ID
    INNER JOIN category_list as c ON bl.BusinessCategory = c.ID
    INNER JOIN subcategory_list as sc ON bl.BusinessSubCategory = sc.ID
    WHERE bl.BusinessStatus = '4'
    LIMIT $offset, $limit
  ";

  $stmt = $pdo->prepare($query);
  $stmt->execute();

  while ($businessData = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Extract business details
    $businessName = $businessData['BusinessName'];
    $businessAddress = $businessData['BusinessAddress'];
    $businessPhone = $businessData['BusinessNumber'];
    $businessCategory = $businessData['category'];
    $businessImage = $businessData['Businesslogo'];
    ?>

    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-4">
      <div class="card bg-light d-flex flex-fill">
        <div class="card-header text-muted border-bottom-0">
          <?= $businessCategory; ?>
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col-7">
              <h2 class="lead" style="font-size: 40px;"><b><?= $businessName; ?></b></h2><br>
              <ul class="list-inline ml-4 mb-0 fa-ul text-muted">
                <li class="list-inline-block">
                  <span class="fa-li"><i class="bx bx-map"></i><?= $businessAddress; ?></span>
                </li>
                <li class="list-inline-block">
                  <span class="fa-li"><i class="bx bx-phone"></i><?= $businessPhone; ?></span>
                </li>
              </ul>
            </div>
            <div class="col-4 text-center">
              <img src="../img/logo/<?= $businessImage; ?>" alt="user-avatar" class="img-circle img-fluid">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="text-rigth">
            <button type="button" class="btn btn-sm btn-primary view-business-button"
              data-bs-toggle="modal"
              data-bs-target="#modalCenter"
              data-business-id="<?= $businessData['bus_id'] ?>"
              style="background-color: #355E3B; border: none;">
              <i class="bx bx-search"></i> View Business
            </button>
          </div>
        </div>
      </div>
    </div>

  <?php
  }
}

// Fetch and display additional businesses
fetchAndDisplayBusinesses($pdo, $offset, $limit);
?>
 <script>
          // JavaScript code to handle the modal and business data loading
          $(document).ready(function() {
            $('.view-business-button').click(function() {
              var businessId = $(this).data('business-id');
              $.ajax({
                  type: 'POST', // Change to 'GET' if your backend supports GET requests
                  url: 'fetch_business_data.php', // Replace with the correct URL
                  data: { businessId: businessId },
                  dataType: 'json', // Change to 'html' or 'text' if your backend returns HTML or plain text
                  success: function(response) {
                    // Update the modal content with the fetched data
                    $('#modalCenterTitle').html(response.businessName);
                    $('#modalCenter .modal-body').html(response.businessData);
                  },
                  error: function() {
                    // Handle errors here, e.g., show an error message
                    console.error('Failed to fetch business data.');
                  }
                });
            });

       
          });
        </script>