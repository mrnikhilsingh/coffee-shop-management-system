<?php require "../../config/config.php"; ?>
<?php

// if admin logged in trying to directly access delete page
// denied to access
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = 'https://nscoffee.free.nf/admin-panel'</script>";
}

$product_id = $_GET["id"];

// fetch products from database
$sql = "SELECT * FROM products WHERE id = '$product_id'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful: Select Product");
$product = mysqli_fetch_assoc($result);

unlink("../../images/" . $product['image']);

$delete_query = "DELETE FROM products WHERE id = '{$product_id}'";
mysqli_query($conn, $delete_query) or die("Query Unsuccessful");

echo "<script>alert('Order Deleted !!')</script>";
echo "<script>window.location.href='https://nscoffee.free.nf/admin-panel/products-admins/show-products.php'</script>";

mysqli_close($conn);

?>