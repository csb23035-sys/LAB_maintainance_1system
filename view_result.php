<?php
include 'db.php';

$sql = "SELECT submission.*,
assignment.title

FROM submission

JOIN assignment
ON submission.assignment_id = assignment.assignment_id

ORDER BY submission.assignment_id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assignment Results</title>
    <link rel="stylesheet" href="style.css">

    <style>

    .result-card{
        background:white;
        padding:25px;
        margin-bottom:25px;
        border-radius:12px;
        box-shadow:0 4px 12px rgba(0,0,0,0.12);
        border-left:8px solid #1565c0;
    }

    .result-card h2{
        color:#0d47a1;
        margin-top:0;
    }

    .result-table{
        width:100%;
        border-collapse:collapse;
        margin-top:15px;
    }

    .result-table td{
        padding:12px;
        border-bottom:1px solid #ddd;
    }

    .label{
        font-weight:bold;
        width:180px;
        color:#333;
    }

    .marks{
        color:green;
        font-weight:bold;
        font-size:18px;
    }

    .remarks{
        color:#444;
        font-style:italic;
    }

    </style>

</head>

<body>

<div class="navbar">
    Assignment Results
</div>

<div class="container">

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<div class="result-card">

<h2>
<?php echo $row['title']; ?>
</h2>

<table class="result-table">

<tr>
<td class="label">Student ID</td>
<td><?php echo $row['student_id']; ?></td>
</tr>

<tr>
<td class="label">Submission Status</td>
<td><?php echo $row['status']; ?></td>
</tr>

<tr>
<td class="label">Marks Obtained</td>
<td class="marks">
<?php echo $row['marks']; ?>
</td>
</tr>

<tr>
<td class="label">Teacher Remarks</td>
<td class="remarks">
<?php echo $row['remarks']; ?>
</td>
</tr>

</table>

</div>

<?php
}
?>

</div>

</body>
</html>