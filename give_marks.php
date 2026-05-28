<?php
include 'db.php';

$id = $_GET['id'];

if(isset($_POST['submit']))
{
    $marks = $_POST['marks'];
    $remarks = $_POST['remarks'];

    $sql = "UPDATE submission

            SET marks='$marks',
            remarks='$remarks',
            status='Evaluated'

            WHERE submission_id='$id'";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo "Marks Updated";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Give Marks</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Evaluate Submission</h1>

<form method="POST">

<label>Marks</label>
<br>
<input type="number" name="marks">

<br><br>

<label>Remarks</label>
<br>

<textarea name="remarks"></textarea>

<br><br>

<button type="submit" name="submit">
Submit Evaluation
</button>

</form>

</body>
</html>