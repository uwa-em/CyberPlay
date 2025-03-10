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

// Fetch user details from the database
$sql = "SELECT name, profilePicture FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if the user exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($userName, $profilePicture);
    $stmt->fetch();
} else {
    echo "No user found.";
    exit();
}

$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newName = $_POST['name'];
    $newPassword = $_POST['password'];

    // Update the user's name and password in the database (without password hashing)
    if ($newName && $newPassword) {
        $updateSql = "UPDATE users SET name = ?, password = ? WHERE email = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("sss", $newName, $newPassword, $email);

        if ($updateStmt->execute()) {
            header("Location: profile.php");
        } else {
            echo "Error updating profile.";
        }

        $updateStmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            width: 350px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-align: center;
        }

        h1 {
            color: white;
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .input-field {
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .input-field:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
            font-size: 14px;
            padding: 12px;
            width: 85%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .edit-btn:hover {
            background-color: #45a049;
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

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 280px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        
        <!-- Profile Picture -->
        <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="profile-img">
        
        <form action="edit_profile.php" method="POST">
            <!-- Name Input -->
            <input type="text" name="name" value="<?php echo htmlspecialchars($userName); ?>" placeholder="New Name" required class="input-field"><br><br>

            <!-- Password Input -->
            <input type="password" name="password" placeholder="New Password" required class="input-field"><br><br>

            <button type="submit" class="edit-btn">Update Profile</button>
        </form>
        
        <a href="profile.php" class="footer">Back to Profile</a>
    </div>
</body>
</html>
