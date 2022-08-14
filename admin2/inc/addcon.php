<?php
include("connect.php");
connect();
if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cPassword = $_POST["cpassword"];
    $hash = md5($password);
    // if (empty($username)) {
    //     $error = "please enter your username";
    // } elseif (empty($email)) {
    //     $error = "please enter your email";
    // } elseif (empty($password)) {
    //     $error = "please enter your password";
    // } elseif ($password < 6) {
    //     $error = "please enter your password 6 chars";
    // } elseif (empty($cpassword)) {
    //     $error = "please enter your confirm password";
    // } elseif ($cpassword != $password) {
    //     $error = "please enter your password equal confirm password";
    // } else {
    $insert = mysqli_query($con, "INSERT INTO admin (username , email, password) VALUE ('$username','$email','$hash')");

    mysqli_close($con);
}
// }

header('location:../register.php');
