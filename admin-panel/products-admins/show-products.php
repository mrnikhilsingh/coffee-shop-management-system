<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

// if admin not logged in
// denied to access this page
if (!isset($_SESSION['admin_name'])) {
  header("Location: http://localhost/workspace/ns-coffee/index.php");
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
          <a href="create-products.html" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>name</th>
                <th>image</th>
                <th>price</th>
                <th>type</th>
                <th>delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($query_result) > 0) {
                while ($product = mysqli_fetch_assoc($query_result)) {
              ?>
                  <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['image']; ?></td>
                    <td>$<?php echo $product['price']; ?></td>
                    <td><?php echo $product['type']; ?></td>
                    <td><a href="delete-products.html" class="btn btn-danger  text-center ">delete</a></td>
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