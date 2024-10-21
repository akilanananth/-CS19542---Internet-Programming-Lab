<?php
session_start(); // Start the session

// Include the database connection file
include('access.php');

// Fetch items (recipes) from the `item` table
$result = $conn->query("SELECT * FROM item");

if ($result === false) {
    echo "<div class='alert alert-danger'>Error fetching items: " . $conn->error . "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Recipe Management System</title>
    <style>
        .custom-navbar {
            height: 80px; /* Increases the height of the navbar */
            background-color: #f8f9fa; /* Optional: Change the background color */
        }

        .custom-navbar .navbar-brand {
            font-size: 1.8rem; /* Increases the size of the brand text */
        }

        .custom-navbar .nav-link {
            font-size: 1.5rem; /* Increases the size of the links */
        }

        .custom-navbar .navbar-nav .nav-item {
            padding: 0 15px; /* Adds space between the nav items */
        }

        .wrapper {
            margin: 50px auto;
            border-radius: 10px;
            padding-top: 50px;
            padding-bottom: 50px;
            box-shadow: 0 0 40px 2px rgba(37, 73, 214, 0.18);
        }

        .feature-box {
            padding: 30px;
        }

        .feature-box h1 {
            margin-top: 20%;
            color: #0000FF;
        }
        h1,h5{
          color: #0000FF;
        }

        .feature-box p {
            margin: 50px auto;
        }

        .feature-img {
            width: 80%;
            height: 90%;
            padding: 20px;
        }

        .card {
            margin-bottom: 20px; /* Space between cards */
            text-align: center; /* Center align text within the card */
            box-shadow: 0 0 40px 2px rgba(37, 73, 214, 0.18);
        }

        .recipe-title {
            font-size: 1.5rem; /* Increased title size */
            font-weight: bold; /* Bold title */
        }

        .recipe-ingredients,
        .recipe-instructions,
        .recipe-user {
            margin-top: 10px; /* Space above each section */
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg custom-navbar">
    <a class="navbar-brand">RECIPE MANAGEMENT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="/images/menu.png">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto text-right">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="feature-box">
                    <h1>Recipe Management System</h1>
                    <p>Welcome to recipe world.
                        <br>
                        Jump into the world of cooking.<br>
                        Get the recipes of your favourite food.<br>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="home.jpg" class="feature-img">
            </div>
        </div>
    </div> <!-- End of wrapper -->
</div> <!-- End of container -->

<!-- New Title for Recipes -->
<h1 class="text-center mt-5">Recipes</h1>

<div class="container mt-4"> <!-- Added container for recipe cards -->
    <div class="row">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="recipe-title"><?php echo htmlspecialchars($row['recipe_title']); ?></h5>
                            <p class="recipe-ingredients"><strong>Ingredients:</strong> <br><?php echo htmlspecialchars($row['ingredients']); ?></p>
                            <p class="recipe-instructions"><strong>Instructions:</strong><br><?php echo htmlspecialchars($row['instruction']); ?></p>
                            <p class="recipe-user"><strong>By:</strong><br><?php echo htmlspecialchars($row['user']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No recipes found.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3oAiL7DyW07e4x8RArD0T0iC0s6D2D0d4vYI5fQQ0gD1tbIIT5YyWkGrYB1H3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JZR6Spejh4uc8p1C2r7B8EdO3L8eCewiS5I4WlgF8B6m1OBk0VRbOM7ozg5uqD2h" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Close the database connection after fetching and displaying the data
$conn->close();
?>
