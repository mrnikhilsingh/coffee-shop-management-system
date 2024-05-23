<?php require "layouts/header.php"; ?>

<?php 

//if user logged out in 
//he should not able to access index page
if (!isset($_SESSION['admin_name'])) {
  header("Location: http://localhost/workspace/ns-coffee/admin-panel/admins/login.php");
}

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Products</h5>
          <p class="card-text">number of products: 8</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Orders</h5>
          <p class="card-text">number of orders: 4</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bookings</h5>
          <p class="card-text">number of bookings: 4</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admins</h5>
          <p class="card-text">number of admins: 3</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>