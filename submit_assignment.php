<?php
include 'db.php';

$id = $_GET['id'];

if(isset($_POST['submit']))
{
    $student_id = $_POST['student_id'];
    $submission_text = $_POST['submission_text'];

    $sql = "INSERT INTO submission
            (assignment_id, student_id, submission_text, submission_date, status)

            VALUES

            ('$id', '$student_id', '$submission_text', NOW(), 'Submitted')";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo "Assignment Submitted Successfully";
    }
    else
    {
        echo "Submission Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Assignment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Submit Assignment</h1>

<form method="POST">

<label>Student ID</label>
<br>
<input type="number" name="student_id" required>

<br><br>

<label>Submission</label>
<br>

<textarea name="submission_text"
rows="8"></textarea>

<br><br>

<button type="submit" name="submit">
Submit Assignment
</button>

</form>

</body>
</html>