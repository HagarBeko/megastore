<div class="container">

    <div class="row">
        <h1 class="text-white mt-4 mb-4">Add Admin</h1>
    </div>
    <form action="" method="post">
        <?php
        if (isset($_POST["username"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $cPassword = $_POST["cpassword"];
            $hash = md5($password);

            if (empty($username)) {
                $error = "please enter your username";
            } elseif (empty($email) || !(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
                $error = "please enter your email";
            } elseif (empty($password)) {
                $error = "please enter your password";
            } elseif (empty($cPassword)) {
                $error = "please enter your confirmed Password";
            } elseif ($cPassword != $password) {
                $error = "please enter your check your Password";
            } elseif ($cPassword != $password) {
                $error = "please enter your check your Password";
            } else {
                connect();
                $insert = mysqli_query($con, "INSERT INTO admin (username,email,password) 
                        VALUES ('$username','$email','$hash')") or die(mysqli_error($con));
                mysqli_close($con);
                // close connection

                if ($insert) {
                    $success = "Admin Success added";
                }
            };
        };

        ?>
        <div class="row">
            <!-- <input type="text" class="col-md-12 form-control mb-2"> -->
            <label class="form-label-wrapper">

                <?php if (isset($error)) {

                ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php
                } ?>


                <?php if (isset($success)) {



                ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                    <!-- <meta http-equiv="refresh" content="0;url=inc/admins/done.php"> -->
                <?php
                } ?>

            </label>
        </div>

        <div class="row">
            <input type="text" name="username" class="col-md-12 form-control mb-2" placeholder="Enter Username">
            <br>
            <input type="email" name="email" class="col-md-12 form-control mb-2" placeholder="Enter email">
            <br>
            <input type="password" name="password" class="col-md-12 form-control mb-2" placeholder="Enter password">
            <br>
            <input type="password" name="cpassword" class="col-md-12 form-control mb-2" placeholder="confirm password">
            <button type="submit" class="btn btn-success col-md-2 mb-2">Add</button>
        </div>
    </form>
</div>