<div class="container">

    <div class="row">
        <h1 class="text-success mt-4 mb-4">Add images</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        if (isset($_POST["description"])) {
            connect();
            $tittle = $_POST["description"];
            if (empty($tittle)) {
                $error = "please upload your description";
            } else {
                $select_tittle = mysqli_query($con, "SELECT images FROM image WHERE description='$tittle'");
                $count_tittle = mysqli_num_rows($select_tittle);
                if ($count_tittle > 0) {
                    $error = "tittle is exist";
                } else {
                    $name = $_FILES['image']['name'];
                    $type = $_FILES['image']['type'];
                    $size = $_FILES['image']['size'];
                    $errors = $_FILES['image']['error'];
                    $tmp = $_FILES['image']['tmp_name'];
                    $result = '';
                    $chr = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789";
                    for ($i = 0; $i < 10; $i++) {
                        $result .= $chr[rand(0, 61)];
                    }
                    $cut = explode(".", $name);
                    $new_name = $cut[0] . "_" . $result . "." . $cut[count($cut) - 1];
                    $location = dirname(__FILE__) . "/upload/";
                    $full = $location . $new_name;
                    if ($errors == UPLOAD_ERR_OK) {
                        move_uploaded_file($tmp, $full);
                        $success = "the image is uploaded";
                    } else {
                        $default = "../../upload/nophoto.jpg";
                    }

                    $insert = mysqli_query($con, "INSERT INTO image (images,description) 
                        VALUES ('$new_name','$tittle')") or die(mysqli_error($con));
                    mysqli_close($con);
                    // close connection

                    if ($insert) {
                        $success = "images Success added";
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
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Upload image</label>
                <input class="form-control" name="image" type="file" id="formFileMultiple" multiple>
            </div>
            <br>
            <input type="text" name="description" class="col-md-12 form-control mb-2 ms-2" placeholder="Enter description">
            <br>
            <button type="submit" class="btn btn-success col-md-2 mb-2 mt-2 ms-2">Upload Image</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
    });
</script>