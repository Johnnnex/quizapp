<?php
        session_start();
        include ("php/connection.php");
        if (!isset($_SESSION['username'])){
            header("Location: signin.php");
        }
        else{
        $user = $_SESSION['username'];
        ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Quiz</title>
        <meta charset="utf-8">
        <meta name="Nicely programmed site" aria-keyshortcuts="" keywords="javascript, functions">

        <link rel="stylesheet" href="css/quizPractice.css ">
    </head>
    <body>
        <h2 class="head">John's quizz</h2>
        <main>
        <?php
        //get questions from database
        $reqquestions = "SELECT * FROM questions ORDER BY rand()";
        $con = mysqli_query($connect, $reqquestions);
        $no = 1;
        while (($array = mysqli_fetch_array($con)) && ($no <= 50)) {
            $questions = $array['Questions'];
            $answer1 = $array['Answers'];
            $answer2 = $array['Otherans1'];
            $answer3 = $array['Otherans2'];
            $answer4 = $array['Otherans3'];
            $qn_array = [$answer1, $answer2, $answer3, $answer4];
            shuffle($qn_array);
            //shuffle answers--
            echo "
            <div class=" ."questions"." id="."question".$no .">".
                "<h1 class=" ."qn-header".">Question " .$no .":</h1>".
                "<p class=" ."qn-header".">" .$questions ."</p>".
                "<section class=" ."radios" .">";
            for ($i=0; $i<4; $i++) {
                    $ans = $qn_array[$i];
                    if ($ans == $answer1) {
                        $id = "true";
                    }
                    else {
                        $id = "false";
                    }
                    global $id;
                    echo "<p class=" ."Options" ."><input type=" ."radio"." id=" .$id.$no ." name=" ."question" .$no .">" .$ans ."</p>";
        }
        if ($no == 1){
            echo "
            <p class=" ."button-foot" .">
            <button disabled>PREVIOUS</button>
            <button onClick=" ."questionNext(" .$no .")>NEXT</button>
            </p>
            </section>".
            "</div>";
        }
        else if ($no == 40) {
            echo "
            <p class=" ."button-foot" .">
            <button onClick=" ."questionPrev(" .$no .")>PREVIOUS</button>
            <button disabled>NEXT</button>
            </p>
            </section>".
            "</div>";
        }
        else {
            echo "
            <p class=" ."button-foot" .">
            <button onClick=" ."questionPrev(" .$no .")>PREVIOUS</button>
            <button onClick=" ."questionNext(" .$no .")>NEXT</button>
            </p>
            </section>".
            "</div>";
        }
            $no++;
        }

        ?>
        <button class="btn-submit" onclick="finalScore()">SUBMIT</button>
        <script>
            //display questions separately
            let num;
                function questionPrev(num){
                    let numPrev = num - 1;
                    let elementId = "question" +num;
                    let questionsSlide = document.getElementById(elementId);
                    questionsSlide.style.display = "none";
                    let elementId2 = "question" +numPrev;
                    let questionsSlide2 = document.getElementById(elementId2);
                    questionsSlide2.style.display = "block";
                }
                function questionNext(num){
                    let numNext = num + 1;
                    let elementId = "question" +num;
                    let questionsSlide = document.getElementById(elementId);
                    questionsSlide.style.display = "none";
                    let elementId2 = "question" +numNext;
                    let questionsSlide2 = document.getElementById(elementId2);
                    questionsSlide2.style.display = "block";
                }
            //get finalscore using Js--
    function finalScore(){
        let score = 0;
        let no;
        for (no=1; no<=3; no++) {
            if (document.getElementById('true'+no).checked == true){
            score +=5;
            }
        }
        document.getElementById('results').classList.add('display');
        document.getElementById('score').innerHTML = score;
        let remarks;
        if (score <= 25) {
            remarks = "You didn't do well, try again next time!";
            document.getElementById('extra-remark').classList.add('poor');
        }
        else if (score > 25 && score < 50) {
            remarks = "You tried, but you didn't reach the half mark!";
            document.getElementById('extra-remark').classList.add('poor');
        }
        else if (score = 50) {
            remarks = "This is just half way, you can do better!";
            document.getElementById('extra-remark').classList.add('average');
        }
        else if (score > 50 && score < 75){
            remarks = "Good job, you're yet to get there, push harder!";
            document.getElementById('extra-remark').classList.add('betterr');
        }
        else if (score > 75) {
            remarks = "Good!, you've done well";
            document.getElementById('extra-remark').classList.add('success');
        }
        document.getElementById('extra-remark').innerHTML = remarks;
            
                
    }
        </script>
        <div id="results">
            <h3>You Scored:</h3>
            <b id="score"></b>
            <p id="extra-remark"></p>
            <form method="post">
                <button name="submit">Finish</button>
            </form>
        </div>
        </main>
</body>
</html>
<?php
        }
        ?>