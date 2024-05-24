<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

//if admin logged out in 
//he should not able to access index page
if (!isset($_SESSION['admin_name'])) {
  header("Location: http://localhost/workspace/ns-coffee/admin-panel/admins/login.php");
}

// products
$product_query = "SELECT COUNT(*) AS count FROM products";
$product_result = mysqli_query($conn, $product_query) or die("Query Unsuccessful");
if (mysqli_num_rows($product_result) > 0) {
  $products_count = mysqli_fetch_assoc($product_result);
}

// orders
$order_query = "SELECT COUNT(*) AS count FROM orders";
$order_result = mysqli_query($conn, $order_query) or die("Query Unsuccessful");
if (mysqli_num_rows($order_result) > 0) {
  $orders_count = mysqli_fetch_assoc($order_result);
}

// bookings
$booking_query = "SELECT COUNT(*) AS count FROM bookings";
$booking_result = mysqli_query($conn, $booking_query) or die("Query Unsuccessful");
if (mysqli_num_rows($booking_result) > 0) {
  $bookings_count = mysqli_fetch_assoc($booking_result);
}

// admins
$admin_query = "SELECT COUNT(*) AS count FROM admins";
$admin_result = mysqli_query($conn, $admin_query) or die("Query Unsuccessful");
if (mysqli_num_rows($admin_result) > 0) {
  $admins_count = mysqli_fetch_assoc($admin_result);
}

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Products</h5>
          <p class="card-text">number of products: <?php echo $products_count['count']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Orders</h5>
          <p class="card-text">number of orders: <?php echo $orders_count['count']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bookings</h5>
          <p class="card-text">number of bookings: <?php echo $bookings_count['count']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admins</h5>
          <p class="card-text">number of admins: <?php echo $admins_count['count']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>