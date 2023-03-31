<?php
include("connection.php");
if(isset($_POST["submit"])){
    $name = htmlentities(mysqli_real_escape_string($connect, $_POST['name']));
    $email = htmlentities(mysqli_real_escape_string($connect, $_POST['email']));
    $username = htmlentities(mysqli_real_escape_string($connect, $_POST['username']));
    $country = htmlentities(mysqli_real_escape_string($connect, $_POST['country']));
    $gender = htmlentities(mysqli_real_escape_string($connect, $_POST['gender']));
    $password = htmlentities(mysqli_real_escape_string($connect, $_POST['password']));
    $cpassword = htmlentities(mysqli_real_escape_string($connect, $_POST['cpassword']));

    if ($name == ''){
        echo"<script>alert('You did not input your name!')</script>";
        echo "<script>window.open('Index.php', '_self')</script>";
        exit();
    }
    if ($username == ''){
        echo"<script>alert('You did not input your name!')</script>";
        echo "<script>window.open('Index.php', '_self')</script>";
        exit();
    }
    if (strlen($password) < 8){
        echo"<script>alert('Your password should be more than 8 characters')</script>";
        echo "<script>window.open('Index.php', '_self')</script>";
        exit();
    }
    if ($cpassword != $password) {
        echo"<script>alert('Your password is not the same as your confirm password')</script>";
        echo "<script>window.open('Index.php', '_self')</script>";
        exit();
    }
    $emailcheck = "select * from users where Email = '$email'";
    $run = mysqli_query($connect, $emailcheck);
    $check = mysqli_num_rows($run);
    //check database for existing email
    $usernamecheck = "select * from users where Username = '$username'";
    $runagn = mysqli_query($connect, $usernamecheck);
    $checkagn = mysqli_num_rows($runagn);
    //check database for existing username
    if ($check == 1){
        echo "<script>alert('Email already exists, try another!')</script>";
        exit();
    }
    /*to check if email exists*/
    if ($checkagn == 1){
        echo "<script>alert('Username already exists, try another!')</script>";
        exit();
    }
    /*to check if username exists*/
    $gotoDB = "insert into users (Name, Email, Username, Country, Gender, Password, confirmpass, status) values('$name', '$email', '$username', '$country', '$gender', '$password', '$cpassword', 'undone')";
    $rungotoDB = mysqli_query($connect, $gotoDB);
    if ($rungotoDB){
        echo"<script>alert('Congratulations $username, signup success, sign in and take your quiz!')</script>";
        echo"<script>window.open('signin.php', '_self')</script>";
    }
}


?>