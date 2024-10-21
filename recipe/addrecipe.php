<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection file
include('access.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $recipe_title = $_POST['recipe_title'];
    $ingredients = $_POST['ingredients'];
    $instruction = $_POST['instruction'];
    
    // Get the logged-in user's username
    $loggedInUser = $_SESSION['username'];

    // Prepare the SQL query to insert data into the `item` table
    $stmt = $conn->prepare("INSERT INTO item (recipe_title, ingredients, instruction, user) VALUES (?, ?, ?, ?)");

    // Check if the prepare statement is successful
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the parameters to the statement (s - string)
    $stmt->bind_param("ssss", $recipe_title, $ingredients, $instruction, $loggedInUser);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>New recipe added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Add New Recipe</h2>

    <form action="addrecipe.php" method="POST">
        <div class="form-group">
            <label for="recipe_title">Recipe Title</label>
            <input type="text" class="form-control" id="recipe_title" name="recipe_title" required>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <input type="text" class="form-control" id="ingredients" name="ingredients" required>
        </div>

        <div class="form-group">
            <label for="instruction">Instructions</label>
            <textarea class="form-control" id="instruction" name="instruction" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
