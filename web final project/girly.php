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
    <title>Girly Games - Cyber Play</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Orbitron&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('cute-background.jpg');
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
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            background-color: #f7c0c0;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #f79c42;
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
            color: #ff61a6;
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
            color: #ff61a6;
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
            background-color: #ff61a6;
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
            background-color: #f79c42;
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
            color: #ff61a6;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-column a:hover {
            color: #f79c42;
        }

        .footer-social {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .footer-social a {
            color: #ff61a6;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .footer-social a:hover {
            color: #f79c42;
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
    <h1>Girly Games</h1>
    <div class="container">
        <div class="game-box">
            <img src="games/princess.jpeg" alt="Pink Game">
            <div class="game-title">Pink Princess</div>
            <a href="increment_games.php?game=pink_princess&redirect=https://www.pinkprincess.com" class="play-button" target="_blank">Play Now</a>
        </div>
        <div class="game-box">
            <img src="games/tea.jpeg" alt="Kitty Game">
            <div class="game-title">Kitty Party</div>
            <a href="increment_games.php?game=kitty_party&redirect=https://www.kittyparty.com" class="play-button" target="_blank">Play Now</a>
        </div>
        <div class="game-box">
            <img src="games/ballet.jpeg" alt="Ballet Game">
            <div class="game-title">Ballet Dancer</div>
            <a href="increment_games.php?game=ballet_dancer&redirect=https://www.balletdancer.com" class="play-button" target="_blank">Play Now</a>
        </div>
        <div class="game-box">
            <img src="games/fashion.jpeg" alt="Fashion Game">
            <div class="game-title">Fashion Show</div>
            <a href="increment_games.php?game=fashion_show&redirect=https://www.fashionshow.com" class="play-button" target="_blank">Play Now</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <a href="index.html" class="brand">
                    <img src="ghost.png" width="50" alt="Cyber Play">
                    <span class="brand-name">Cyber Play</span>
                </a>
            </div>
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Games</h4>
                    <ul>
                        <li><a href="#">Girly Games</a></li>
                        <li><a href="#">Fashion Games</a></li>
                        <li><a href="#">Makeup Games</a></li>
                        <li><a href="#">Cooking Games</a></li>
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
