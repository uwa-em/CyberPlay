<?php
// Start the session to access session variables
session_start();

// Check if the session variables exist
if (isset($_SESSION['user_email']) && isset($_SESSION['games_played'])) {
    // Display the session variables
    echo "<p>Your email: " . $_SESSION['user_email'] . "</p>";
    echo "<p>Games played: " . $_SESSION['games_played'] . "</p>";
} else {
    header('location:login.php');
}
?>
