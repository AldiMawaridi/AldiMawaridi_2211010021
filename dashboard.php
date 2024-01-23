<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Admin Dashboard</h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">User</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
    </nav>

    <section class="main-content">
        <div class="container">
            <?php
            session_start();

            
            if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
                
                header("Location: login.php");
                exit();
            }
            ?>
            
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>!</h2>
            <p>Ini Adalah Halaman Admin</p>
            <p><a href="logout.php">Log Out</a></p>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Aldi Mawaridi. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
