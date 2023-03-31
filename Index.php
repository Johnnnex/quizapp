<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="..quiz">
        <meta name="keywords" content="quiz">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign up</title>
        <link rel="stylesheet" href="css/Signup.css">
    </head>
<body>
    <div class="body">
        <div class="header">
    <h1 class="head">NAME'S QUIZZ</h1>
    <h1 class="head2">SIGN UP</h1>
    <h3>Sign up to be eligible for this quiz</h3>
        </div>
    <form action="" method="post">
    <p><label>Full Name</label></p>
    <input type="text" name="name" class="form-input" placeholder="Your name here...." autocomplete="on" required>
    <p><label>Email</label></p>
    <input type="email" name="email" class="form-input" placeholder="example@gmail.com" autocomplete="off" required>
    <p><label>Username</label></p>
    <input type="text" name="username" class="form-input" placeholder="Your desired username here...." autocomplete="on" required>
    <p><label>Country</label></p>
    <select name="country" class="form-input">
        <option disabled>Select your country</option>
        <option>Nigeria</option>
        <option>USA</option>
    </select>
    <p><label>Gender</label></p>
    <select name="gender" class="form-input">
        <option disabled>Select your gender</option>
        <option>Male</option>
        <option>Female</option>
    </select>
    <p><label>Password</label></p>
    <input type="password" name="password" class="form-input" placeholder="Password here..." autocomplete="off" required>
    <p><label>Confirm Password</label></p>
    <input type="password" name="cpassword" class="form-input" placeholder="Confirm password" autocomplete="off" required>
    <p class="check"><input type="checkbox" class="check" required><label class="footer">I agree to the <a href="#">terms &amp; conditions</a></label></p>
    <p><button name="submit" class="s-button">SIGN UP</button></p>
    <section class="footer">Already have an account? <a href="signin.php">sign in</a></section>
    <?php 
    include("php/signup.php");
    ?>
    </form>
</div>
</body>
</html>