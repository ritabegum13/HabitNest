<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("includes/db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM habits WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $habit_name = $_POST['habit_name'];
    $description = $_POST['description'];

    $update = "UPDATE habits
               SET habit_name='$habit_name',
                   description='$description'
               WHERE id='$id'";

    if(mysqli_query($conn,$update)){
        header("Location: view_habits.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Habit</title>
</head>
<body>

<?php include("includes/navbar.php"); ?>

<div class="container">
<h2>Edit Habit</h2>

<form method="POST">

Habit Name:<br>
<input type="text"
name="habit_name"
value="<?php echo $row['habit_name']; ?>" required>

<br><br>

Description:<br>

<textarea name="description"><?php echo $row['description']; ?></textarea>

<br><br>

<input type="submit" name="update" value="Update Habit">

</form>

<br>

<a href="view_habits.php">Back</a>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>