<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

// if user logged in trying to directly access checkout page
// denied to access
if (!isset($_SERVER['HTTP_REFERER'])) {
  echo "<script>window.location.href = '../index.php'</script>";
}

// if user not logged in
// denied to access cart page
if (!isset($_SESSION['user_id'])) {
  header("Location: http://localhost/workspace/ns_coffee/index.php");
}

if (isset($_POST['submit'])) {
  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];
  $country = $_POST['country']; //state/country
  $street_address = $_POST['street-address'];
  $town_city = $_POST['town-or-city'];
  $zip_code = $_POST['postcode-or-zip'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $user_id = $_SESSION['user_id'];
  $status = "pending";
  $total_price = $_SESSION['total_price'];

  // sql query
  $query = "INSERT INTO orders (first_name, last_name, country, street_address, town, zip_code, phone, email, user_id, status, total_price) VALUES ('{$first_name}','{$last_name}','{$country}','{$street_address}','{$town_city}','{$zip_code}','{$phone}','{$email}','{$user_id}','{$status}','{$total_price}')";
  mysqli_query($conn, $query) or die("Query Unsuccessful");

  echo "<script>window.location.href = 'pay.php'</script>";
}


?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(<?php echo url; ?>/images/bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Checkout</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="<?php echo url; ?>/index.php">Home</a></span>
            <span>Checkout</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <form action="checkout.php" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
          <h3 class="mb-4 billing-heading">Billing Details</h3>
          <div class="row align-items-end">
            <div class="col-md-6">
              <div class="form-group">
                <label for="first-name">First Name *</label>
                <input type="text" id="first-name" name="first-name" class="form-control" placeholder="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name" class="form-control" placeholder="" />
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="country">State / Country *</label>
                <div class="select-wrap">
                  <div class="icon">
                    <span class="ion-ios-arrow-down"></span>
                  </div>
                  <select name="country" id="country" class="form-control">
                    <option value="" selected hidden>Select State/Country</option>
                    <option value="France">France</option>
                    <option value="Italy">Italy</option>
                    <option value="India">India</option>
                    <option value="Philippines">Philippines</option>
                    <option value="South Korea">South Korea</option>
                    <option value="Hongkong">Hongkong</option>
                    <option value="Japan">Japan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="street-address">Street Address *</label>
                <input type="text" id="street-address" name="street-address" class="form-control" placeholder="House number and street name" />
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="town-or-city">Town / City *</label>
                <input type="text" id="town-or-city" name="town-or-city" class="form-control" placeholder="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="postcode-or-zip">Postcode / ZIP *</label>
                <input type="text" id="postcode-or-zip" name="postcode-or-zip" class="form-control" placeholder="" />
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="" />
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group mt-4">
                <div class="radio">
                  <p>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary py-3 px-4">Place an order</button>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- .col-md-8 -->
    </div>
  </div>
</section>
<!-- .section -->

<script>
  const billingForm = document.querySelector(".billing-form");

  // input fields
  const firstName = document.querySelector("#first-name");
  const lastName = document.querySelector("#last-name");
  const country = document.querySelector("#country");
  const streetAddress = document.querySelector("#street-address");
  const townCity = document.querySelector("#town-or-city");
  const postcodeZip = document.querySelector("#postcode-or-zip");
  const phone = document.querySelector("#phone");
  const email = document.querySelector("#email");

  billingForm.addEventListener("submit", (e) => {
    if (firstName.value === "" || country.value === "" || streetAddress.value === "" || townCity.value === "" || postcodeZip.value === "" || phone.value === "" || email.value === "") {
      e.preventDefault();
      alert("Please fill all the details !!");
    }
  })
</script>

<?php require "../includes/footer.php"; ?>