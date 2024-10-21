<?php

$host="localhost";
$user="root";
$password="";
$db="recipe";

session_start();

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];

	$sql="select * from user where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	
		$_SESSION["username"]=$username;
		header("location:user.php");
	}
	elseif($row["usertype"]=="admin")
	{
		$_SESSION["username"]=$username;
		header("location:admin.php");
	}
	else
	{
		echo "username or password incorrect";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Horizon', sans-serif;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #000;
  overflow: hidden;
}

.login-container {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1;
}

.login-box {
  position: relative;
  width: 300px;
  padding: 40px;
  background: rgba(10, 25, 50, 0.9); /* Dark blue with transparency */
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.7);
  border-radius: 10px;
  z-index: 2;
}

.login-box h2 {
  color: #ffcc00; /* Golden yellow for a cooking theme */
  text-align: center;
  margin-bottom: 30px;
}

.textbox {
  position: relative;
  margin-bottom: 30px;
}

.textbox input {
  width: 100%;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
  border-bottom: 2px solid #ffcc00; /* Golden yellow for input field border */
  color: #ffcc00; /* Golden yellow for input text */
  font-size: 18px;
}

.btn {
  width: 100%;
  background: transparent;
  border: 2px solid #ffcc00; /* Golden yellow for button border */
  padding: 10px;
  cursor: pointer;
  color: #ffcc00; /* Golden yellow for button text */
  font-size: 18px;
  transition: 0.3s;
}

.btn:hover {
  background-color: #007acc; /* Darker blue on hover */
  color: white; /* White text on hover */
}

/* Background image animation */
body::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  z-index: 0;
  animation: animateBg 20s ease infinite;
}
.back-btn {
  background-color: #ffcc00; /* Golden yellow */
  color: #003366; /* Dark blue */
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 10px; /* Add some space above the button */
  transition: background-color 0.3s;
}

.back-btn:hover {
  background-color: #e6b800; /* Darker yellow on hover */
}

@keyframes animateBg {
  0% {
    background-image: url('cooking 1 png.jpg'); /* Adjusted path format */
  }

  33% {
    background-image: url('cooking 2.jpg');
  }

  66% {
    background-image: url('cooking 3.jpg');
  }

  100% {
    background-image: url('cooking 1 png.jpg'); /* Adjusted path format */
  }
}
</style>
</head>

<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Login</h2>
      <form action="login.php" method="post">
        <div class="textbox">
          <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="textbox">
          <input type="password" placeholder="Password" name="password" required>
        </div>
        <button type="submit" class="btn">Login</button>
      </form>
      <button class="btn back-btn" onclick="redirectToHome()">Back</button>
    </div>
  </div>
  <script>
    function redirectToHome() {
      window.location.href = 'home.php'; // Redirect to home.php
    }
  </script>
</body>
</html>
