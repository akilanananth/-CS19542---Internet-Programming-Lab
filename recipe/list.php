<?php
session_start();

// If the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection file
include('access.php');

// Fetch items (recipes) along with the user who added them from the `item` table
$result = $conn->query("SELECT item.id, item.recipe_title, user.username FROM item JOIN user ON item.user = user.username");

if ($result === false) {
    echo "<div class='alert alert-danger'>Error fetching items: " . $conn->error . "</div>";
}

// Handle item (recipe) deletion if 'delete_id' is passed in the URL
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    // Delete the item (recipe) from the database
    $deleteQuery = "DELETE FROM item WHERE id = $delete_id";
    
    if ($conn->query($deleteQuery)) {
        // After deletion, redirect back to the same page
        header("Location: list.php");
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
    <title>List Recipes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">List of Recipes</h2>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Recipe Title</th>
                <th>Added By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['recipe_title']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td>
                            <a href="list.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this recipe?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No recipes found.</td>
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
