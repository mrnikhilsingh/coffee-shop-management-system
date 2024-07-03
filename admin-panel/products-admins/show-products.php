<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

// if admin not logged in
// denied to access this page
if (!isset($_SESSION['admin_name'])) {
  header("Location: http://localhost/workspace/ns_coffee/index.php");
}

//fetch all orders from db
$product_query = "SELECT * FROM products";
$query_result = mysqli_query($conn, $product_query) or die("Query Unsuccessful");

?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Foods</h5>
          <a href="create-products.php" class="btn btn-primary mb-4 text-center float-right">Add New Product</a>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">Id</th>
                <th class="text-center">name</th>
                <th class="text-center">image</th>
                <th class="text-center">price</th>
                <th class="text-center">type</th>
                <th class="text-center">delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($query_result) > 0) {
                while ($product = mysqli_fetch_assoc($query_result)) {
              ?>
                  <tr>
                    <td class="text-center"><?php echo $product['id']; ?></td>
                    <td class="text-center"><?php echo $product['name']; ?></td>
                    <td class="text-center"><img src="../../images/<?php echo $product['image']; ?>" height="60px" width="60px"></td>
                    <td class="text-center">$<?php echo $product['price']; ?></td>
                    <td class="text-center"><?php echo $product['type']; ?></td>
                    <td class="text-center"><a href="delete-product.php?id=<?php echo $product['id']; ?>" class="btn btn-danger  text-center ">delete</a></td>
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