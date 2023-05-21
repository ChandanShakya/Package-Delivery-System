<?php
$currentPage = basename($_SERVER['PHP_SELF'], ".php");

if ($userType == 1) {
    echo '<title>User Dashboard</title>';
} elseif ($userType == 2) {
    echo '<title>Admin Dashboard</title>';
} elseif ($userType == 3) {
    echo '<title>Delivery Personnel Dashboard</title>';
} else {
    // Invalid user type
    echo "Invalid User Type";
    exit();
}
?>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <li>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon">
                        <img src="images/logo.svg" alt="Logo" width="60vw">

                    </div>
                    <div class="sidebar-brand-text mx-3">Elite Logistics Pvt Ltd</div>
                </a>
            </li>
            <!-- Divider -->
            <li class="sidebar-divider my-0">
                <hr>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($currentPage === 'dashboard') ? 'active' : ''; ?>">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <li class="sidebar-divider">
                <hr>
            </li>
            <?php if ($userType != 3): ?>
                <!-- Heading -->
                <li class="sidebar-heading">
                    Packages
                </li>

                <!-- Nav Item - Package Records -->
                <?php if ($userType == 1): ?>
                    <li class="nav-item <?php echo ($currentPage === 'user_package_records') ? 'active' : ''; ?>">
                        <a class="nav-link" href="user_package_records.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Package Records</span>
                        </a>

                    </li>
                <?php endif; ?>
                <?php if ($userType == 2): ?>
                    <li class="nav-item <?php echo ($currentPage === 'admin_package_records') ? 'active' : ''; ?>">
                        <a class="nav-link" href="admin_package_records.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Package Records</span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($userType == 2): ?>
                <!-- Divider -->
                <li class="sidebar-divider">
                    <hr>
                </li>

                <!-- Heading -->
                <li class="sidebar-heading">
                    Admin Options
                </li>

                <!-- Nav Item - Registered Users -->
                <li class="nav-item <?php echo ($currentPage === 'registered_users') ? 'active' : ''; ?>">
                    <a class="nav-link" href="registered_users.html">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Registered Users</span>
                    </a>
                </li>

                <!-- Nav Item - Delivery Personnel -->
                <li class="nav-item <?php echo ($currentPage === 'delivery_personnel') ? 'active' : ''; ?>">
                    <a class="nav-link" href="delivery_personnel.html">
                        <i class="fas fa-fw fa-truck"></i>
                        <span>Delivery Personnel</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($userType == 3): ?>
                <!-- Heading -->
                <li class="sidebar-heading">
                    Packages
                </li>

                <!-- Nav Item - Pending -->
                <li class="nav-item <?php echo ($currentPage === 'delivery_personnel_pending') ? 'active' : ''; ?>">
                    <a class="nav-link" href="pending.html">
                        <i class="fas fa-fw fa-clock"></i>
                        <span>Pending</span>
                    </a>
                </li>

                <!-- Nav Item - Delivered -->
                <li class="nav-item  <?php echo ($currentPage === 'delivery_personnel_delivered') ? 'active' : ''; ?>">
                    <a class="nav-link" href="delivered.html">
                        <i class="fas fa-fw fa-check"></i>
                        <span>Delivered</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <li class="sidebar-divider d-none d-md-block">
                <hr>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <li class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle" title="Toggle Sidebar">
                    <!-- Add a visually hidden text for screen readers -->
                    <span class="sr-only">Toggle Sidebar</span>
                </button>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $user['name']; ?>
                                </span>
                                <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#settingModal">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Code depending upon user -->
                    <!-- If $currentPage is dashboard show the content of dashboard_content.php -->

                    <?php
                    if ($currentPage === 'dashboard'):
                        echo '<!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">';
                        include 'dashboard_content.php';
                        echo '</div>';
                    endif;
                    ?>

                    <!-- If $currentPage is user_package_records show the content of user_package_records.php -->

                    <?php
                    if ($currentPage === 'user_package_records'):
                        include 'user_package_records_content.php';
                    endif;
                    ?>

                    <!-- If $currentPage is admin_package_records show the content of admin_package_records.php -->

                    <?php
                    if ($currentPage === 'admin_package_records'):
                        include 'admin_package_records.php';
                    endif;
                    ?>

                    <!-- If $currentPage is registered_users show the content of registered_users.php -->

                    <?php
                    if ($currentPage === 'registered_users'):
                        include 'registered_users.php';
                    endif;
                    ?>

                    <!-- If $currentPage is delivery_personnel show the content of delivery_personnel.php -->

                    <?php
                    if ($currentPage === 'delivery_personnel'):
                        include 'delivery_personnel.php';
                    endif;
                    ?>

                    <!-- If $currentPage is delivery_personnel_pending show the content of delivery_personnel_pending.php -->

                    <?php
                    if ($currentPage === 'delivery_personnel_pending'):
                        include 'delivery_personnel_pending.php';
                    endif;
                    ?>

                    <!-- If $currentPage is delivery_personnel_delivered show the content of delivery_personnel_delivered.php -->

                    <?php
                    if ($currentPage === 'delivery_personnel_delivered'):
                        include 'delivery_personnel_delivered.php';
                    endif;
                    ?>


                    <!-- End of Content Row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="text-center my-auto">
                        <span>Copyright &copy;
                            <?php echo date('Y'); ?> Elite Logistics Pvt. Ltd - All rights reserved

                        </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="php/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Setting Modal -->
    <div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="settingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingModalLabel">Settings</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Profile Setting Form -->
                    <form action="php/updateProfile.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                                value="<?php echo $user['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" value="<?php echo $user['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number" value="<?php echo $user['phone_no']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location"
                                placeholder="Enter your location" value="<?php echo $user['default_location']; ?>"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>
                    <hr>
                    <form action="php/updatePassword.php" method="POST">

                        <!-- Password Setting Form -->
                        <div class="form-group">
                            <label for="oldPassword">Old Password</label>
                            <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                                placeholder="Enter your old password" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword"
                                placeholder="Enter your new password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                placeholder="Confirm your new password" required>
                        </div>

                        <button type="submit" class="btn btn-primary" onsubmit="validateForm();">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add this HTML code after the form in dashboard.php -->
    <div class="modal fade" id="successPasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="successPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successPasswordModalLabel">Update Successful</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                        onclick="closeSuccessPasswordModal()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your password has been successfully updated.
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successProfileModal" tabindex="-1" role="dialog"
        aria-labelledby="successProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successProfileModalLabel">Update Successful</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                        onclick="closeSuccessProfileModal()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your Profile has been successfully updated.
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="successRequestModal" tabindex="-1" role="dialog"
        aria-labelledby="successRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successRequestModalLabel">Update Successful</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                        onclick="closeSuccessRequestModal()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your Request has been successfully recorded.
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="requestPickupModal" tabindex="-1" role="dialog"
        aria-labelledby="requestPickupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestPickupModalLabel">Request Pickup</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="php/processRequestPickup.php" method="POST">
                        <div class="form-group">
                            <label for="pickupAddress">Pickup Address</label>
                            <input type="text" class="form-control" id="pickupAddress" name="pickupAddress"
                                value="<?php echo $user['default_location']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="receiverName">Receiver's Name</label>
                            <input type="text" class="form-control" id="receiverName" name="receiverName" required>
                        </div>
                        <div class="form-group">
                            <label for="deliveryAddress">Delivery Address</label>
                            <input type="text" class="form-control" id="deliveryAddress" name="deliveryAddress"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="receiverPhone">Receiver's Phone Number</label>
                            <input type="text" class="form-control" id="receiverPhone" name="receiverPhone" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>