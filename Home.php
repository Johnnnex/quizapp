<?php
        session_start();
        include ("php/connection.php");
        if (!isset($_SESSION['username'])){
            header("Location: signin.php");
        }
        else{
        $user = $_SESSION['username']; 
        $check_db = "SELECT * FROM users WHERE Username = '$user'";
        ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Whiz hards quiz</title>
        <meta charset="utf-8">
        <meta name="Nicely programmed site" aria-keyshortcuts="" keywords="javascript, functions">
        <link rel="stylesheet" href="css/homecss.css">
    </head>
    <body>
        <div class="body" id="maincontent">
    <h1 class="head">SAM WHIZ QUIZZ</h1>
    <section class="head"><p class="head">Think loosely....get burnt,     ....think hard...burn others</p></section>
      <h2 class="body">Welcome <g id="good"><?php echo"$user";?></g> to the Sam Whiz Quizz</h2>  
      <h4 class="body">Build great minds, and test your intelligence</h4>
        <div class="menu">
    <p class="body"><a class="body" onclick = "popUp()" href="#">Start quiz </a></p>
    <p class="body"><a class="body" href="help.html">Help center</a></p>
    <p class="body"><a class="body" href="">About</a></p>
    <p class="body"><a class="body" href="">Invite friends</a></p>
    <p class="body"><a class="body" href="">Team</a></p>
       </div>
        <p class="footer">Hello,&nbsp<sam id="goo"><?php echo"$user";?></sam>&nbspread our&nbsp<a href="#">terms and conditions&nbsp</a>&amp<a href="#">&nbspprivacy policy</a></p> 
        </div>
    <script>
        function popUp(){
            document.getElementById('blur').style.display ='block';
            let blur = document.getElementById('maincontent').style.filter = 'blur(10px)';
            document.getElementById('maincontent').style.transition = '1s';
            if (blur) {
                document.getElementById('maincontent').style.pointerEvents = 'none';
            }
        }
       </script>
    <div class="submenu" id="blur"><h1>Are you ready to take this quiz??</h1>
        <div class="btn">
        <form method="post">
            <button class="btn btn-success" name="takequiz" >Yes, i'm ready!</button>
        </form>
        <button class="btn btn-danger" onclick="dropPopUp()">No, take me back</button>
    </div>
        <script>
            function dropPopUp() {
            document.getElementById('blur').style.display ='none';
            let blur = document.getElementById('maincontent').style.filter = 'blur(0px)';
            document.getElementById('maincontent').style.transition = '1s';
            if (blur) {
                document.getElementById('maincontent').style.pointerEvents = 'all';
            }
            }
        </script>
                   <?php
                   if (isset($_POST['takequiz'])) {
                       global $user;
                       global $connect;
                       $check_db = "SELECT * FROM users WHERE Username = '$user'";
                       $runquery = mysqli_query($connect, $check_db);
                       $fetchdata = mysqli_fetch_array($runquery); 
                       $status = $fetchdata['status'];
                       if ($status == 'done') {
                           echo "
                           <script>alert('You have taken this quiz before, you cannot take it again!') </script>
                           <script>window.open('Home.php', '_self')</script>";
                           exit();
                       }
                       else {
                       $select_user = "UPDATE users SET status = 'done' WHERE Username = '$user'";
                       $connect_to_DB = mysqli_query($connect, $select_user);
                       if ($connect_to_DB){
                           echo "<script>window.open('practiceRules.php', '_self')</script>";
                       }
                   }
                   }
                   ?>
    </body>
</html>
<?php
        }
?>