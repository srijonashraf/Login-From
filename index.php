<?php
include 'headTagContainer.php';
?>


<body>

    <div class="w-25 bg-dark mx-auto mt-5 text-center text-white py-5  rounded">
        <h5>Login In/ Sign Up</h5>

        <form action="" method="post" class="mx-3" onsubmit="return validateLoginForm()">
            <input type="text" class="form-control mb-3 fw-bold" name="email" id="email" placeholder="Enter the email" required>
            <input type="password" class="form-control mb-3 fw-bold" name="password" id="password" placeholder="Enter the password" required>
            <input type="submit" class="btn btn-success fw-bold" name="login" value="Log In">
            <a href="./register.php" class="btn btn-primary fw-bold text-white">Sign Up</a>
        </form>
    </div>

    <?php
    // Check if the login form is submitted
    if (isset($_POST['login'])) {
        require "config.php";

        $email = $_POST["email"];
        $password = $_POST["password"];

        // Query the database to check if the user exists with the provided email and password
        $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // User login is successful
            echo "<div id='login-success' class='w-25 bg-success mx-auto mt-3 text-center text-white py-2 rounded'>Login Successful</div>";
            echo "<script>setTimeout(function() { document.getElementById('login-success').style.display = 'none'; }, 3000);</script>";
        } else {
            // User login failed
            echo "<div id='login-error' class='w-25 bg-danger mx-auto mt-3 text-center text-white py-2 rounded'>Login Failed</div>";
            echo "<script>setTimeout(function() { document.getElementById('login-error').style.display = 'none'; }, 3000);</script>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>


</html>