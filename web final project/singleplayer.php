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
    <title>Single Player Games - Cyber Play</title>
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
            /* Background image */
            background-size: cover;
            /* Cover the entire page */
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Ensure the body takes full height */
        }

        /* Navigation Bar Styles */
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
            /* Button color */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0f3d5c;
            /* Darker shade on hover */
        }

        .navbar .brand {
            display: flex;
            align-items: center;
            margin-left: auto;
            /* Push brand to the right */
        }

        .navbar img {
            width: 80px;
            /* Brand icon size */
            margin-right: 10px;
            animation: pluse 2s infinite;
            /* Animation for brand icon */
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
            /* Brand color */
            animation: pulse 2s infinite;
            /* Animation for brand name */
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
            /* Heading color */
            font-size: 2.5rem;
            /* Larger font size for the heading */
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* Center the boxes */
            gap: 20px;
            /* Space between boxes */
            flex: 1;
            /* Allow the container to grow */
            padding: 20px;
            /* Padding around the container */
        }

        .game-box {
            flex: 1 1 calc(25% - 20px);
            /* Four boxes per row */
            height: 300px;
            /* Fixed height for uniformity */
            background-color: rgba(255, 255, 255, 0.8);
            /* Transparent white background */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            /* Align content to the bottom */
        }

        .game-box:hover {
            transform: scale(1.05);
            /* Scale effect on hover */
        }

        .game-box img {
            width: 100%;
            height: 100%;
            /* Cover the entire box */
            object-fit: cover;
            /* Cover the area without distortion */
            transition: transform 0.3s;
        }

        .game-title {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            /* Dark background for title */
            color: white;
        }

        .play-button {
            background-color: #3498db;
            /* Button color */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            margin: 10px auto;
            /* Center the button */
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .play-button:hover {
            background-color: #2980b9;
            /* Darker shade on hover */
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
    <h1>Single Player Games</h1>
 <div class="container">
    <h2>Single Player Games</h2>
    <div class="game-box">
        <img src="games/tetris.jpg" alt="Tetris">
        <div class="game-title">Tetris</div>
        <a href="increment_games.php?game=tetris&redirect=https://tetris.com/play-tetris" class="play-button" target="_blank">Play Now</a>
    </div>
    <div class="game-box">
        <img src="games/pacman.jpg" alt="Pac-Man">
        <div class="game-title">Pac-Man</div>
        <a href="increment_games.php?game=pacman&redirect=https://pacman.com" class="play-button" target="_blank">Play Now</a>
    </div>
    <div class="game-box">
        <img src="games/2048.jpeg" alt="2048">
        <div class="game-title">2048</div>
        <a href="increment_games.php?game=2048&redirect=https://play2048.co" class="play-button" target="_blank">Play Now</a>
    </div>
    <div class="game-box">
        <img src="games/FLAPPY 2048 Game - Play on Dhapaak_com.jpeg" alt="Flappy Bird">
        <div class="game-title">Flappy Bird</div>
        <a href="increment_games.php?game=flappybird&redirect=https://flappybird.io" class="play-button" target="_blank">Play Now</a>
    </div>
    <div class="game-box">
        <img src="games/minesweeper.jpeg" alt="Minesweeper">
        <div class="game-title">Minesweeper</div>
        <a href="increment_games.php?game=minesweeper&redirect=https://minesweeperonline.com" class="play-button" target="_blank">Play Now</a>
    </div>
    <div class="game-box">
        <img src="games/solatire.jpeg" alt="Solitaire">
        <div class="game-title">Solitaire</div>
        <a href="increment_games.php?game=solitaire&redirect=https://solitaire.com" class="play-button" target="_blank">Play Now</a>
    </div>
    <div class="game-box">
        <img src="games/suduko.jpeg" alt="Sudoku">
        <div class="game-title">Sudoku</div>
        <a href="increment_games.php?game=sudoku&redirect=https://sudoku.com" class="play-button" target="_blank">Play Now</a>
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
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="index.html" class="text-white">Home</a></li>
                                            <li><a href="regester.html" class="text-white">Register</a></li>
                                            <li><a href="contactus.html" class="text-white">contact us</a></li>
                          <li><a href="login.html" class="text-white">Login</a></li>
                          <li><a href="onlinegames.html" class="text-white">onlinegames</a></li>
                                       
                    </ul>
                               
                </div>
                            <div class="footer-column">
                                    <h4>Support</h4>
                                    <ul class="list-unstyled">
                                            <li><a href="contactus.html" class="text-white">Contact Us</a></li>
                        <li><a href="regester.html" class="text-white">Register</a></li>
                                            <li><a href="faq.html" class="text-white">FAQ</a></li>
                                       
                    </ul>
                                </div>
                            <div class="footer-column">
                                    <h4>Connect</h4>
                                    <div class="footer-social">
                                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                                            <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                                        </div>
                                </div>
                       
            </div>
               
        </div>
            <div class="footer-bottom text-center">
                    <p>© 2024CyberPlay. All Rights Reserved</p>
                </div>
    </footer>
</body>

</html>