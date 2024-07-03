<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
//if user logged in 
//he should not able to access this page
if (isset($_SESSION['username'])) {
    header("Location: http://localhost/workspace/ns_coffee/index.php");
}

// code for forgot password
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $new_password = $_POST['new-password'];

    // verifying the user email
    $query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
    $result = mysqli_query($conn, $query) or die("Query Unsuccessful !!");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $query = "UPDATE users SET password = '$new_password' WHERE id = {$row['id']} ";
        mysqli_query($conn, $query) or die("Query Unsuccessful !!");

        echo "<script>alert('Password Forgot Successfully')</script>";
    }else {
        echo "<script>alert('username or email is does not match')</script>";
    }
}
?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(../images/bg_1.jpg)" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Forgot Password</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="../index.php">Home</a></span>
                        <span>Forgot Password</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <form action="forgot-password.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
                    <h3 class="mb-4 billing-heading">Forgot Password</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input name="username" id="username" type="text" class="form-control" placeholder="Username" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" id="email" type="text" class="form-control" placeholder="Email" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="new-password">New Password</label>
                                <input name="new-password" id="new-password" type="password" class="form-control" placeholder="New Password" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input name="confirm-password" id="confirm-password" type="text" class="form-control" placeholder="Confirm Password" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <button name="submit" class="btn btn-primary py-3 px-4">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END -->
            </div>
            <!-- .col-md-8 -->
        </div>
    </div>
</section>

<script>
    const forgotForm = document.querySelector(".billing-form");

    // input fields
    const username = document.querySelector("#username");
    const email = document.querySelector("#email");
    const password = document.querySelector("#new-password");
    const confirmPassword = document.querySelector("#confirm-password");

    // form validation
    forgotForm.addEventListener("submit", (e) => {
        if (username.value === "" || email.value === "" || password.value === "" || confirmPassword.value === "") {
            e.preventDefault();
            alert("Please fill all the details !!");
        }

        if (password.value != confirmPassword.value) {
            e.preventDefault();
            alert("Password and Confirmed Password must be same !!");
        }
    })
</script>

<?php require "../includes/footer.php"; ?>