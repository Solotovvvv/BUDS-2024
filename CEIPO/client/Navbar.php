<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">
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
        <li class="menu-header text-uppercase"></li>

        <li class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
            <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'approval-registration.php' || basename($_SERVER['PHP_SELF']) == 're-evaluation.php' || basename($_SERVER['PHP_SELF']) == 'business-applicant-status.php' ? 'active open' : ''; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-buildings"></i>
                <div data-i18n="Layouts">Business Application</div>
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger rounded-circle"></span>
            </a>

            <ul class="menu-sub list-inline">
                <li class="list-inline-item menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'approval-registration.php' ? 'active' : ''; ?>">
                    <a href="approval-registration.php" class="menu-link">
                        <div data-i18n="Without navbar">Approval of Registration</div>
                        <span class="position-absolute top-6 start-100 translate-middle badge rounded-pill bg-danger" style="margin-left: -0.5rem;"></span>
                    </a>
                </li>
                <li class="list-inline-item menu-item <?php echo basename($_SERVER['PHP_SELF']) == 're-evaluation.php' ? 'active' : ''; ?>">
                    <a href="re-evaluation.php" class="menu-link">
                        <div data-i18n="Without navbar">Re-Evaluation</div>
                    </a>
                </li>
                <li class="list-inline-item menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'business-applicant-status.php' ? 'active' : ''; ?>">
                    <a href="business-applicant-status.php" class="menu-link">
                        <div data-i18n="Without menu">Approved Business</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'top-business.php' ? 'active open' : ''; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-category"></i>
                <div data-i18n="Layouts">Business Categories</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'top-business.php' ? 'active' : ''; ?>">
                    <a href="top-business.php" class="menu-link">
                        <div data-i18n="Without menu">Top 10 Business Category</div>
                    </a>
                </li>
                <!-- <li class="menu-item">
                    <a href="business-category.php" class="menu-link">
                        <div data-i18n="Without navbar">Business Category </div>
                    </a>
                </li> -->
            </ul>
        </li>
        <li class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'viewing-business.php' ? 'active' : ''; ?>">
            <a href="viewing-business.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-search"></i>
                Searching Business
            </a>
        </li>
        <li class="menu-item <?php echo basename($_SERVER['PHP_SELF']) == 'printing-reports.php' ? 'active' : ''; ?>">
            <a href="printing-reports.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Analytics">Reports</div>
            </a>
        </li>
    </ul>
</aside>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<!-- Script for handling active class -->
<script>

    $(document).ready(function() {
        Pusher.logToConsole = true;

        var pusher = new Pusher('5b1eb2892347a33d5be9', {
            cluster: 'ap1',
            encrypted: true
        });

        var channel = pusher.subscribe('business-channel');

        // Send AJAX request to update UI initially
        updatePendingCount();

        // Handle received events
        channel.bind('business-event', function(data) {
            console.log("Received business-event:", data);
            // Send AJAX request to update UI when business event is received
            updatePendingCount();
        });

        function updatePendingCount() {
            $.ajax({
                url: 'get_total_pending.php', // Replace 'get_total_pending.php' with the actual file path
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    // Update UI elements based on the response
                    if (response.success) {
                        var pendingCount = response.pendingCount;

                        // Update UI elements here
                        if (pendingCount > 0) {
                            $('.badge').text(pendingCount).show();
                            $('.rounded-circle').show(); // Show the rounded circle
                        } else {
                            $('.badge').hide();
                            $('.rounded-circle').hide(); // Hide the rounded circle if pendingCount is 0
                        }
                    } else {
                        console.error('Error updating UI:', response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error updating UI:', error);
                }
            });
        }
    });

</script>