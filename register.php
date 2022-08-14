<?php
include("inc/head.php");

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
                    <a class="nav-link " id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="register.php" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade  " id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form>
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

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="loginName" class="form-control" />
                            <label class="form-label" for="loginName">Email or username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control" />
                            <label class="form-label" for="loginPassword">Password</label>
                        </div>

                        <!-- 2 column grid layout -->
                        <div class="row mb-4">
                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-3 mb-md-0">
                                    <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                    <label class="form-check-label" for="loginCheck"> Remember me </label>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <!-- Simple link -->
                                <a href="#!">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="#!">Register</a></p>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
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
                            $insert = mysqli_query($con, "INSERT INTO users (username , email, password) VALUE ('$username','$email','$hash')");
                            // header('location:login');
                            mysqli_close($con); ?>
                            <meta http-equiv="refresh" content="1;url=login.php">
                    <?php
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="text-center mb-3">
                            <p>Sign up with:</p>
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


                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="registerUsername" class="form-control" placeholder="Username" name="username" value="<?php if (isset($_POST['username'])) {
                                                                                                                                            echo $_POST['username'];
                                                                                                                                        } ?>" />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="registerEmail" class="form-control" placeholder="Email" name="email" value="<?php if (isset($_POST['email'])) {
                                                                                                                                    echo $_POST['email'];
                                                                                                                                } ?>" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="registerPassword" class="form-control" placeholder="Password" name="password" />
                        </div>

                        <!-- Repeat Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="registerRepeatPassword" class="form-control" placeholder="confirm password" name="cpassword" />
                        </div>


                        <!-- Submit button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block mb-3">Sign up</button>
                        </div>
                    </form>
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