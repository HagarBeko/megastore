<?php
include("inc/head.php");
// session_start();

?>
</head>

<body>
    <?php
    include("inc/header.php");
    ?>
    <div class="layer"></div>
    <section class="h-100 py-5 mt-5" style="background-color: #eee;">
        <div class="container  card-body col-4 h-100 py-5" style="background-color: #D9F8C4;">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="register.php" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                </li>
            </ul>
            <!-- Pills navs -->
            <?php
            connect();
            if (isset($_POST["email"])) {
                $email = mysqli_escape_string($con, $_POST["email"]);
                $password = md5($_POST["password"]);
                $query  = "SELECT * FROM `users` WHERE `email` = '" . $email . "' and `password` = '" . $password . "' LIMIT 1";
                $result = mysqli_query($con, $query);

                if ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['id_user'] = $row['id'];
                    $_SESSION['email_user'] = $row['email'];
                    $_SESSION['username_user'] = $row['username'];
                    // header('location:index.php');
            ?>
                    <meta http-equiv="refresh" content="1;url=index.php">
            <?php
                } else {
                    $error = 'invalid email or password';
                }
                mysqli_close($con);
            }

            ?>
            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form action="" method="post">
                        <div class="text-center mb-3">
                            <p>Sign in with:</p>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-github"></i>
                            </button>
                        </div>

                        <p class="text-center">or:</p>
                        <label class="form-label-wrapper">

                            <?php if (isset($error)) {

                            ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php
                            } ?>

                        </label>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="loginName" class="form-control" placeholder="Email" name="email" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control" placeholder="Password" name="password" />
                        </div>

                        <!-- 2 column grid layout -->
                        <div class="row mb-4">

                            <div class="col-md-12 d-flex justify-content-center">
                                <!-- Simple link -->
                                <a href="#!">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block mb-4 ">Sign in</button>
                        </div>
                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="#!">Register</a></p>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">

                </div>
            </div>
            <!-- Pills content -->
        </div>
    </section>
    <?php
    include("inc/footer.php")
    ?>
</body>

</html>