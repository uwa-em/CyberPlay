<?php

include('db.php');

$query = "SELECT name, email, games_played FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rankings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <style>
body {
    font-family: Arial, sans-serif;
    background-image: url('jj-ying-7JX0-bfiuxQ-unsplash.jpg');
    background-size: cover;
    background-position: center;
    color: #fff;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
}

h1 {
    font-size: 36px;
    margin-bottom: 30px;
    color: #fff;
}


.user-list {
    display: flex;
    flex-direction: column; 
    align-items: center; 
    gap: 20px; 
}

.user-card {
    background-color: rgba(44, 44, 44, 0.7); 
    backdrop-filter: blur(8px); 
    padding: 20px;
    border-radius: 12px;
    width: 350px;
    height: 150px; 
    display: flex;
    flex-direction: column; 
    justify-content: center; 
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
}

.user-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);
}

.user-card h2 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #fff;
}

.user-card p {
    font-size: 16px;
    color: #bbb;
    margin: 5px 0;
}

.user-card p:last-child {
    font-weight: bold;
    color: #fff;
}


@media (max-width: 768px) {
    .user-card {
        width: 300px;
    }
}

@media (max-width: 480px) {
    .user-card {
        width: 250px;
    }
}
h1 {
    font-size: 36px;
    margin-bottom: 30px;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
}
.leave-button {
    background-color: gray;
    color: white;
    font-size: 14px;
    padding: 10px;
   width: 150px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s;
    position: fixed;
    right: 10px;
    top: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.leave-button i {
    margin-right: 8px; 
}

.leave-button:hover {
    background-color: #555;
    transform: scale(1.05);
}

  </style>
      <nav>
        <a href="home.php">
    <button class="leave-button">
        <i class="fas fa-sign-out-alt"></i> Leave
    </button>
</a>
    </nav>
    <div class="container">
        <h1>Rankings</h1>
        <div class="user-list">
            <?php
           
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   
                    echo "<div class='user-card' data-games-played='{$row['games_played']}'>
                            <h2>{$row['name']}</h2>
                            <p>Email: {$row['email']}</p>
                            <p>Games Played: {$row['games_played']}</p>
                        </div>";
                }
            } else {
                echo "<p>No users found.</p>";
            }
            ?>
        </div>
    </div>
    <script>
       
document.addEventListener("DOMContentLoaded", function() {
    const userCards = document.querySelectorAll('.user-card');
    
    
    const sortedCards = Array.from(userCards).sort((a, b) => {
        const gamesA = parseInt(a.getAttribute('data-games-played'));
        const gamesB = parseInt(b.getAttribute('data-games-played'));
        return gamesB - gamesA;  
    });


    const userList = document.querySelector('.user-list');
    sortedCards.forEach(card => userList.appendChild(card));
});

    </script>
</body>
</html>
