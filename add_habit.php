<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("includes/db.php");

if(isset($_POST['add'])){

    $user_id = $_SESSION['user_id'];
    $habit_name = $_POST['habit_name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO habits(user_id, habit_name, description, status, created_at)
            VALUES('$user_id','$habit_name','$description','Pending',CURDATE())";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Habit Added Successfully!');</script>";
    }else{
        echo "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Habit - HabitNest</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include("includes/navbar.php"); ?>

<div class="container">

<h1>🌿 HabitNest</h1>

<h2>➕ Add New Habit</h2>

<form method="POST">

<label>Habit Name</label>
<input type="text" name="habit_name" placeholder="Enter habit name" required>

<label>Description</label>
<textarea name="description" rows="5" placeholder="Enter a short description"></textarea>

<input type="submit" name="add" value="➕ Add Habit">

</form>

<br>

<p style="text-align:center;">
<a href="dashboard.php">🏠 Back to Dashboard</a>
</p>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>