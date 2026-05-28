<?php
include 'db.php';

if(isset($_POST['create']))
{
    $title = $_POST['title'];

    $total_questions = $_POST['total_questions'];

    $duration = $_POST['duration'];

    $sql = "INSERT INTO quiz
    (title,total_questions,duration)

    VALUES

    ('$title','$total_questions','$duration')";

    mysqli_query($conn,$sql);

    $quiz_id = mysqli_insert_id($conn);

    echo "
    <script>

    alert('Quiz Created Successfully');

    window.location='add_question.php?quiz_id=$quiz_id';

    </script>
    ";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Create Quiz</title>

<link rel="stylesheet" href="style.css">

<style>

.quiz-card{
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 4px 12px rgba(0,0,0,0.15);
}

</style>

</head>

<body>

<div class="navbar">
Create MCQ Quiz
</div>

<div class="container">

<div class="quiz-card">

<form method="POST">

<h2>Create Quiz</h2>

<label>Quiz Title</label>
<input type="text" name="title" required>

<label>Total Questions</label>
<input type="number" name="total_questions" required>

<label>Quiz Duration (Minutes)</label>
<input type="number" name="duration" required>

<button type="submit" name="create">
Create Quiz
</button>

</form>

</div>

</div>

</body>
</html>