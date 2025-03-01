<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

// if admin not logged in
// denied to access bookings page
if (!isset($_SESSION['admin_name'])) {
  header("Location: https://nscoffee.free.nf");
}

//fetch all bookings from db
$booking_query = "SELECT * FROM bookings";
$query_result = mysqli_query($conn, $booking_query) or die("Query Unsuccessful");

?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Bookings</h5>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">Booking Id</th>
                <th class="text-center">First Name</th>
                <th class="text-center">Last Name</th>
                <th class="text-center">Cust. Id</th>
                <th class="text-center">Date</th>
                <th class="text-center">Time</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Message</th>
                <th class="text-center">Status</th>
                <th class="text-center">Update Status</th>
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($query_result) > 0) {
                while ($booking = mysqli_fetch_assoc($query_result)) {
              ?>
                  <tr>
                    <td class="text-center"><?php echo $booking["id"]; ?></td>
                    <td class="text-center"><?php echo $booking["first_name"]; ?></td>
                    <td class="text-center"><?php echo $booking["last_name"]; ?></td>
                    <td class="text-center"><?php echo $booking["user_id"]; ?></td>
                    <td class="text-center"><?php echo $booking["date"]; ?></td>
                    <td class="text-center"><?php echo $booking["time"]; ?></td>
                    <td class="text-center"><?php echo $booking["phone"]; ?></td>
                    <td class="text-center"><?php echo $booking["message"]; ?></td>
                    <td class="text-center"><?php echo $booking["status"]; ?></td>
                    <td class="text-center"><a href="update-status.php?id=<?php echo $booking['id']; ?>" class="btn btn-warning">Update</a></td>
                    <td class="text-center"><a href="delete-bookings.php?id=<?php echo $booking['id']; ?>" class="btn btn-danger">Delete</a></td>
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
</body>

</html>