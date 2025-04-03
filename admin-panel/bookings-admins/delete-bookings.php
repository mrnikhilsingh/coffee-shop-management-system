<?php
require_once __DIR__ . '../../../config/config.php';
?>
<?php

// if admin logged in trying to directly access delete page
// denied to access
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = '" . url . "/admin-panel'</script>";
}

$booking_id = $_GET["id"];

$delete_query = "DELETE FROM bookings WHERE id = '{$booking_id}'";
mysqli_query($conn, $delete_query) or die("Query Unsuccessful");

echo "<script>alert('Booking Deleted !!')</script>";
echo "<script>window.location.href='" . url . "/admin-panel/bookings-admins/show-bookings.php'</script>";

?>