<?php
include("../admin/inc/connect.php");
connect();
$id = $_POST['id'];
$select_address = mysqli_query($con, "SELECT * FROM addresses Where id='$id' ");
$address = mysqli_fetch_array($select_address);
echo json_encode($address);
