<?php
// Include the database connection file
include('access.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];  // Assuming password is in plain text
    $contact_number = $_POST['contact_number'];

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO user (username, email, password, `contact number`, usertype) VALUES (?, ?, ?, ?, 'user')");

    // Check if the prepare statement is successful
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);  // This will display any SQL errors
    }

    // Bind the parameters (s - string, i - integer, d - double, b - blob)
    $stmt->bind_param("ssss", $username, $email, $password, $contact_number);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>New member added successfully!</div>";
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
    <title>Add New Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Add New Member</h2>

    <form action="addmember.php" method="POST">
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="number" class="form-control" id="contact_number" name="contact_number" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
