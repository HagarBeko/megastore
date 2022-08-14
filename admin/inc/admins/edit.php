<?php
connect();
$id = $_GET['id'];


if (isset($_POST['email'])) {
    $username = strtolower($_POST['username']);
    $email = strtolower($_POST['email']);
    $update = mysqli_query($con, "UPDATE admin SET email='$email' , username='$username' WHERE id='$id' ");
    if ($update) {
?>
        <div class="row">
            <div class="alert col-md-12 alert-success">User Updated Successfully</div>
            <meta http-equiv="refresh" content="1;url=?admin_list">

        </div>
<?php
    }
}
$select_user = mysqli_query($con, "SELECT * FROM admin WHERE id='$id'");
$aaaa = mysqli_fetch_array($select_user);
?>


<h1>Edit <?php echo $_GET['edit_admin']; ?></h1>
<form action="" method="post">
    <input type="text" class="form-control mb-2" name="username" placeholder="Username" value="<?php echo $aaaa['username']; ?>">
    <input type="email " class=" form-control mb-2" name="email" placeholder="email" value="<?php echo $aaaa['email']; ?>">


    <button type="submit" class=" form-control ">Save</button>

</form>