<?php require_once "../includes/header.php"; ?>

<?php

// if user logged in trying to directly access this page
// denied to access
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = '../index.php'</script>";
    exit();
}

// if user not logged in
// denied to access cart page
if (!isset($_SESSION['user_id'])) {
    header("Location: " . url . "/index.php"); // Redirect to the home page
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "DELETE FROM cart WHERE user_id = {$user_id}";
mysqli_query($conn, $query) or die("Query Unsuccessful");


echo "<script>
          alert('Order placed successfully');
          window.location.href = 'cart.php';
        </script>";

?>