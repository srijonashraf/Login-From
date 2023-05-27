<?php
include 'headTagContainer.php';
?>


<body>
    <div class="w-25 bg-dark mx-auto mt-5 text-center text-white py-5 rounded">
        <h5>Sign Up</h5>
        <form action="" method="post" class="mx-3" onsubmit="return validateLoginForm()">
            <input type="text" name="name" id="name" class="form-control mb-3 fw-bold" placeholder="Enter name" required>
            <input type="text" class="form-control mb-3 fw-bold" name="email" id="email" placeholder="Enter the email" required>
            <input type="password" class="form-control mb-3 fw-bold" name="password" id="password" placeholder="Enter the password" required>
            <input type="submit" class="btn btn-primary fw-bold" name="signup" value="Sign Up">
            <a href="./index.php" class="btn btn-success fw-bold text-white">Login</a>
        </form>
    </div>
    <?php
    if (isset($_POST['signup'])) {
        require "config.php";

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Check if the email already exists in the database
        $checkEmailQuery = "SELECT * FROM `user` WHERE `email` = '$email'";
        $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($checkEmailResult) > 0) {
            // Email already exists, display an alert message
            echo "<div id='email-exists' class='w-25 bg-danger mx-auto mt-3 text-center text-white py-2 rounded'>The user already exists!</div>";
            // echo "<script>setTimeout(function() { document.getElementById('email-exists').style.display = 'none'; }, 3000);</script>";
        } else {
            // Email does not exist, proceed with the signup process
            $sql = "INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";

            if (mysqli_query($conn, $sql)) {
                echo "<div id='signup-success' class='w-25 bg-success mx-auto mt-3 text-center text-white py-2 rounded'>Signed Up Successfully</div>";
                echo "<script>setTimeout(function() { document.getElementById('signup-success').style.display = 'none'; }, 3000);</script>";
            } else {
                echo "<div id='signup-error' class='w-25 bg-danger mx-auto mt-3 text-center text-white py-2 rounded'>Sign Up Error!</div>";
                echo "<script>setTimeout(function() { document.getElementById('signup-error').style.display = 'none'; }, 3000);</script>";
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>


</html>