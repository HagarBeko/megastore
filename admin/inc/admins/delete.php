<?php

include('../connect.php');
connect();
$myids = $_GET['id'];
$delete = mysqli_query($con, "DELETE  from admin WHERE id='$myids'");
?>
<div class="row">
    <div class="alert col-md-12 alert-success">User Deleted Successfully</div>
</div>
<meta http-equiv="refresh" content="1;url=../../index.php?admin_list">