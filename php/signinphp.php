<?php
session_start();
include ("connection.php");
 if (isset($_POST["submit"])){
    $username = htmlentities(mysqli_real_escape_string($connect, $_POST["username"]));
    $userpass = htmlentities(mysqli_real_escape_string($connect, $_POST["password"]));


    if (strlen($userpass) < 8){
        echo "<script>alert('Your password length should be more than eight!')</script>";
        exit();
    }
    $checkDB = "SELECT * FROM users WHERE (Email = '$username') OR (Username = '$username') AND Password = '$userpass' ";
    $dbquery = mysqli_query($connect, $checkDB);
    $runcheck = mysqli_num_rows($dbquery);
    $get_username = "SELECT * FROM users WHERE Password = '$userpass'";
    $connecttoDB = mysqli_query($connect, $get_username);
    $fetchuserdata = mysqli_fetch_array($connecttoDB);
    $user = $fetchuserdata['Username'];
    if ($runcheck == 1){
        echo "<script>alert('Congratulations $user, go ahead and take the quiz!')</script>";
        echo "<script>window.open('Home.php', '_self')</script>";
    }
    else {
        echo "<script>alert('Signin failed, try again!')</script>";
        echo "<script>window.open('signin.php', '_self')</script>";
    }
    $_SESSION['username'] = $user;
 }




?>