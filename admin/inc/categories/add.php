<div class="container">

    <div class="row">
        <h1 class="text-success mt-4 mb-4">Add category</h1>
    </div>
    <form action="" method="post">
        <?php
        if (isset($_POST["tittle"])) {
            connect();
            $tittle = $_POST["tittle"];

            if (empty($tittle)) {
                $error = "please enter your tittle";
            } else {
                $select_tittle = mysqli_query($con, "SELECT tittle FROM category WHERE tittle='$tittle'");
                $count_tittle = mysqli_num_rows($select_tittle);
                if ($count_tittle > 0) {
                    $error = "tittle is exist";
                } else {
                    $insert = mysqli_query($con, "INSERT INTO category (tittle) 
                        VALUES ('$tittle')") or die(mysqli_error($con));
                    mysqli_close($con);
                    // close connection

                    if ($insert) {
                        $success = "category Success added";
                    };
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

        <div class="row ">
            <input type="text" name="tittle" class="col-md-10 form-control mb-2 ms-2" placeholder="Enter tittle">
            <br>
            <button type="submit" class="btn btn-success col-md-2 mb-2 mt-2 ms-2">Add</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
    });
</script>