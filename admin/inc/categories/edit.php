<?php
connect();

if (isset($_GET['edit_category'])) {

    $id = $_GET['id'];


    if (isset($_POST['tittle'])) {
        $tittle = strtolower($_POST['tittle']);
        $update = mysqli_query($con, "UPDATE category SET tittle='$tittle'  WHERE id='$id' ");
        if ($update) {
?>
            <div class="row">
                <div class="alert col-md-12 alert-success">User Updated Successfully</div>
                <meta http-equiv="refresh" content="1;url=?category">
            </div>
    <?php
        }
    }
    // var_dump($id)
    $select_id = mysqli_query($con, "SELECT * FROM category WHERE id='$id'");
    $my_id = mysqli_fetch_array($select_id);
    ?>


    <h1 class="te">Edit <?php echo $_GET['edit_category']; ?></h1>
    <form action="" method="post">
        <input type="text" class="form-control mb-2" name="tittle" placeholder="tittle" value="<?php echo $my_id['tittle']; ?>">
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