<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="...quiz">
        <meta name="keywords" content="quiz">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In</title>
        <link rel="stylesheet" href="css/Signin.css">
    </head>
<body>
    <div class="body">
        <div class="header">
    <h1 class="head">NAME QUIZZ</h1>
    <h1 class="head2">SIGN IN</h1>
    <h3>Sign in to be able to take this quiz</h3>
        </div>
    <form action="" method="post">
    <p><label>Username or Email</label></p>
    <input type="text" name="username" class="form-input" placeholder="Your username/ Email here...." autocomplete="on" required>
    <p><label>Password</label></p>
    <input type="password" name="password" class="form-input-pass" placeholder="Input your password here.." autocomplete="off" required>
    <p class="check"><input type="checkbox" class="check" required><label class="footer">I agree to the <a href="#">terms &amp; conditions</a></label></p>
    <p><button name="submit" class="s-button">SIGN IN</button></p>
    <section class="footer">Don't have an account yet? <a href="Index.php">sign up</a></section>
    <?php
    include ("php/signinphp.php");
    ?>
    </form>
</body>
</html>