<?php
// Start the session
session_start();

// Include the database connection file
include('access.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Query to get the number of registered users
$userQuery = "SELECT COUNT(*) AS total_users FROM user WHERE usertype = 'user'";
$userResult = $conn->query($userQuery);
$userCount = 0; // Default value if query fails

if ($userResult && $userResult->num_rows > 0) {
    $row = $userResult->fetch_assoc();
    $userCount = $row['total_users'];
}

// Query to get the number of recipes added
$recipeQuery = "SELECT COUNT(*) AS total_recipes FROM item";
$recipeResult = $conn->query($recipeQuery);
$recipeCount = 0; // Default value if query fails

if ($recipeResult && $recipeResult->num_rows > 0) {
    $row = $recipeResult->fetch_assoc();
    $recipeCount = $row['total_recipes'];
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f4f4f4;
            height: 100vh;
        }

        h1 {
            margin-bottom: 40px;
            font-size: 36px;
            color: #003366;
        }

        .dashboard-boxes {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .dashboard-box {
            background-color: #ffffff;
            border: 2px solid #003366;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            width: 200px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-box h3 {
            color: #003366;
            margin-bottom: 10px;
        }

        .dashboard-box p {
            font-size: 24px;
            font-weight: bold;
            color: #ffcc00;
        }
    </style>
</head>
<body>
<div class="content">
    <h1>Welcome to the Admin Panel</h1>

    <div class="dashboard-boxes">
        <div class="dashboard-box">
            <h3>Registered Users</h3>
            <p><?php echo $userCount; ?></p> <!-- Display the dynamic user count -->
        </div>
        <div class="dashboard-box">
            <h3>Recipes Added</h3>
            <p><?php echo $recipeCount; ?></p> <!-- Display the dynamic recipe count -->
        </div>
    </div>
</div>
</body>
</html>
