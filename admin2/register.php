<!DOCTYPE html>
<html lang="en">
<?php
include("inc/connect.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Dashboard | Sign Up</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles -->
    <link rel="stylesheet" href="./css/style.min.css">
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <?php
            if (isset($_POST["username"])) {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $cPassword = $_POST["cpassword"];
                $hash = md5($password);
                connect();
                if (empty($username)) {
                    $error = "please enter your username";
                } elseif (empty($email)) {
                    $error = "please enter your email";
                } elseif (empty($password)) {
                    $error = "please enter your password";
                } elseif ($password < 6) {
                    $error = "please enter your password 6 chars";
                } elseif (empty($cPassword)) {
                    $error = "please enter your confirm password";
                } elseif ($password != $cPassword) {
                    $error = "please enter your password equal confirm password";
                } else {
                    $insert = mysqli_query($con, "INSERT INTO admin (username , email, password) VALUE ('$username','$email','$hash')");
                    header('location:login.php');
                    mysqli_close($con);
                }
            }
            ?>
            <h1 class="sign-up__title">Get started</h1>
            <p class="sign-up__subtitle">Start creating the best possible user experience for you customers</p>
            <form class="sign-up-form form" action="" method="post">
                <label class="form-label-wrapper">

                    <?php if (isset($error)) {

                    ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php
                    } ?>

                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">UserName</p>
                    <input class="form-input" type="text" name="username" placeholder="Enter your username" value="<?php if (isset($_POST['username'])) {
                                                                                                                        echo $_POST['username'];
                                                                                                                    } ?>">
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Email</p>
                    <input class="form-input" type="email" name="email" placeholder="Enter your email" value="<?php if (isset($_POST['email'])) {
                                                                                                                    echo $_POST['email'];
                                                                                                                } ?>">
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input class="form-input" type="password" name="password" placeholder="Enter your password">
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">confirmPassword</p>
                    <input class="form-input" type="password" name="cpassword" placeholder="Enter your confirm-password">
                </label>
                <button class="form-btn primary-default-btn transparent-btn" type="submit">register</button>
            </form>
        </article>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Chart library -->
    <script src="./plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
</body>

</html>