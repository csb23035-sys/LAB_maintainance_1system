<?php
include 'db.php';

$quiz_id = $_GET['quiz_id'];

$quiz = mysqli_query($conn,
"SELECT * FROM quiz WHERE quiz_id='$quiz_id'");

$quiz_data = mysqli_fetch_assoc($quiz);

$quiz_title = $quiz_data['title'];

$total_questions = $quiz_data['total_questions'];

$count_query = mysqli_query($conn,
"SELECT COUNT(*) AS total_added
FROM questions
WHERE quiz_id='$quiz_id'");

$count_data = mysqli_fetch_assoc($count_query);

$questions_added = $count_data['total_added'];

$current_question = $questions_added + 1;

if(isset($_POST['add']))
{
    $question = $_POST['question'];

    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];

    $correct_option = $_POST['correct_option'];

    $sql = "INSERT INTO questions

    (quiz_id,question,option1,option2,
    option3,option4,correct_option)

    VALUES

    ('$quiz_id','$question','$option1',
    '$option2','$option3','$option4',
    '$correct_option')";

    mysqli_query($conn,$sql);

    $next_question = $current_question + 1;

    if($next_question <= $total_questions)
    {
        header("Location:add_question.php?quiz_id=$quiz_id");
    }
    else
    {
        echo "
        <script>

        alert('All Questions Added Successfully');

        window.location='view_quiz.php';

        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Questions</title>

<link rel="stylesheet" href="style.css">

<style>

.question-card{
    background:white;
    padding:35px;
    border-radius:18px;
    box-shadow:0 4px 15px rgba(0,0,0,0.15);
}

.quiz-info{
    background:#e3f2fd;
    padding:20px;
    border-radius:12px;
    margin-bottom:25px;
    line-height:35px;
}

.quiz-info h2{
    color:#0d47a1;
    margin-top:0;
}

.current-box{
    background:#1565c0;
    color:white;
    padding:15px;
    border-radius:10px;
    text-align:center;
    font-size:22px;
    font-weight:bold;
    margin-bottom:25px;
}

textarea{
    height:120px;
}

</style>

</head>

<body>

<div class="navbar">
Add MCQ Questions
</div>

<div class="container">

<div class="question-card">

<div class="quiz-info">

<h2>
Quiz Details
</h2>

<b>Quiz ID:</b>
<?php echo $quiz_id; ?>

<br>

<b>Quiz Name:</b>
<?php echo $quiz_title; ?>

<br>

<b>Total Questions:</b>
<?php echo $total_questions; ?>

<br>

<b>Questions Added:</b>
<?php echo $questions_added; ?>

</div>

<div class="current-box">

Currently Adding:
Question
<?php echo $current_question; ?>

of

<?php echo $total_questions; ?>

</div>

<form method="POST">

<label>Question</label>

<textarea name="question" required></textarea>

<label>Option 1</label>
<input type="text" name="option1" required>

<label>Option 2</label>
<input type="text" name="option2" required>

<label>Option 3</label>
<input type="text" name="option3" required>

<label>Option 4</label>
<input type="text" name="option4" required>

<label>Correct Option</label>

<select name="correct_option" required>

<option value="">Select Correct Option</option>

<option value="option1">Option 1</option>

<option value="option2">Option 2</option>

<option value="option3">Option 3</option>

<option value="option4">Option 4</option>

</select>

<br><br>

<button type="submit" name="add">

<?php
if($current_question == $total_questions)
{
    echo "Finish Quiz";
}
else
{
    echo "Add Next Question";
}
?>

</button>

</form>

</div>

</div>

</body>
</html>