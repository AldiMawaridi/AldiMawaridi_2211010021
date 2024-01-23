<?php
session_start();


include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $npm = $_POST["npm"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        echo "Password and Confirm Password do not match. Please try again.";
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);


    $query = "INSERT INTO users (npm, name, password_hash) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sss", $npm, $name, $password_hash);
        $stmt->execute();


        if ($stmt->affected_rows > 0) {
            echo "Registration successful. You can now login.";
        } else {
            echo "Registration failed. Please try again.";
        }

        $stmt->close();
    } else {
        echo "Error preparing the statement.";
    }

    $mysqli->close();
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="container">
		<h2>Registration Form</h2>
		<form action="register.php" method="post">
			<label for="npm">NPM:</label>
			<input type="text" id="npm" name="npm" required>
			
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
			
			<label for="confirm_password">Confirm Password:</label>
			<input type="password" id="confirm_password" name="confirm_password" required>
			
			<button type="submit">Register</button>
		</form>
		<p>Already have an account? <a href="index.php">Login here</a></p>
	</div>
</body>
</html>