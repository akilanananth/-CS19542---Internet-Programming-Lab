<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Contact Us - Recipe Management System</title>
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

        .contact-section {
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 40px 2px rgba(37, 73, 214, 0.18);
        }

        .contact-section h1 {
            color: #0000FF;
        }

        .team-member {
            margin: 20px 0;
            text-align: center;
        }

        .team-member h5 {
            margin: 10px 0;
        }

        .contact-link {
            display: block;
            margin: 5px 0;
            color: #007bff;
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
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container contact-section">
    <h1>Contact Us</h1>
    <p>If you have any questions, feel free to reach out to our team members below:</p>

    <div class="row">
        <div class="col-md-6 team-member">
            <h5>Akilan.A</h5>
            <p>Project Lead</p>
            <a href="mailto:220701022@rajalakshmi.edu.in" class="contact-link">Email: 220701022@rajalakshmi.edu.in</a>
            <a href="https://www.linkedin.com/in/akilan-a-166947257/" target="_blank" class="contact-link">LinkedIn</a>
        </div>
        <div class="col-md-6 team-member">
            <h5>Balaji.S</h5>
            <p>Developer</p>
            <a href="mailto:220701036@rajalakshmi.edu.in" class="contact-link">Email: 220701036@rajalakshmi.edu.in</a>
            <a href="https://www.linkedin.com/in/balaji-g-35a7b7257/" target="_blank" class="contact-link">LinkedIn</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3oAiL7DyW07e4x8RArD0T0iC0s6D2D0d4vYI5fQQ0gD1tbIIT5YyWkGrYB1H3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JZR6Spejh4uc8p1C2r7B8EdO3L8eCewiS5I4WlgF8B6m1OBk0VRbOM7ozg5uqD2h" crossorigin="anonymous"></script>
</body>
</html>
