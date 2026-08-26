<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("includes/db.php");

$user_id = $_SESSION['user_id'];

$search = "";
$status = "";

if(isset($_GET['search']))
{
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

if(isset($_GET['status']))
{
    $status = mysqli_real_escape_string($conn, $_GET['status']);
}

$sql = "SELECT * FROM habits WHERE user_id='$user_id'";

if($search != "")
{
    $sql .= " AND habit_name LIKE '%$search%'";
}

if($status != "")
{
    $sql .= " AND status='$status'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Habits - HabitNest</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("includes/navbar.php"); ?>

<div class="container">
<h1>🌿 HabitNest</h1>

<h2>📋 My Habits</h2>

<form method="GET">

<input type="text"
name="search"
placeholder="🔍 Search Habit"
value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">

<select name="status">

<option value="">All</option>

<option value="Pending"
<?php if(isset($_GET['status']) && $_GET['status']=="Pending") echo "selected"; ?>>
Pending
</option>

<option value="Completed"
<?php if(isset($_GET['status']) && $_GET['status']=="Completed") echo "selected"; ?>>
Completed
</option>

</select>

<input type="submit" value="Search">

</form>

<br>

<table>

<tr>
    <th>ID</th>
    <th>Habit</th>
    <th>Description</th>
    <th>Status</th>
    <th>Date</th>
    <th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['habit_name']; ?></td>

<td><?php echo $row['description']; ?></td>

<td>
<?php
if($row['status']=="Completed")
{
    echo "✅ Completed";
}
else
{
    echo "⏳ Pending";
}
?>
</td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="edit_habit.php?id=<?php echo $row['id']; ?>">✏️ Edit</a>
|
<a href="delete_habit.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this habit?');">
🗑️ Delete
</a>
|

<?php
if($row['status']=="Pending")
{
?>
<a href="update_status.php?id=<?php echo $row['id']; ?>">✅ Complete</a>

<?php
}
else
{
    echo "✔ Done";
}
?>

</td>

</tr>

<?php
}
?>

</table>

<br><br>

<p style="text-align:center;">
<a href="dashboard.php">🏠 Back to Dashboard</a>
</p>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>