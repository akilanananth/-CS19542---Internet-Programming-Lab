<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>About Us - Recipe Management System</title>
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

        .about-section {
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 40px 2px rgba(37, 73, 214, 0.18);
        }

        .about-section h1 {
            color: #0000FF;
        }

        .team-member {
            margin: 20px 0;
            text-align: center;
        }

        .team-member h5 {
            margin: 10px 0;
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
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container about-section">
    <h1>About the Recipe Management System</h1>
    <p>The Recipe Management System is designed to help users easily manage, create, and share their favorite recipes. Whether you're a home cook or a culinary enthusiast, our platform provides a user-friendly interface to explore a wide variety of recipes.</p>

    <h2>Features</h2>
    <ul>
        <li>Browse a diverse collection of recipes.</li>
        <li>Submit your own recipes and share them with the community.</li>
        <li>Edit and delete your recipes at any time.</li>
        <li>User-friendly interface with easy navigation.</li>
        <li>Search functionality to find recipes by ingredients or titles.</li>
    </ul>

    <h2>Meet the Team</h2>
    <div class="row">
        <div class="col-md-6 team-member">
            <h5>Akilan.A</h5>
            <p>Project Lead</p>
        </div>
        <div class="col-md-6 team-member">
            <h5>Balaji.S</h5>
            <p>Developer</p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3oAiL7DyW07e4x8RArD0T0iC0s6D2D0d4vYI5fQQ0gD1tbIIT5YyWkGrYB1H3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JZR6Spejh4uc8p1C2r7B8EdO3L8eCewiS5I4WlgF8B6m1OBk0VRbOM7ozg5uqD2h" crossorigin="anonymous"></script>
</body>
</html>
