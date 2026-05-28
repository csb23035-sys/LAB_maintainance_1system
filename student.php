<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>

    <link rel="stylesheet" href="style.css">

    <style>

    .dashboard-box{
        display:flex;
        gap:30px;
        flex-wrap:wrap;
        justify-content:center;
        margin-top:40px;
    }

    .dashboard-item{
        background:white;
        width:280px;
        padding:30px;
        border-radius:15px;
        box-shadow:0 4px 15px rgba(0,0,0,0.15);
        text-align:center;
        transition:0.3s;
    }

    .dashboard-item:hover{
        transform:translateY(-8px);
    }

    .dashboard-item h3{
        color:#0d47a1;
        margin-bottom:15px;
    }

    .dashboard-item p{
        color:#555;
        margin-bottom:25px;
    }

    .dashboard-item a{
        text-decoration:none;
        background:#1565c0;
        color:white;
        padding:12px 20px;
        border-radius:6px;
        display:inline-block;
        transition:0.3s;
    }

    .dashboard-item a:hover{
        background:#0d47a1;
    }

    </style>

</head>

<body>

<div class="navbar">
    Student Dashboard
</div>

<div class="container">

<div class="dashboard-box">

<div class="dashboard-item">

<h3>View Assignments</h3>

<p>
Check assignments and submit laboratory work.
</p>

<a href="view_assignment.php">
Open
</a>

</div>

<div class="dashboard-item">

<h3>View Results</h3>

<p>
Check assignment marks and teacher remarks.
</p>

<a href="view_result.php">
Open
</a>

</div>

<div class="dashboard-item">

<h3>Attend MCQ Quiz</h3>

<p>
Start online timed MCQ examination.
</p>

<a href="view_quiz.php">
Open
</a>

</div>

<div class="dashboard-item">

<h3>Quiz Results</h3>

<p>
Check automatically generated quiz marks.
</p>

<a href="view_quiz_result.php">
Open
</a>

</div>

</div>

</div>

</body>
</html>