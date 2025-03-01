<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

//code for admin registration 
if (isset($_POST['submit'])) {
  if (empty($_POST['name']) or empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('one or more inputs are empty !!')</script>";
  } else {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password = password_hash($_POST['password'],PASSWORD_DEFAULT); 

    // sql query
    $query = "INSERT INTO admins (admin_name, email, password) VALUES ('{$name}','{$email}','{$password}')";
    mysqli_query($conn, $query) or die("Query Unsuccessful");

    echo "<script>alert('New Admin Added Successfully !!')</script>";
    // redirect to login page
    echo "<script>window.location.href='https://nscoffee.free.nf/admin-panel/admins/create-admins.php'</script>";
  }
}

?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" enctype="multipart/form-data">
            <div class="form-outline mb-4">
              <input type="text" name="name" class="form-control" placeholder="name" />
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <input type="email" name="email" class="form-control" placeholder="email" />
            </div>
            <div class="form-outline mb-4">
              <input type="password" name="password" class="form-control" placeholder="password" />
            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>