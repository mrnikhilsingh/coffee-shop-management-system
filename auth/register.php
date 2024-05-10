<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
//if user logged in 
//he should not able to access register page
if (isset($_SESSION['username'])) {
  header("Location: http://localhost/workspace/ns-coffee/index.php");
}
//code for user registration 
if (isset($_POST['submit'])) {
  if (empty($_POST['username']) or empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('one or more inputs are empty !!')</script>";
  } else {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password = password_hash($_POST['password'],PASSWORD_DEFAULT); 

    // sql query
    $query = "INSERT INTO users (username, email, password) VALUES ('{$username}','{$email}','{$password}')";
    mysqli_query($conn, $query) or die("Query Unsuccessful");
    // redirect to login page
    header("Location: login.php");
  }
}
?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(../images/bg_2.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Register</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="<?php echo url; ?>/index.php">Home</a></span>
            <span>Register</span>
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
        <form action="register.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
          <h3 class="mb-4 billing-heading">Register</h3>
          <div class="row align-items-end">
            <div class="col-md-12">
              <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" />
              </div>
            </div>
            <div class="col-md-12">
              <a href="login.php" class="">Already have an Account</a>
            </div>
            <div class="col-md-12">
              <div class="form-group mt-4">
                <div class="radio">
                  <button class="btn btn-primary py-3 px-4" name="submit">
                    Register
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- END -->
      </div>
      <!-- .col-md-8 -->
    </div>
  </div>
</section>
<!-- .section -->

<?php require "../includes/footer.php"; ?>