<?php require_once "../includes/header.php"; ?>

<?php

// if user logged in trying to directly access pay page
// denied to access
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = '../index.php'</script>";
    exit();
}

// if user not logged in
// denied to access pay page
if (!isset($_SESSION['user_id'])) {
    header("Location: " . url . "/index.php"); // Redirect to the home page
    exit();
}

?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?php echo url; ?>/images/bg_3.jpg)" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Pay with PayPal <br><br>(Please don't make any payment here, this website is only for demo purpose)</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="<?php echo url; ?>">Home</a></span>
                        <span>Cart</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $_SESSION['total_price']; ?>' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {

                    window.location.href = '../index.php';
                });
            }
        }).render('#paypal-button-container');
    </script>
</div>


<?php require_once "../includes/footer.php"; ?>