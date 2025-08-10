<?php require_once "../layouts/header.php"; ?>

<?php

// if admin not logged in
// denied to access orders page
if (!isset($_SESSION['admin_name'])) {
  header("Location: " . url . "/index.php");
  exit();
}

//fetch all orders from db
$order_query = "SELECT * FROM orders";
$query_result = mysqli_query($conn, $order_query) or die("Query Unsuccessful");

?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Orders</h5>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">Order Id</th>
                  <th class="text-center">First Name</th>
                  <th class="text-center">Last Name</th>
                  <th class="text-center">Cust. Id</th>
                  <th class="text-center">Street Address</th>
                  <th class="text-center">State</th>
                  <th class="text-center">Zip Code</th>
                  <th class="text-center">Phone</th>
                  <th class="text-center">Total Price</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Update Status</th>
                  <th class="text-center">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($query_result) > 0) {
                  while ($orders = mysqli_fetch_assoc($query_result)) {
                ?>
                    <tr>
                      <td class="text-center"><?php echo $orders["id"]; ?></td>
                      <td class="text-center"><?php echo $orders["first_name"]; ?></td>
                      <td class="text-center"><?php echo $orders["last_name"]; ?></td>
                      <td class="text-center"><?php echo $orders["user_id"]; ?></td>
                      <td class="text-center"><?php echo $orders["street_address"]; ?></td>
                      <td class="text-center"><?php echo $orders["town"]; ?></td>
                      <td class="text-center"><?php echo $orders["zip_code"]; ?></td>
                      <td class="text-center"><?php echo $orders["phone"]; ?></td>
                      <td class="text-center">$<?php echo $orders["total_price"]; ?></td>
                      <td class="text-center"><?php echo $orders["status"]; ?></td>
                      <td class="text-center"><a href="update-status.php?id=<?php echo $orders['id']; ?>" class="btn btn-warning">Update</a></td>
                      <td class="text-center"><a href="delete-orders.php?id=<?php echo $orders['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>