<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard</title>

    <link rel="stylesheet" href="style.css">

    <style>

    body{
        background:#f0f2f5;
    }

    .dashboard-box{
        display:flex;
        gap:30px;
        flex-wrap:wrap;
        justify-content:center;
        margin-top:40px;
    }

    .dashboard-item{
        background:white;
        width:300px;
        padding:30px;
        border-radius:18px;
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
        font-size:24px;
    }

    .dashboard-item p{
        color:#555;
        margin-bottom:25px;
        line-height:25px;
    }

    .dashboard-item a{
        text-decoration:none;
        background:#1565c0;
        color:white;
        padding:12px 25px;
        border-radius:8px;
        display:inline-block;
        transition:0.3s;
        font-size:16px;
    }

    .dashboard-item a:hover{
        background:#0d47a1;
    }

    .welcome-box{
        background:white;
        padding:30px;
        border-radius:18px;
        text-align:center;
        box-shadow:0 4px 15px rgba(0,0,0,0.12);
    }

    .welcome-box h1{
        color:#0d47a1;
        margin-bottom:10px;
    }

    .welcome-box p{
        color:#555;
        font-size:18px;
    }

    </style>

</head>

<body>

<div class="navbar">
    Teacher Dashboard
</div>

<div class="container">

<div class="welcome-box">

<h1>
Welcome Teacher
</h1>

<p>
Online Laboratory Assignment and MCQ Quiz Management System
</p>

</div>

<div class="dashboard-box">

<div class="dashboard-item">

<h3>
Add Assignment
</h3>

<p>
Create new laboratory assignments for students.
</p>

<a href="add_assignment.php">
Open
</a>

</div>

<div class="dashboard-item">

<h3>
View Submissions
</h3>

<p>
Check submitted assignments and evaluate students.
</p>

<a href="view_submission.php">
Open
</a>

</div>

<div class="dashboard-item">

<h3>
Create Quiz
</h3>

<p>
Create Google Forms style MCQ quizzes with timer.
</p>

<a href="create_quiz.php">
Open
</a>

</div>

<div class="dashboard-item">

<h3>
Manage Quiz
</h3>

<p>
View quizzes and add questions to existing quizzes.
</p>

<a href="view_quiz.php">
Open
</a>

</div>

<div class="dashboard-item">

<h3>
Quiz Results
</h3>

<p>
View student quiz marks, topper and rankings.
</p>

<a href="view_quiz_result.php">
Open
</a>

</div>

<div class="dashboard-item">

<h3>
Logout
</h3>

<p>
Exit from teacher dashboard securely.
</p>

<a href="login.php">
Logout
</a>

</div>

</div>

</div>

</body>
</html>