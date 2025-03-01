<footer class="ftco-footer ftco-section img">
  <div class="overlay"></div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">About Us</h2>
          <p>
            Far far away, behind the word mountains, far from the countries
            Vokalia and Consonantia, there live the blind texts.
          </p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate">
              <a href="#"><span class="icon-twitter"></span></a>
            </li>
            <li class="ftco-animate">
              <a href="#"><span class="icon-facebook"></span></a>
            </li>
            <li class="ftco-animate">
              <a href="#"><span class="icon-instagram"></span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Recent Blog</h2>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg)"></a>
            <div class="text">
              <h3 class="heading">
                <a href="#">Even the all-powerful Pointing has no control about</a>
              </h3>
              <div class="meta">
                <div>
                  <a href="#"><span class="icon-calendar"></span> Sept 15, 2023</a>
                </div>
                <div>
                  <a href="#"><span class="icon-person"></span> Admin</a>
                </div>
                <div>
                  <a href="#"><span class="icon-chat"></span> 19</a>
                </div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg)"></a>
            <div class="text">
              <h3 class="heading">
                <a href="#">Even the all-powerful Pointing has no control about</a>
              </h3>
              <div class="meta">
                <div>
                  <a href="#"><span class="icon-calendar"></span> Sept 15, 2023</a>
                </div>
                <div>
                  <a href="#"><span class="icon-person"></span> Admin</a>
                </div>
                <div>
                  <a href="#"><span class="icon-chat"></span> 19</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Services</h2>
          <ul class="list-unstyled">
            <li><a href="#" class="py-2 d-block">Cooked</a></li>
            <li><a href="#" class="py-2 d-block">Deliver</a></li>
            <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
            <li><a href="#" class="py-2 d-block">Mixed</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Have a Questions?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li>
                <span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California,
                  USA</span>
              </li>
              <li>
                <a href="#"><span class="icon icon-phone"></span><span class="text">+91 392 3929 210</span></a>
              </li>
              <li>
                <a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p>
          Copyright &copy; 2024 All rights reserved | Made with
          <i class="icon-heart" aria-hidden="true"></i> by Nikhil Singh
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg>
</div>

<!-- jquery & js files -->
<script src="<?php echo url; ?>/js/jquery.min.js"></script>
<script src="<?php echo url; ?>/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo url; ?>/js/popper.min.js"></script>
<script src="<?php echo url; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo url; ?>/js/jquery.easing.1.3.js"></script>
<script src="<?php echo url; ?>/js/jquery.waypoints.min.js"></script>
<script src="<?php echo url; ?>/js/jquery.stellar.min.js"></script>
<script src="<?php echo url; ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo url; ?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo url; ?>/js/aos.js"></script>
<script src="<?php echo url; ?>/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo url; ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo url; ?>/js/jquery.timepicker.min.js"></script>
<script src="<?php echo url; ?>/js/scrollax.min.js"></script>
<script src="<?php echo url; ?>/js/main.js"></script>

<script>
  $(document).ready(function() {
    var quantitiy = 0;
    $(".quantity-right-plus").click(function(e) {
      // Stop acting like a button
      e.preventDefault();
      // Get the field name
      var quantity = parseInt($("#quantity").val());

      // If is not undefined

      $("#quantity").val(quantity + 1);

      // Increment
    });

    $(".quantity-left-minus").click(function(e) {
      // Stop acting like a button
      e.preventDefault();
      // Get the field name
      var quantity = parseInt($("#quantity").val());

      // If is not undefined

      // Increment
      if (quantity > 0) {
        $("#quantity").val(quantity - 1);
      }
    });
  });
</script>
</body>

</html>