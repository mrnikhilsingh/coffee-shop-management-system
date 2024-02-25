<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if (isset($_SESSION['username'])) {
  header("Location: http://localhost/workspace/ns-coffee/index.php");
}

if (isset($_POST['submit'])) {
  if (empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('email or password are empty !!')</script>";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // sql query
    // verifying the user email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful !!");

    // if email is correct
    if (mysqli_num_rows($result) > 0) {
      if ($row = mysqli_fetch_assoc($result)) {
        // verifying the user password
        if ($password === $row['password']) {
          // password_verify($password,$row['password']) for hashed password;
          // session start
          $_SESSION['username'] = $row['username'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['user_id'] = $row['id'];
          // redirect to index page
          header("Location: http://localhost/workspace/ns-coffee/index.php");
        } else {
          echo "<script>alert('email or password is incorrect !!')</script>";
        }
      }
    } else {
      echo "<script>alert('email or password is incorrect !!')</script>";
    }
  }
}
?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(../images/bg_1.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Login</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="../index.php">Home</a></span>
            <span>Login</span>
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
        <form action="login.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
          <h3 class="mb-4 billing-heading">Login</h3>
          <div class="row align-items-end">
            <div class="col-md-12">
              <div class="form-group">
                <label for="Email">Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="Password">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mt-4">
                <div class="radio">
                  <button name="submit" class="btn btn-primary py-3 px-4">Login</button>
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