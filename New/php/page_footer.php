<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-lg-start">Copyright &copy; 2023 Elite Logistics Pvt. Ltd - All rights reserved
            </div>
            <div class="col-lg-6 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/Elitelognepal"
                    aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="mailto:elitelognepal@gmail.com" aria-label="Mail"><i class="fa-solid fa-envelope-open"></i></a>
            </div>
        </div>
    </div>
</footer>
<?php if (isset($jsFiles) && is_array($jsFiles)): ?>
    <?php foreach ($jsFiles as $jsFile): ?>
        <script src="scripts/<?php echo $jsFile; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="modules/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>