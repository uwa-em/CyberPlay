<?php
session_start(); // Start session to access user data

include('db.php'); // Include database connection

// Check if the user is logged in
if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email']; // Get the user's email from the session

    // Check if the game and redirect parameters are set
    if (isset($_GET['game']) && isset($_GET['redirect'])) {
        $game = $_GET['game']; // Get the game name from the URL parameter
        $redirect_url = $_GET['redirect']; // Get the redirect URL

        // Increment the games_played column in the database
        $stmt = $conn->prepare("UPDATE users SET games_played = games_played + 1 WHERE email = ?");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            // Update the session value for games_played
            $_SESSION['games_played']++;

            // Redirect to the specified URL after incrementing
            header("Location: $redirect_url");
            exit(); // Ensure the script stops executing after the redirect
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Game or redirect URL not specified.";
    }
} else {
    echo "User not logged in.";
}

$conn->close();
?>
