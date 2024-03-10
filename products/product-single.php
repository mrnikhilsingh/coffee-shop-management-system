<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	//data for single product
	$query = "SELECT * FROM products WHERE id = {$id}";
	$result = mysqli_query($conn, $query) or die("Query Unsuccessful !!");

	if (mysqli_num_rows($result) > 0) {
		$product = mysqli_fetch_assoc($result);
	}

	//data for related product
	$productType = "SELECT * FROM products WHERE type = '{$product['type']}' AND id != {$id}";
	$allProductResult = mysqli_query($conn, $productType) or die("Query Unsuccessful !!");

	if (mysqli_num_rows($allProductResult) > 0) {
	}

	//add to cart
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$image = $_POST['image'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$size = $_POST['size'];
		$product_id = $_POST['product-id'];
		$user_id = $_SESSION['user_id'];

		$query = "INSERT INTO cart (name, image, price, description, size, quantity, product_id, user_id) VALUES ('{$name}', '{$image}', '{$price}', '{$description}', '{$size}', {$quantity}, {$product_id}, {$user_id})";
		mysqli_query($conn, $query) or die("Query Unsuccessful");

		echo "<script>alert('Added to cart successfully')</script>";
	}

	// validation for cart
	if (isset($_SESSION['user_id'])) {
		$query = "SELECT * FROM cart WHERE product_id = {$id} AND user_id = {$_SESSION['user_id']}";
		$rowCount = mysqli_query($conn, $query);
	}
?>

	<section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(<?php echo url; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">
					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">Product Detail</h1>
						<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo url; ?>/index.html">Home</a></span> <span>Product Detail</span></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="<?php echo url; ?>/images/<?php echo $product['image']; ?>" class="image-popup"><img src="<?php echo url; ?>/images/<?php echo $product['image']; ?>" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3><?php echo $product['name']; ?></h3>
					<p class="price"><span>$<?php echo $product['price']; ?></span></p>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.
					</p>
					<form action="product-single.php?id=<?php echo $product['id']; ?>" method="post">
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="size" class="form-control">
											<option value="Small">Small</option>
											<option value="Medium">Medium</option>
											<option value="Large">Large</option>
											<option value="Extra Large">Extra Large</option>
										</select>
									</div>
								</div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
								<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
										<i class="icon-minus"></i>
									</button>
								</span>
								<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
								<span class="input-group-btn ml-2">
									<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="icon-plus"></i>
									</button>
								</span>
							</div>
						</div>
						<input hidden type="text" name="name" value="<?php echo $product['name']; ?>">
						<input hidden type="text" name="image" value="<?php echo $product['image']; ?>">
						<input hidden type="text" name="description" value="<?php echo $product['description']; ?>">
						<input hidden type="text" name="price" value="<?php echo $product['price']; ?>">
						<input hidden type="text" name="product-id" value="<?php echo $product['id']; ?>">
						<?php
						if (mysqli_num_rows($rowCount) > 0) {
						?>
							<button class="btn btn-primary py-3 px-4 cart" name="submit" type="submit" disabled>
								Added to cart
							</button>
						<?php } else { ?>
							<button class="btn btn-primary py-3 px-4 cart" name="submit" type="submit">
								Add to cart
							</button>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate text-center">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Related products</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
			</div>
			<div class="row">
				<?php
				while ($row = mysqli_fetch_assoc($allProductResult)) {
				?>
					<div class="col-md-3">
						<div class="menu-entry">
							<a href="product-single.php?id=<?php echo $row['id']; ?>" class="img" style="background-image: url(<?php echo url; ?>/images/<?php echo $row['image']; ?>);"></a>
							<div class="text text-center pt-4">
								<h3><a href="product-single.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h3>
								<p><?php echo $row['description']; ?></p>
								<p class="price"><span>$<?php echo $row['price']; ?></span></p>
								<p><a href="product-single.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-outline-primary">Show</a></p>
							</div>
						</div>
					</div>
			<?php }
			} ?>
			</div>
		</div>
	</section>

	<?php require "../includes/footer.php"; ?>