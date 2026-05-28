<?php
include 'db.php';

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO assignment(title, description, due_date)
            VALUES('$title', '$description', '$due_date')";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo "Assignment Added Successfully";
    }
    else
    {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Assignment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Add Assignment</h1>

<form method="POST">

<label>Title</label>
<br>
<input type="text" name="title" required>

<br><br>

<label>Description</label>
<br>
<textarea name="description"></textarea>

<br><br>

<label>Due Date</label>
<br>
<input type="date" name="due_date">

<br><br>

<button type="submit" name="submit">
Add Assignment
</button>

</form>

</body>
</html>