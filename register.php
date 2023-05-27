<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>

    <div class="w-25 bg-dark mx-auto mt-5 text-center text-white py-5 rounded">
        <h5>Sign Up</h5>

        <form action="" method="post" class="mx-3">
            <input type="text" name="name" id="" class="form-control mb-3 fw-bold" placeholder="Enter name">
            <input type="text" class="form-control mb-3 fw-bold" name="email" placeholder="Enter the email">
            <input type="password" class="form-control mb-3 fw-bold" name="password" placeholder="Enter the password">
            <input type="submit" class="btn btn-primary fw-bold" name="signup" value="Sign Up">
            <a href="./index.php" class="btn btn-success fw-bold text-white">Login</a>

            <?php
            if (isset($_POST['signup'])) {
                require "config.php";

                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];

                $sql = "INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";

                if (mysqli_query($conn, $sql)) {
                    echo "<div class='w-50 bg-success mx-auto mt-3 text-center text-white py-2 rounded'>Signed Up Successfully</div>";
                } else {
                    echo "<div class='w-50 bg-danger mx-auto mt-3 text-center text-white py-2 rounded'>Sign Up Error!</div>";
                }
            }
            ?>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>