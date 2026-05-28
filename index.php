<!DOCTYPE html>
<html>
<head>
    <title>Online Laboratory Assignment System</title>
    <link rel="stylesheet" href="style.css">

    <style>

    .home-container{
        display:flex;
        justify-content:center;
        gap:40px;
        margin-top:40px;
        flex-wrap:wrap;
    }

    .home-card{
        background:white;
        width:300px;
        padding:30px;
        border-radius:15px;
        box-shadow:0 4px 15px rgba(0,0,0,0.15);
        text-align:center;
        transition:0.3s;
    }

    .home-card:hover{
        transform:translateY(-8px);
    }

    .home-card h2{
        color:#0d47a1;
    }

    .home-card p{
        color:#555;
        margin-bottom:25px;
    }

    .home-card a{
        text-decoration:none;
        background:#1565c0;
        color:white;
        padding:12px 22px;
        border-radius:6px;
        display:inline-block;
        transition:0.3s;
    }

    .home-card a:hover{
        background:#0d47a1;
    }

    .logo{
        text-align:center;
        margin-top:30px;
    }

    .logo img{
        width:180px;
    }

    .welcome-text{
        text-align:center;
        margin-top:15px;
    }

    .welcome-text h1{
        color:#0d47a1;
    }

    .welcome-text p{
        color:#555;
        font-size:17px;
    }

    </style>

</head>

<body>

<div class="navbar">
    Online Laboratory Assignment System
</div>

<div class="logo">

<img src="TU logo.jpg">

</div>

<div class="welcome-text">

<h1>Tezpur University</h1>

<p>
Welcome to the Online Laboratory Assignment Maintenance System
</p>

</div>

<div class="container">

<div class="home-container">

<div class="home-card">

<h2>Login Portal</h2>

<p>
Login as Student or Teacher to access the system dashboard.
</p>

<a href="login.php">
Login
</a>

</div>

<div class="home-card">

<h2>Assignments</h2>

<p>
View all available assignments and submission details.
</p>

<a href="view_assignment.php">
View Assignments
</a>

</div>

</div>

</div>

</body>
</html>