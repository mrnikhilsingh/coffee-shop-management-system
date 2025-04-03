<?php require_once "../includes/header.php"; ?>

<?php

// if user not logged in
// denied to access cart page
if (!isset($_SESSION['user_id'])) {
  header("Location: " . url . "/index.php"); // Redirect to the home page
}

//show products in cart
$query = "SELECT * FROM cart WHERE user_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query) or die("Query Unsuccessful");


//show total cart price
$query2 = "SELECT SUM(price * quantity) as total FROM cart WHERE user_id = {$_SESSION['user_id']}";
$result2 = mysqli_query($conn, $query2) or die("Query Unsuccessful");
if (mysqli_num_rows($result2) > 0) {
  $total = mysqli_fetch_assoc($result2);
}

// proceed for checkout
if (isset($_POST['checkout'])) {
  $_SESSION['total_price'] = $_POST['total-price'];

  echo "<script>window.location.href = 'checkout.php'</script>";
}

?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(<?php echo url; ?>/images/bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Cart</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="<?php echo url; ?>">Home</a></span>
            <span>Cart</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-cart">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <table class="table">
            <thead class="thead-primary">
              <tr class="text-center">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <tr class="text-center">
                    <td class="product-remove">
                      <a href="delete-product.php?id=<?php echo $row['product_id']; ?>"><span class="icon-close"></span></a>
                    </td>

                    <td class="image-prod">
                      <div class="img" style="background-image: url(<?php echo url; ?>/images/<?php echo $row['image']; ?>)"></div>
                    </td>

                    <td class="product-name">
                      <h3><?php echo $row['name']; ?></h3>
                      <p>
                        <?php echo $row['description']; ?>
                      </p>
                    </td>

                    <td class="price">$<?php echo $row['price']; ?></td>

                    <td>
                      <div class="input-group mb-3">
                        <input disabled type="text" name="quantity" class="quantity form-control input-number" value="<?php echo $row['quantity']; ?>" min="1" max="100" />
                      </div>
                    </td>

                    <td class="total">$<?php echo $row['price'] * $row['quantity']; ?></td>
                  </tr>
                <?php }
              } else { ?>
                <tr>
                  <td>
                    <h5>Your Cart is Empty</h5>
                  </td>
                </tr>
                <!-- END TR-->
              <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row justify-content-end">
      <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Cart Totals</h3>
          <p class="d-flex">
            <span>Subtotal</span>
            <span>$<?php
                    if ($total['total'] > 0) {
                      # code...
                      echo number_format($total['total'], 2, '.', "");
                    } else echo "0.00";
                    ?>
            </span>
          </p>
          <p class="d-flex">
            <span>Delivery</span>
            <span>$<?php
                    if ($total['total'] > 0) {
                      # code...
                      echo "5.00";
                    } else echo "0.00";
                    ?></span>
          </p>
          <p class="d-flex">
            <span>Discount</span>
            <span>$<?php
                    if ($total['total'] > 0) {
                      # code...
                      echo "3.00";
                    } else echo "0.00";
                    ?></span>
          </p>
          <hr />
          <p class="d-flex total-price">
            <span>Total</span>
            <span>$<?php
                    if ($total['total'] > 0) {
                      # code...

                      echo number_format($total['total'] + 5 - 3, 2, '.', "");
                    } else echo "0.00";
                    ?></span>
          </p>
        </div>
        <form action="cart.php" method="post">
          <input hidden name="total-price" type="text" value="<?php echo $total['total'] + 5 - 3; ?>">
          <?php if ($total['total'] > 0) { ?>
            <button class="btn btn-primary py-3 px-4" name="checkout" type="submit">Proceed to Checkout</button>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>
</section>

<?php require_once "../includes/footer.php"; ?>