<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

// if admin logged in trying to directly access this page
// denied to access
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = 'http://localhost/workspace/ns_coffee/admin-panel'</script>";
}

// if admin not logged in
// denied to access this page
if (!isset($_SESSION['admin_name'])) {
    header("Location: http://localhost/workspace/ns_coffee/admin-panel");
}

// check for order id received or not
$order_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$order_id) {
    die("Order ID not specified.");
}

// update order status
if (isset($_POST['submit'])) {
    if (empty($_POST['order-status'])) {
        echo "<script>alert('please select status !!')</script>";
    } else {

        $order_status = $_POST['order-status'];

        $update_query = "UPDATE orders SET status = '{$order_status}' WHERE id = '{$order_id}'";
        mysqli_query($conn, $update_query) or die("Query Unsuccessful");

        echo "<script>alert('Order Status Updated !!')</script>";
        echo "<script>window.location.href = 'http://localhost/workspace/ns_coffee/admin-panel/orders-admins/show-orders.php'</script>";
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update Order Status</h5>
                    <form method="POST" action="update-status.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
                        <div class="form-outline mb-4 mt-4">
                            <select name="order-status" class="form-select  form-control" aria-label="Default select example">
                                <option selected disabled hidden>Choose Status</option>
                                <option value="pending">Pending</option>
                                <option value="delivered">Delivered</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>