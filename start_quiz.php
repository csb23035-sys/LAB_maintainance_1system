<?php
include 'db.php';

$quiz_id = $_GET['id'];

$quiz = mysqli_query($conn,
"SELECT * FROM quiz WHERE quiz_id='$quiz_id'");

$quiz_data = mysqli_fetch_assoc($quiz);

$title = $quiz_data['title'];

$duration = $quiz_data['duration'];

$total_questions = $quiz_data['total_questions'];

$sql = "SELECT * FROM questions
        WHERE quiz_id='$quiz_id'";

$result = mysqli_query($conn,$sql);

$marks = 0;

$student_id = 1;

$student_name = "Amartya Das";

if(isset($_POST['submit']))
{
    foreach($_POST['answer'] as $question_id => $answer)
    {
        $check = mysqli_query($conn,
        "SELECT * FROM questions
        WHERE question_id='$question_id'");

        $row = mysqli_fetch_assoc($check);

        $correct = $row[$row['correct_option']];

        if($correct == $answer)
        {
            $marks++;
        }
    }

    mysqli_query($conn,

    "INSERT INTO quiz_result
    (student_id,quiz_id,marks,submission_time)

    VALUES

    ('$student_id','$quiz_id','$marks',NOW())");

    $rank_query = mysqli_query($conn,

    "SELECT COUNT(*)+1 AS rank_position

    FROM quiz_result

    WHERE quiz_id='$quiz_id'

    AND marks > '$marks'");

    $rank_data = mysqli_fetch_assoc($rank_query);

    $rank = $rank_data['rank_position'];

    mysqli_query($conn,

    "UPDATE quiz_result

    SET rank_position='$rank'

    WHERE student_id='$student_id'

    AND quiz_id='$quiz_id'

    ORDER BY result_id DESC

    LIMIT 1");

    $topper_query = mysqli_query($conn,

    "SELECT *

    FROM quiz_result

    WHERE quiz_id='$quiz_id'

    ORDER BY marks DESC

    LIMIT 1");

    $topper = mysqli_fetch_assoc($topper_query);

    $topper_marks = $topper['marks'];

?>

<!DOCTYPE html>
<html>
<head>

<title>Quiz Result</title>

<link rel="stylesheet" href="style.css">

<style>

.result-box{
    width:550px;
    margin:auto;
    margin-top:80px;
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 4px 20px rgba(0,0,0,0.15);
    text-align:center;
}

.result-box h1{
    color:#1b5e20;
    margin-bottom:20px;
}

.result-box h2{
    color:#1565c0;
    margin-bottom:20px;
}

.score{
    font-size:38px;
    color:#0d47a1;
    font-weight:bold;
    margin:25px 0;
}

.rank{
    background:#e3f2fd;
    padding:15px;
    border-radius:10px;
    margin-top:20px;
    font-size:22px;
    color:#0d47a1;
    font-weight:bold;
}

.topper{
    background:#fff8e1;
    padding:20px;
    border-radius:10px;
    margin-top:25px;
}

.topper h3{
    color:#f57f17;
}

.topper p{
    font-size:20px;
    color:#444;
}

.thank{
    margin-top:25px;
    color:#555;
    font-size:18px;
}

</style>

</head>

<body>

<div class="result-box">

<h1>
Quiz Completed Successfully
</h1>

<h2>
<?php echo $title; ?>
</h2>

<div class="score">

<?php echo $marks; ?>

out of

<?php echo $total_questions; ?>

</div>

<div class="rank">

Your Rank:
<?php echo $rank; ?>

</div>

<div class="topper">

<h3>
Quiz Topper
</h3>

<p>
Topper Name:
<b>
Amartya Das
</b>
</p>

<p>
Topper Marks:
<b>
<?php echo $topper_marks; ?>
</b>
</p>

</div>

<div class="thank">

Thank You For Attending The Quiz

</div>

<br><br>

<a href="student.php">

<button>
Back To Dashboard
</button>

</a>

</div>

</body>
</html>

<?php
exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Quiz</title>

<link rel="stylesheet" href="style.css">

<script>

let timeLeft = <?php echo $duration * 60; ?>;

function timer()
{
    let minutes = Math.floor(timeLeft/60);

    let seconds = timeLeft%60;

    if(seconds < 10)
    {
        seconds = "0" + seconds;
    }

    document.getElementById("timer").innerHTML =
    minutes + ":" + seconds;

    timeLeft--;

    if(timeLeft < 0)
    {
        document.getElementById("quizForm").submit();
    }
}

setInterval(timer,1000);

</script>

<style>

body{
    background:#f0f2f5;
}

.quiz-header{
    width:800px;
    margin:auto;
    margin-top:30px;
    background:white;
    padding:30px;
    border-radius:15px;
    border-top:10px solid #673ab7;
}

.question-card{
    width:800px;
    margin:auto;
    margin-top:25px;
    background:white;
    padding:30px;
    border-radius:15px;
}

.option{
    padding:15px;
    border:1px solid #ddd;
    border-radius:10px;
    margin-bottom:15px;
    display:block;
    cursor:pointer;
}

.timer{
    background:#e8f0fe;
    padding:12px;
    width:200px;
    border-radius:10px;
    text-align:center;
    font-size:20px;
    color:#0d47a1;
    font-weight:bold;
}

.submit-box{
    text-align:center;
    margin:30px;
}

.submit-btn{
    background:#673ab7;
    color:white;
    border:none;
    padding:15px 40px;
    border-radius:8px;
    font-size:18px;
}

</style>

</head>

<body>

<form method="POST" id="quizForm">

<div class="quiz-header">

<h1>
<?php echo $title; ?>
</h1>

<p>
Total Questions:
<?php echo $total_questions; ?>
</p>

<div class="timer">

Time Left:
<span id="timer"></span>

</div>

</div>

<?php
$qno = 1;

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="question-card">

<h3>

Q<?php echo $qno; ?>.

<?php echo $row['question']; ?>

</h3>

<label class="option">

<input type="radio"
name="answer[<?php echo $row['question_id']; ?>]"
value="<?php echo $row['option1']; ?>">

<?php echo $row['option1']; ?>

</label>

<label class="option">

<input type="radio"
name="answer[<?php echo $row['question_id']; ?>]"
value="<?php echo $row['option2']; ?>">

<?php echo $row['option2']; ?>

</label>

<label class="option">

<input type="radio"
name="answer[<?php echo $row['question_id']; ?>]"
value="<?php echo $row['option3']; ?>">

<?php echo $row['option3']; ?>

</label>

<label class="option">

<input type="radio"
name="answer[<?php echo $row['question_id']; ?>]"
value="<?php echo $row['option4']; ?>">

<?php echo $row['option4']; ?>

</label>

</div>

<?php
$qno++;
}
?>

<div class="submit-box">

<button type="submit"
name="submit"
class="submit-btn">

Submit Quiz

</button>

</div>

</form>

</body>
</html>