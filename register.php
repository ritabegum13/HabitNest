<?php
include("includes/db.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $check);

if(mysqli_num_rows($result) > 0)
{
    echo "<script>alert('Email already exists!');</script>";
}
else
{
    $sql = "INSERT INTO users(name, email, password)
            VALUES('$name', '$email', '$password')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Registration Successful!');</script>";
    }
    else
    {
        echo "Error!";
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - HabitNest</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Create Account</h2>

<form method="POST">

Name:<br>
<input type="text" name="name" required><br><br>

Email:<br>
<input type="email" name="email" required><br><br>

Password:<br>
<input type="password" name="password" required><br><br>

<input type="submit" name="register" value="Register">

</form>

</body>
</html>