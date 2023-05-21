<title>Home Page</title>

</head>

<body id="page-top">
    <?php include 'php/navbar.php'; ?>
    <!-- Masthead-->
    <header class="masthead" id="home">
        <div class="container">
            <div class="masthead-subheading">Providing fast, reliable and convenient delivery service.</div>
            <div class="masthead-heading text-uppercase">Elite Logistics Pvt Ltd</div>
            <a class="btn btn-primary btn-xl text-uppercase" data-bs-toggle="modal"
                data-bs-target="#checkStatusModal">Check Packages</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-truck-fast fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Transportation</h4>
                    <p class="text-muted">Our company provide transportation services for goods of all types and sizes.
                    </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-warehouse fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Warehousing</h4>
                    <p class="text-muted">Our company offer warehousing and storage facilities for goods, ensuring that
                        they are kept in a safe.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-boxes-stacked fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Inventory Management</h4>
                    <p class="text-muted">Our company helps businesses manage their inventory.</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-cash-register fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Order Fulfillment</h4>
                    <p class="text-muted">Our company ensures that products are picked, packed, and dispatched in a
                        timely and accurate manner.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-right-left fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Reverse Logistics</h4>
                    <p class="text-muted">Our company can assist with the reverse logistics process, including returns
                        management.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-road-circle-check fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Last Mile Delivery</h4>
                    <p class="text-muted">This service ensures that products are delivered to customers' doorsteps in a
                        timely and efficient manner.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Your Trusted Partner for Timely and Secure Deliveries</h3>
            </div>
            <center>
                <p>Elite Logistics Pvt Ltd is a Nepalese logistics company that was founded in 2022. The company is in
                    Chandragiri-5, a municipality located on the outskirts of Kathmandu. The focus of the company is to
                    provide
                    reliable and efficient logistics solutions to businesses and individuals alike.
                    As a full-service logistics provider, Elite Logistics Pvt Ltd offers a range of services, including
                    transportation, warehousing, order fulfillment, reverse logistics and last mile delivery. With a
                    team of
                    experienced professionals, the company is dedicated to ensuring that every package is handled with
                    the
                    utmost care and attention to detail.
                    Elite Logistics Pvt Ltd has a strong commitment to providing excellent logistics services and
                    building
                    enduring relationships with their clients, positioning them for future success in the logistics
                    industry.</p>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.6948621927063!2d85.26159857559077!3d27.695824376189197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb232b287960c7%3A0xe2f66b2f1866cab9!2sElite%20Logistics%20and%20Clearing%20Service!5e0!3m2!1sen!2snp!4v1684575047027!5m2!1sen!2snp"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </center>
        </div>
    </section>

    <!-- Check Status Modal -->
    <div class="modal fade" id="checkStatusModal" tabindex="-1" aria-labelledby="checkStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h5 class="modal-title font-alt text-black" id="checkStatusModalLabel">Check Package Status</h5>
                    <button class="btn-close btn-close-black" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body border-0 p-4">
                    <form id="checkStatusForm" method="POST" action="check_package_page.php">
                        <!-- Order Code input -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="orderCode" name="orderCode" type="text"
                                placeholder="Enter order code..." required />
                            <label for="orderCode">Order Code</label>
                        </div>
                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button class="btn btn-primary rounded-pill btn-lg" type="submit">Check Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    