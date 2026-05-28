<?php
include 'db.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if($role == "teacher")
    {
        $sql = "SELECT * FROM teacher
                WHERE email='$email'
                AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            header("Location: teacher.php");
        }
        else
        {
            echo "<script>alert('Invalid Teacher Login')</script>";
        }
    }

    if($role == "student")
    {
        $sql = "SELECT * FROM student
                WHERE email='$email'
                AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            header("Location: student.php");
        }
        else
        {
            echo "<script>alert('Invalid Student Login')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="style.css">

    <style>

    .login-card{
        width:420px;
        margin:auto;
        background:white;
        padding:35px;
        border-radius:15px;
        box-shadow:0 4px 15px rgba(0,0,0,0.15);
        margin-top:40px;
    }

    .login-card h2{
        text-align:center;
        color:#0d47a1;
        margin-bottom:25px;
    }

    .role-box{
        display:flex;
        justify-content:space-between;
        margin-top:10px;
        margin-bottom:20px;
        gap:15px;
    }

    .role-option{
        flex:1;
        background:#e3f2fd;
        padding:15px;
        border-radius:10px;
        cursor:pointer;
        text-align:center;
        transition:0.3s;
        font-weight:bold;
        color:#0d47a1;
        border:2px solid transparent;
    }

    .role-option:hover{
        background:#bbdefb;
        transform:scale(1.03);
    }

    .role-option input{
        margin-right:8px;
    }

    button{
        width:100%;
    }

    </style>

</head>

<body>

<div class="navbar">
    Login Portal
</div>

<div class="container">

<div class="login-card">

<form method="POST">

<h2>System Login</h2>

<label>Email</label>
<input type="email" name="email" required>

<label>Password</label>
<input type="password" name="password" required>

<label>Select Role</label>

<div class="role-box">

<label class="role-option">
<input type="radio" name="role" value="student" required>
Student
</label>

<label class="role-option">
<input type="radio" name="role" value="teacher">
Teacher
</label>

</div>

<button type="submit" name="login">
Login
</button>

</form>

</div>

</div>

</body>
</html>