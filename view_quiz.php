<?php
include 'db.php';

$sql = "SELECT * FROM quiz";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>MCQ Quizzes</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">
Available MCQ Quizzes
</div>

<div class="container">

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<div class="assignment-box">

<h2>
<?php echo $row['title']; ?>
</h2>

<p>
Questions:
<?php echo $row['total_questions']; ?>
</p>

<p>
Duration:
<?php echo $row['duration']; ?> Minutes
</p>

<a href="start_quiz.php?id=<?php echo $row['quiz_id']; ?>">
Start Quiz
</a>

</div>

<?php
}
?>

</div>

</body>
</html>