<?php require "../../config/config.php"; ?>
<?php

// if admin logged in trying to directly access delete page
// denied to access
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = 'https://nscoffee.free.nf/admin-panel'</script>";
}

$order_id = $_GET["id"];

$delete_query = "DELETE FROM orders WHERE id = '{$order_id}'";
mysqli_query($conn, $delete_query) or die("Query Unsuccessful");

echo "<script>alert('Order Deleted !!')</script>";
echo "<script>window.location.href='https://nscoffee.free.nf/admin-panel/orders-admins/show-orders.php'</script>";

?>