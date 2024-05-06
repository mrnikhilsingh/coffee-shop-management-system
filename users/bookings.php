<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

// if user not logged in
// denied to access bookings page
if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/workspace/ns-coffee/index.php");
}

//fetch all bookings from db
$query = "SELECT * FROM bookings WHERE user_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query) or die("Query Unsuccessful");

?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?php echo url; ?>/images/bg_3.jpg)" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Bookings</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="<?php echo url; ?>">Home</a></span>
                        <span>Bookings</span>
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($booking = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr class="text-center">
                                        <td>
                                            <?php echo $booking['first_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $booking['last_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $booking['date']; ?>
                                        </td>
                                        <td>
                                            <?php echo $booking['time']; ?>
                                        </td>
                                        <td>
                                            <?php echo $booking['phone']; ?>
                                        </td>
                                        <td>
                                            <?php echo $booking['message']; ?>
                                        </td>
                                        <td>
                                            <?php echo $booking['status']; ?>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td>
                                        <h5>Your Booking is Empty</h5>
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
    </div>
</section>

<?php require "../includes/footer.php"; ?>