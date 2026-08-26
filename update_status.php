<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("includes/db.php");

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "UPDATE habits
        SET status='Completed'
        WHERE id='$id' AND user_id='$user_id'";

mysqli_query($conn,$sql);

header("Location:view_habits.php");
exit();
?>