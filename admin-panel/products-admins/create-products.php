<?php require_once "../layouts/header.php"; ?>

<?php
// if admin not logged in
// denied to access this page
if (!isset($_SESSION['admin_name'])) {
  header("Location: " . url . "/index.php"); // Redirect to the home page
  exit();
}

//add new product
if (isset($_POST['submit'])) {
  if (empty($_POST['name']) or empty($_POST['price']) or empty($_POST['description']) or empty($_POST['type'])) {
    echo "<script>alert('one or more inputs are empty !!')</script>";
  } else {
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_description = $_POST['description'];
    $product_type = $_POST['type'];

    // Check if file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      // Get file info
      $image = $_FILES['image']['tmp_name'];
      $imageName = $_FILES['image']['name'];
      $imageSize = $_FILES['image']['size'];
      $imageType = $_FILES['image']['type'];

      // destination folder for uploaded image
      $folder = "../../images/" . $imageName;

      // Validate file type and size
      $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      if (!in_array($imageType, $allowedTypes)) {
        die("Only JPG, PNG, and GIF files are allowed.");
      }

      if ($imageSize > 5000000) { // 5MB limit
        die("File size exceeds the maximum limit of 5MB.");
      }

      // validate image name (no spaces allowed)
      if (preg_match('/\s/', $imageName)) {
        die("image name should not contain any blank spaces.");
      }

      // move uploaded file to local folder 
      move_uploaded_file($image, $folder);

      // sql query to insert image in database
      $sql = $query = "INSERT INTO products (name, image, description, price, type) VALUES ('{$product_name}','{$imageName}','{$product_description}','{$product_price}','{$product_type}')";
      mysqli_query($conn, $query) or die("Query Unsuccessful");

      // redirect to login page
      echo "<script>alert('Product Added !!')</script>";
      echo "<script>window.location.href='" . url . "/admin-panel/products-admins/show-products.php'</script>";
    } else {
      echo "Error: " . $_FILES['image']['error'];
    }
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Product Details</h5>
          <form method="POST" action="create-products.php" enctype="multipart/form-data">
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name" class="form-control" placeholder="name" />
            </div>
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="price" class="form-control" placeholder="price" />
            </div>
            <div class="form-outline mb-4 mt-4">
              <input type="file" name="image" class="form-control" />
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-outline mb-4 mt-4">
              <select name="type" class="form-select  form-control" aria-label="Default select example">
                <option selected disabled hidden>Choose Type</option>
                <option value="coffee">coffee</option>
                <option value="drink">drink</option>
                <option value="dessert">dessert</option>
                <option value="starter">starter</option>
                <option value="main dish">main dish</option>
              </select>
            </div>
            <br>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>