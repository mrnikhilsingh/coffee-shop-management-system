<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the posted values
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $userId = $_SESSION['user_id'];

    // Validate the date
    $bookingDate = strtotime($date);
    $currentDate = strtotime(date("Y-m-d"));
    if ($bookingDate > $currentDate) {

        // Prepare the SQL query with parameterized values
        $sql = "INSERT INTO bookings (first_name, last_name, date, time, phone, message, user_id) VALUES ('{$firstName}','{$lastName}','{$date}','{$time}','{$phone}','{$message}','{$userId}')";
        mysqli_query($conn, $sql) or die("Query Unsuccessful");

        echo "<script>alert('You have booked your Table Successfully !!')</script>";


        // Redirect to previous page
        echo "<script>window.history.back()</script>";
    } else {
        echo "<script>alert('Please enter a valid date.')</script>";
        echo "<script>window.history.back()</script>";
    }
}

?>
