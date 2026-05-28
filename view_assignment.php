<?php
include 'db.php';

$sql = "SELECT * FROM assignment";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assignments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    Assignment List
</div>

<div class="container">

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div class="assignment-box">

<h2>
<?php echo $row['title']; ?>
</h2>

<p>
<?php echo $row['description']; ?>
</p>

<p>
<b>Due Date:</b>
<?php echo $row['due_date']; ?>
</p>

<a href="submit_assignment.php?id=<?php echo $row['assignment_id']; ?>">
Submit Assignment
</a>

</div>

<?php
}
?>

</div>

</body>
</html>