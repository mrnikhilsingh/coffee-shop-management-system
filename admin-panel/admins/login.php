<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
//if user logged in 
//he should not able to access login page
if (isset($_SESSION['admin_name'])) {
  header("Location: https://nscoffee.free.nf/admin-panel");
}

if (isset($_POST['submit'])) {
  if (empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('email or password are empty !!')</script>";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // sql query
    // verifying the user email
    $query = "SELECT * FROM admins WHERE email = '$email'";
    $result = mysqli_query($conn, $query) or die("Query Unsuccessful !!");

    // if email is correct
    if (mysqli_num_rows($result) > 0) {
      if ($row = mysqli_fetch_assoc($result)) {
        // verifying the user password
        if ($password === $row['password']) {
          // password_verify($password,$row['password']) for hashed password;
          // session start
          $_SESSION['admin_name'] = $row['admin_name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['admin_id'] = $row['id'];
          // redirect to index page
          header("Location: https://nscoffee.free.nf/admin-panel");
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

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mt-5">Login</h5>
          <form method="POST" class="p-auto" action="login.php">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email" id="" class="form-control" placeholder="Email" />
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="" placeholder="Password" class="form-control" />
            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>