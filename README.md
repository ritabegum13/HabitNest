# 🌿 HabitNest

A simple and modern web-based **Habit Tracking System** developed using PHP and MySQL. HabitNest helps users create, manage, and track their daily habits while monitoring their overall progress.

---

## 📌 Project Overview

HabitNest is a web application designed to help users build and maintain positive habits.

The system allows users to:

- Create an account
- Log in securely
- Add new habits
- View their existing habits
- Edit habit information
- Mark habits as completed or pending
- Delete habits
- Monitor overall habit progress
- Log out securely

The dashboard provides a simple overview of the user's habit activity and completion progress.

---

## 🎯 Objectives

The main objectives of HabitNest are:

1. To provide a simple platform for managing daily habits.
2. To allow users to track their habit completion.
3. To provide a visual overview of habit progress.
4. To implement user registration and login functionality.
5. To store habit and user information using a MySQL database.
6. To create a clean and user-friendly interface.

---

## ✨ Key Features

### 👤 User Authentication
- User registration
- User login
- Session-based authentication
- Logout functionality

### ➕ Habit Management
- Add new habits
- View all personal habits
- Edit existing habits
- Delete habits
- Update habit completion status

### 📊 Dashboard
The dashboard displays:

- Total habits
- Completed habits
- Pending habits
- Overall completion percentage
- Progress information
- Quick action buttons

### 🎨 User Interface
- Clean green-themed design
- Responsive layout
- Navigation bar
- Interactive buttons
- Animated dashboard cards
- Animated progress bar
- Responsive mobile layout

---

## 🛠️ Technologies Used

| Technology | Purpose |
|------------|---------|
| **HTML** | Structure of web pages |
| **CSS** | Styling, layout, animations and responsive design |
| **PHP** | Backend logic and server-side processing |
| **MySQL** | Database management |
| **XAMPP** | Local development server |
| **JavaScript** | Client-side functionality |

---

## 📁 Project Structure

```text
HabitNest/
│
├── css/
│   └── style.css
│
├── images/
│
├── includes/
│   ├── db.php
│   ├── navbar.php
│   └── footer.php
│
├── js/
│
├── add_habit.php
├── dashboard.php
├── delete_habit.php
├── edit_habit.php
├── index.php
├── login.php
├── logout.php
├── register.php
├── update_status.php
└── view_habits.php
## 🗄️ Database
HabitNest uses MySQL to store application data.

The database stores information related to:

Users
Habits
Habit completion status

The database connection is handled through:

includes/db.php

⚙️ Installation and Setup
1. Install XAMPP

Install XAMPP and start:

Apache
MySQL
2. Copy the Project

Place the HabitNest folder inside the XAMPP htdocs directory.

Example:

E:\xampp\htdocs\HabitNest
3. Create the Database

Open:

http://localhost/phpmyadmin

Create the required HabitNest database and tables.

4. Configure Database Connection

Open:

includes/db.php

Configure the database connection according to your local MySQL settings.

5. Run the Project

Open your browser and visit:

http://localhost/HabitNest/
🔄 Application Workflow
Registration
     ↓
Login
     ↓
Dashboard
     ↓
Add Habit
     ↓
View Habits
     ↓
Update Status
     ↓
Edit / Delete Habit
     ↓
Track Progress
     ↓
Logout
📊 Dashboard

The dashboard provides an overview of the user's habits.

It displays:

Total Habits
Completed Habits
Pending Habits
Overall Progress

The progress percentage is calculated based on completed habits.

🎨 Design

HabitNest uses a clean green-based visual theme representing growth and consistency.

The interface includes:

Green color palette
Rounded cards
Navigation bar
Hover effects
Animated cards
Animated progress bar
Responsive layout

The main styling is contained in:

css/style.css
🚀 Future Improvements

Possible future improvements include:

Habit streak tracking
Calendar-based habit tracking
Reminder notifications
Habit categories
Daily/weekly/monthly statistics
Progress charts
Dark mode
Email notifications
Mobile application version

👩‍💻 Developer

RB

HabitNest was developed as an academic web development project.

📄 License

This project is developed for educational and academic purposes.
