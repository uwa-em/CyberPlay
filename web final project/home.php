<?php
// Start the session to access session variables
session_start();

// Check if the session variables exist
if (isset($_SESSION['user_email']) && isset($_SESSION['games_played'])) {
    echo('<br>');
      echo('<br>');
        echo('<br>');
} else {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Basic Styles */
        body {

            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
           background-image: url('jj-ying-7JX0-bfiuxQ-unsplash.jpg');
            background-size: cover;
            background-position: center;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
        }

        .sidebar h2 {
            color: #fff;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 10px 0;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            width: 100%;
        }

        .content h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            width: 200px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            border-radius: 10px;
        }

        .card h3 {
            margin: 15px 0;
            color: #333;
        }

        .card a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            padding: 10px;
            background-color: #e74c3c;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .card a:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
        <a href="profile.php">Profile</a>
        <a href="ranking.php">Rankings</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Game Options</h1>
        <div class="card-container">
            <div class="card">
                <img src="single.jpeg" alt="Singleplayer Game">
                <h3>Singleplayer</h3>
                <a href="singleplayer.php">Play Now</a>
            </div>
            <div class="card">
                <img src="multi.jpeg" alt="Multiplayer Game">
                <h3>Multiplayer</h3>
                <a href="multiplayer.php">Play Now</a>
            </div>
            <div class="card">
                <img src="ation.jpeg" alt="Action Game">
                <h3>Action</h3>
                <a href="action.php">Play Now</a>
            </div>
            <div class="card">
                <img src="girly.jpeg" alt="Dress Up Game">
                <h3>Dress Up</h3>
                <a href="girly.php">Play Now</a>
            </div>
        </div>
    </div>

</body>

</html>
