<?php
include 'db.php';

$sql = "SELECT quiz_result.*,
quiz.title

FROM quiz_result

JOIN quiz
ON quiz_result.quiz_id = quiz.quiz_id";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Quiz Results</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">
Quiz Results
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
Marks:
<?php echo $row['marks']; ?>
</p>

<p>
Submitted On:
<?php echo $row['submission_time']; ?>
</p>

</div>

<?php
}
?>

</div>

</body>
</html>