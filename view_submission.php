<?php
include 'db.php';

$sql = "SELECT submission.*,
assignment.title

FROM submission

JOIN assignment
ON submission.assignment_id = assignment.assignment_id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Submissions</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Student Submissions</h1>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div style="background:white;
padding:15px;
margin-bottom:20px;
border:1px solid gray;">

<h2>
<?php echo $row['title']; ?>
</h2>

<p>
Student ID:
<?php echo $row['student_id']; ?>
</p>

<p>
<?php echo $row['submission_text']; ?>
</p>

<p>
Status:
<?php echo $row['status']; ?>
</p>

<a href="give_marks.php?id=<?php echo $row['submission_id']; ?>">
Give Marks
</a>

</div>

<?php
}
?>

</body>
</html>