<!-- If user_type is user, show a banner image and Request Pickup button -->
<?php if ($userType == '1'): ?>
    <div class="row">
        <div class="card shadow mb-4 p-3 mx-auto">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Package Records</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <img src="images/editprofile-bg.jpg" class="img-fluid" alt="Responsive image">
                </div>
            </div>
            <a href="#" class="btn btn-primary btn-lg btn-block p-3" data-toggle="modal" data-target="#requestPickupModal">
                <span class="icon">
                    <i class="fa-solid fa-boxes-packing"></i>
                </span>
                <span class="text">Request Pickup</span>
            </a>
        </div>
    </div>
<?php endif ?>
<!-- If userType is admin, show three cards: Total Users, Total Riders, and Total Package fetched from database -->
<!-- Also include a pickup request table that can be used to assign the package or cancel the package request -->
<!-- If userType is admin -->
<?php if ($userType == '2'): ?>
    <div class="row">
        <!-- Total Users Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                // Query to fetch the total number of users
                                $sql = "SELECT COUNT(*) AS total_users FROM account_details WHERE type_id = 1";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                echo $result['total_users'];
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Riders Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Riders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                // Query to fetch the total number of riders
                                $sql = "SELECT COUNT(*) AS total_riders FROM account_details WHERE type_id = 3";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                echo $result['total_riders'];
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Packages Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Packages</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                // Query to fetch the total number of packages
                                $sql = "SELECT COUNT(*) AS total_packages FROM package_details";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                echo $result['total_packages'];
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pickup Request Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pickup Requests</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Order Code</th>
                            <th>Requested on</th>
                            <th>Sender's Account no</th>
                            <th>Sender Name</th>
                            <th>Sender's Contact no.</th>
                            <th>Receiver Name</th>
                            <th>Receiver Address</th>
                            <th>Pickup Address</th>
                            <th>Receiver Contact no.</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query to fetch the pickup requests
                        $sql = "SELECT
                                    pd.created_on,
                                    pd.order_code,
                                    ad1.account_id as sender_id,
                                    ad1.name as sender_name,
                                    ad1.phone_no as sender_phone,
                                    rd.name AS receiver_name,
                                    ad.address AS receiver_address,
                                    ad2.address AS pickup_address,
                                    rd.phone_no AS receiver_phone,
                                    ds.status_name AS delivery_status,
                                    pd.description
                                FROM
                                    package_details pd
                                JOIN
                                    account_details ad1 ON pd.account_id = ad1.account_id
                                JOIN
                                    receiver_details rd ON pd.receiver_id = rd.receiver_id
                                JOIN
                                    address_details ad ON pd.order_code = ad.order_code AND ad.address_type_id = 2
                                JOIN
                                    address_details ad2 ON pd.order_code = ad2.order_code AND ad2.address_type_id = 1
                                JOIN
                                    delivery_status ds ON pd.delivery_status_id = ds.status_id
                                WHERE
                                    pd.delivery_status_id = (SELECT status_id FROM delivery_status WHERE status_name = 'Pending for approval')";

                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $pickupRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($pickupRequests as $request) {
                            echo '<tr>';
                            echo '<td>' . $request['order_code'] . '</td>';
                            echo '<td>' . $request['created_on'] . '</td>';
                            echo '<td>' . $request['sender_id'] . '</td>';
                            echo '<td>' . $request['sender_name'] . '</td>';
                            echo '<td>' . $request['sender_phone'] . '</td>';
                            echo '<td>' . $request['receiver_name'] . '</td>';
                            echo '<td>' . $request['receiver_address'] . '</td>';
                            echo '<td>' . $request['pickup_address'] . '</td>';
                            echo '<td>' . $request['receiver_phone'] . '</td>';
                            echo '<td>' . $request['description'] . '</td>';
                            echo '<td>' . $request['delivery_status'] . '</td>';
                            echo '<td>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#assignModal">Assign</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">Cancel</a>
                                  </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php endif; ?>