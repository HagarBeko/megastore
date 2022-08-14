<?php
connect();

if (isset($_GET['edit_page'])) {

    $id = $_GET['id'];


    if (isset($_POST['tittle'])) {
        $tittle = strtolower($_POST['tittle']);
        $description = strtolower($_POST['area2']);
        $update = mysqli_query($con, "UPDATE pages SET tittle='$tittle' , description='$description' WHERE id='$id' ");
        if ($update) {
?>
            <div class="row">
                <div class="alert col-md-12 alert-success">User Updated Successfully</div>
                <meta http-equiv="refresh" content="1;url=?pages">
            </div>
    <?php
        }
    }
    // var_dump($id)
    $select_id = mysqli_query($con, "SELECT * FROM pages WHERE id='$id'");
    $my_id = mysqli_fetch_array($select_id);
    ?>


    <h1>Edit <?php echo $_GET['edit_page']; ?></h1>
    <form action="" method="post">
        <input type="text" class="form-control mb-2" name="tittle" placeholder="tittle" value="<?php echo $my_id['tittle']; ?>">
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a description here" name="area2" id="floatingTextarea2" style="height: 100px"><?php echo $my_id['description']; ?></textarea>
            <!-- <label for="floatingTextarea2">description</label> -->
        </div>
        <button type="submit" class=" form-control ">Save</button>

    </form><?php
        }
            ?>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
    });
</script>