<?php
// Start the session (if not already started)
session_start();


include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $npm = $_POST["npm"];
    $password = $_POST["password"];


    $query = "SELECT npm, name, password_hash FROM users WHERE npm = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $npm);
        $stmt->execute();
        $stmt->bind_result($dbNPM, $dbName, $dbPasswordHash);
        $stmt->fetch();


        if (password_verify($password, $dbPasswordHash)) {

            $_SESSION["logged_in"] = true;
            $_SESSION["npm"] = $dbNPM;
            $_SESSION["name"] = $dbName;

            header("Location: dashboard.php");
            exit();
        } else {
        
            echo "Invalid NPM or password. Please try again.";
        }

        $stmt->close();
    } else {
        echo "Error preparing the statement.";
    }


    $mysqli->close();
}
?>
