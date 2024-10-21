<?php
session_start();

// Check if the user is logged in
if(!isset($_SESSION["username"])) {
    header("location:login.php");
    exit();
}

// Get the logged-in username
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Horizon', sans-serif;
            display: flex;
            height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #003366; /* Dark blue */
            color: white;
            padding: 20px;
            overflow-y: auto;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffcc00; /* Golden yellow */
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: #ffcc00; /* Golden yellow */
            text-decoration: none;
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #00509e; /* Lighter blue on hover */
        }

        .content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            background-color: #f4f4f4;
        }

        iframe {
            width: 100%;
            height: calc(100vh - 20px); /* Adjust the height of iframe */
            border: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2><?php echo $username; ?></h2> <!-- Display the logged-in username instead of ADMIN -->
        <ul>
            <li><a href="as.php" target="content-frame">Dashboard</a></li>
            <li><a href="managerecipe.php" target="content-frame">Manage Recipes</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    
    <div class="content">
        <!-- The iframe where content from the sidebar links will load -->
        <iframe name="content-frame" src="as.php"></iframe>
    </div>
</body>
</html>
