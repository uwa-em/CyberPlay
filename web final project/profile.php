<?php
// Include the database connection file
include('db.php');

// Start the session to access user data
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve the email from the session
$email = $_SESSION['user_email'];

// Fetch user details from the database, including profile picture
$sql = "SELECT name, games_played, profilePicture FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if the user exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($userName, $gamesPlayed, $profilePicture);
    $stmt->fetch();
} else {
    echo "No user found.";
    exit();
}

// Set a default profile picture if none is available
if (empty($profilePicture)) {
    $profilePicture = "default.png"; // Path to your default icon
} else {
    // Assuming the profile picture is stored in the 'uploads/' directory
    $profilePicture = $profilePicture; // Adjust based on where your images are stored
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            background-image: url('jj-ying-7JX0-bfiuxQ-unsplash.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Roboto", sans-serif;
        }

        .container {
            backdrop-filter: blur(12px);
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            width: 350px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
        }

        h1 {
            color: white;
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover;
        }

        .profile-info {
            color: white;
            font-size: 16px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .profile-info span {
            font-weight: bold;
        }

        .edit-btn {
            background-color: gray;
            color: white;
            font-size: 14px;
            padding: 10px;
            width: 85%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .edit-btn:hover {
            background-color: #444;
            transform: scale(1.05);
        }

        .footer {
            color: white;
            margin-top: 20px;
        }

        .footer a {
            color: rgb(82, 82, 82);
            text-decoration: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 280px;
                padding: 20px;
            }
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
    margin-right: 8px; /* Adjust the space between icon and text */
}

.leave-button:hover {
    background-color: #555;
    transform: scale(1.05);
}
    </style>
</head>
<body>
        <nav>
        <a href="home.php">
    <button class="leave-button">
        <i class="fas fa-sign-out-alt"></i> Leave
    </button>
</a>
    </nav>
    
    <div class="container">
        <h1>Your Profile</h1>
        
        <!-- Profile Picture -->
        <img src="<?php echo htmlspecialchars($profilePicture); ?>" alt="Profile Picture" class="profile-img">
        
        <!-- Profile Info -->
        <div class="profile-info">
            <p><span>Name:</span> <?php echo htmlspecialchars($userName); ?></p>
            <p><span>Email:</span> <?php echo htmlspecialchars($email); ?></p>
            <p><span>Games Played:</span> <?php echo htmlspecialchars($gamesPlayed); ?></p>
        </div>

        <!-- Edit Button -->
        <form action="edit_profile.php" method="get">
            <button type="submit" class="edit-btn">Edit Profile</button>
        </form>
        
        <!-- Footer -->
        <div class="footer">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
