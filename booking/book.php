<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if (isset($_POST['submit'])) {
    if (empty($_POST['first_name']) or empty($_POST['last_name']) or empty($_POST['date']) or empty($_POST['time']) or empty($_POST['phone']) or empty($_POST['message'])) {
        echo "<script>alert('one or more inputs are empty !!')</script>";
    } else {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $userId = $_SESSION['user_id'];

        if ($date > date("n/j/Y")) {

            $sql = "INSERT INTO bookings (first_name, last_name, date, time, phone, message, user_id) VALUES ('{$firstName}','{$lastName}','{$date}','{$time}','{$phone}','{$message}','{$userId}')";
            mysqli_query($conn, $sql) or die("Query Unsuccessful");

            echo "<script>alert('You have booked your Table Successfully !!')</script>";
?>
            <script>
                window.location.href = '../index.php'
            </script>"
<?php
        } else {
            echo "<script>alert('please enter a valid date !!')</script>";
        }
    }
}


?>