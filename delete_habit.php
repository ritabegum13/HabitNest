<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("includes/db.php");

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM habits WHERE id='$id' AND user_id='$user_id'";

mysqli_query($conn, $sql);

header("Location: view_habits.php");
exit();
?>