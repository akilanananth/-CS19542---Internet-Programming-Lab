<?php
session_start();

// If the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Include the database connection file
include('access.php');

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Prepare the SQL DELETE query
    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    
    // Check if the prepare statement is successful
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the delete_id to the prepared statement
    $stmt->bind_param("i", $delete_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Member deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting member: " . $stmt->error . "</div>";
    }

    // Close the statement
    $stmt->close();
}

// Fetch members from the database  
$result = $conn->query("SELECT * FROM user WHERE usertype = 'user'");

if ($result === false) {
    echo "<div class='alert alert-danger'>Error fetching users: " . $conn->error . "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">View Members</h2>

    <!-- Redirects to the add_member.php page -->
    <a href="addmember.php" class="btn btn-primary mb-3">Add New Member</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['Email']); ?></td>
                        <td><?php echo htmlspecialchars($row['contact number']); ?></td>
                        <td>
                            <a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this member?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No members found.</td>
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
