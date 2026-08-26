<?php
session_start();
include("includes/db.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1)
{
    $user = mysqli_fetch_assoc($result);

    if(password_verify($password, $user['password']))
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];

        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "<script>alert('Incorrect Password!');</script>";
    }
}
else
{
    echo "<script>alert('Email not found!');</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - HabitNest</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h2>Login</h2>

<form method="POST">

<label>Email</label>
<input type="email" name="email" required>

<label>Password</label>
<input type="password" name="password" required>

<input type="submit" name="login" value="Login">

</form>

<p style="text-align:center; margin-top:15px;">
Don't have an account?
<a href="register.php">Register</a>
</p>

</div>

</body>
</html>