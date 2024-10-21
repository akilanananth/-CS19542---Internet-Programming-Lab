<?php
session_start();

// If the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection file
include('access.php');

// Get the logged-in user's username
$loggedInUser = $_SESSION['username'];

// Fetch items (recipes) added by the logged-in user from the `item` table
$result = $conn->query("SELECT * FROM item WHERE user = '$loggedInUser'");

if ($result === false) {
    echo "<div class='alert alert-danger'>Error fetching items: " . $conn->error . "</div>";
}

// Handle item (recipe) deletion if 'delete_id' is passed in the URL
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    // Delete the item (recipe) from the database
    $deleteQuery = "DELETE FROM item WHERE id = $delete_id AND user = '$loggedInUser'";
    
    if ($conn->query($deleteQuery)) {
        // After deletion, redirect back to the same page
        header("Location: managerecipe.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error deleting item: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Recipes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Manage Recipes</h2>

    <!-- Redirects to the addrecipe.php page for adding a new recipe -->
    <a href="addrecipe.php" class="btn btn-primary mb-3">Add New Recipe</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Recipe Title</th>
                <th>Ingredients</th>
                <th>Instructions</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['recipe_title']); ?></td>
                        <td><?php echo htmlspecialchars($row['ingredients']); ?></td>
                        <td><?php echo htmlspecialchars($row['instruction']); ?></td>
                        <td>
                            <a href="managerecipe.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this recipe?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No recipes found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection after fetching and displaying the data
$conn->close();
?>
