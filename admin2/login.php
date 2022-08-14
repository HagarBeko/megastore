<!DOCTYPE html>
<html lang="en">
<?php
include("inc/connect.php");
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Dashboard | Sign In</title>
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="./css/style.min.css">
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <?php
            connect();
            if (isset($_POST["email"])) {
                $email = mysqli_escape_string($con, $_POST["email"]);
                $password = md5($_POST["password"]);
                $query  = "SELECT * FROM `admin` WHERE `email` = '" . $email . "' and `password` = '" . $password . "' LIMIT 1";
                $result = mysqli_query($con, $query);

                if ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    header('location:index.php');
                } else {
                    $error = 'invalid email or password';
                }
                mysqli_close($con);
            }

            ?>
            <h1 class="sign-up__title">Welcome back!</h1>
            <p class="sign-up__subtitle">Sign in to your account to continue</p>
            <form class="sign-up-form form" action="" method="post">
                <label class="form-label-wrapper">

                    <?php if (isset($error)) {

                    ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php
                    } ?>

                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Email</p>
                    <input class="form-input" type="email" name="email" placeholder="Enter your email" required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input class="form-input" type="password" name="password" placeholder="Enter your password" required>
                </label>
                <a class="link-info forget-link" href="##">Forgot your password?</a><br>
                <a class="link-info forget-link" href="register.php">not account yet ?</a>
                <button class="form-btn primary-default-btn transparent-btn">Sign in</button>
            </form>
        </article>
    </main>
    <!-- Chart library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="./plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
</body>

</html>