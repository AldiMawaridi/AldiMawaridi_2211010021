<?php
session_start();

if (isset($_SESSION["loggedin"])) {
    unset($_SESSION["loggedin"]);
    unset($_SESSION["name"]);
    unset($_SESSION["npm"]);
}

header("location: index.php");