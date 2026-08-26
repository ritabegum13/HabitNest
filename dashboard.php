<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("includes/db.php");

$user_id = $_SESSION['user_id'];

// Total Habits
$total_query = "SELECT COUNT(*) AS total FROM habits WHERE user_id='$user_id'";
$total_result = mysqli_query($conn, $total_query);
$total = mysqli_fetch_assoc($total_result)['total'];

// Completed Habits
$completed_query = "SELECT COUNT(*) AS completed FROM habits WHERE user_id='$user_id' AND status='Completed'";
$completed_result = mysqli_query($conn, $completed_query);
$completed = mysqli_fetch_assoc($completed_result)['completed'];

// Pending Habits
$pending = $total - $completed;

// Completion Percentage
$percentage = 0;

if($total > 0){
    $percentage = round(($completed / $total) * 100);
}

// Greeting
date_default_timezone_set("Asia/Dhaka");

$hour = date("G");

if($hour < 12){
    $greeting = "🌅 Good Morning";
}
elseif($hour < 18){
    $greeting = "☀️ Good Afternoon";
}
else{
    $greeting = "🌙 Good Evening";
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - HabitNest</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include("includes/navbar.php"); ?>

<div class="dashboard-container">

    <!-- Hero Section -->

    <section class="hero">

        <div class="hero-text">

            <p class="welcome">
                <?php echo $greeting . ", " . $_SESSION['name']; ?> 👋
            </p>

            <h1>
                Build Better Habits.<br>
                Become Your Best Self. 🌿
            </h1>

            <p class="hero-description">
                Track your daily habits, stay consistent,
                and watch your progress grow.
            </p>

            <a href="add_habit.php" class="hero-button">
                ➕ Add New Habit
            </a>

        </div>

        <div class="hero-visual">

            <div class="plant">
                🌱
            </div>

            <div class="plant-text">
                Keep Growing!
            </div>

        </div>

    </section>


    <!-- Statistics -->

    <h2 class="section-title">
        📊 Your Habit Overview
    </h2>

    <div class="cards">

        <div class="dashboard-card">

            <div class="card-icon">
                📊
            </div>

            <h3>Total Habits</h3>

            <h1><?php echo $total; ?></h1>

            <p>Habits created</p>

        </div>


        <div class="dashboard-card completed-card">

            <div class="card-icon">
                ✅
            </div>

            <h3>Completed</h3>

            <h1><?php echo $completed; ?></h1>

            <p>Habits completed</p>

        </div>


        <div class="dashboard-card pending-card">

            <div class="card-icon">
                ⏳
            </div>

            <h3>Pending</h3>

            <h1><?php echo $pending; ?></h1>

            <p>Keep going!</p>

        </div>


        <div class="dashboard-card progress-card">

            <div class="card-icon">
                📈
            </div>

            <h3>Progress</h3>

            <h1><?php echo $percentage; ?>%</h1>

            <p>Overall completion</p>

        </div>

    </div>


    <!-- Progress Section -->

    <section class="progress-section">

        <div class="progress-header">

            <h2>🌱 Your Growth</h2>

            <strong><?php echo $percentage; ?>%</strong>

        </div>

        <div class="progress-bar">

            <div
                class="progress-fill"
                style="width: <?php echo $percentage; ?>%;">
            </div>

        </div>

        <?php

        if($percentage == 100){

            echo "<p class='motivation'>🎉 Amazing! You completed all your habits!</p>";

        }
        elseif($percentage >= 75){

            echo "<p class='motivation'>🔥 You're doing amazing! Keep it up!</p>";

        }
        elseif($percentage >= 50){

            echo "<p class='motivation'>💪 Great progress! Don't stop now!</p>";

        }
        elseif($percentage > 0){

            echo "<p class='motivation'>🌱 Every small step counts. Keep growing!</p>";

        }
        else{

            echo "<p class='motivation'>🌿 Start your journey today!</p>";

        }

        ?>

    </section>


    <!-- Quick Actions -->

    <section class="quick-actions">

        <h2>⚡ Quick Actions</h2>

        <div class="action-buttons">

            <a href="add_habit.php" class="action-button">
                ➕ Add Habit
            </a>

            <a href="view_habits.php" class="action-button">
                📋 View My Habits
            </a>

        </div>

    </section>

</div>


<?php include("includes/footer.php"); ?>

</body>

</html>