<?php
session_start();

if (isset($_SESSION['user_email']) && isset($_SESSION['games_played'])) {
    // Increment games played
    $_SESSION['games_played'] = isset($_SESSION['games_played']) ? $_SESSION['games_played'] + 1 : 1;
} else {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplayer Games - Cyber Play</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Orbitron&display=swap"
        rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('jj-ying-7JX0-bfiuxQ-unsplash.jpg');
            background-size: cover;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            background-color: #082f4a;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0f3d5c;
        }

        .navbar .brand {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .navbar img {
            width: 80px;
            margin-right: 10px;
            animation: pluse 2s infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .navbar .brand-name {
            font-family: 'Orbitron', sans-serif;
            font-size: 3rem;
            color: #3094d6;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #3498db;
            font-size: 2.5rem;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            flex: 1;
            padding: 20px;
        }

        .game-box {
            flex: 1 1 calc(25% - 20px);
            height: 300px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .game-box:hover {
            transform: scale(1.05);
        }

        .game-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .game-title {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
        }

        .play-button {
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            margin: 10px auto;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .play-button:hover {
            background-color: #2980b9;
        }

        .footer {
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 20px 10px;
            font-family: Arial, sans-serif;
            box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .footer-container {
            display: flex;
            flex-direction: row;
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
            justify-content: space-between;
        }

        .footer-brand {
            display: flex;
            align-items: center;
        }

        .footer-brand img {
            margin-right: 10px;
        }

        .footer-links {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 10px;
            width: 100%;
        }

        .footer-column {
            flex: 1;
            margin: 5px;
            min-width: 150px;
        }

        .footer-column h4 {
            margin-bottom: 10px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 1rem;
        }

        .footer-column ul {
            list-style-type: none;
            padding: 0;
        }

        .footer-column li {
            margin-bottom: 5px;
        }

        .footer-column a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-column a:hover {
            color: #2980b9;
        }

        .footer-social {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .footer-social a {
            color: #3498db;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .footer-social a:hover {
            color: #e74c3c;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 10px;
            padding: 5px 0;
        }

        .footer-bottom p {
            margin: 5px 0;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <button class="back-button" onclick="window.location.href='home.php'">Go Back Home</button>
        <div class="brand">
            <img src="ghost.png" alt="Cyber Play">
            <span class="brand-name">Cyber Play</span>
        </div>
    </div>
    <h1>Multiplayer Games</h1>
    <div class="container">
        <div class="game-box">
            <img src="games/fortnite.jpeg" alt="Fortnite">
            <div class="game-title">Fortnite</div>
            <a href="increment_games.php?game=fortnite&redirect=https://www.fortnite.com" class="play-button" target="_blank">Play Now</a>
        </div>
        <div class="game-box">
            <img src="games/pubg.jpeg" alt="PUBG">
            <div class="game-title">PUBG</div>
            <a href="increment_games.php?game=pubg&redirect=https://www.pubg.com" class="play-button" target="_blank">Play Now</a>
        </div>
        <div class="game-box">
            <img src="games/fifa.jpeg" alt="FIFA">
            <div class="game-title">FIFA</div>
            <a href="increment_games.php?game=fifa&redirect=https://www.fifa.com" class="play-button" target="_blank">Play Now</a>
        </div>
        <div class="game-box">
            <img src="games/amongus.jpeg" alt="Among Us">
            <div class="game-title">Among Us</div>
            <a href="increment_games.php?game=amongus&redirect=https://www.innersloth.com" class="play-button" target="_blank">Play Now</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <a href="index.html" class="brand">
                    <img src="ghost.png" width="50" alt="VIRTUAL VORTEXX">
                    <span class="brand-name">Cyber Play</span>
                </a>
            </div>
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Games</h4>
                    <ul>
                        <li><a href="#">Multiplayer Games</a></li>
                        <li><a href="#">Singleplayer Games</a></li>
                        <li><a href="#">Top Rated Games</a></li>
                        <li><a href="#">New Releases</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Follow Us</h4>
                    <div class="footer-social">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Cyber Play. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
