<!-- If user_type is user, show a banner image and Request Pickup button -->
<?php if ($userType == '1'): ?>
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
<?php endif ?>