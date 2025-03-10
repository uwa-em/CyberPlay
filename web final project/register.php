<?php

include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

   
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "All fields are required.";
        exit;
    }

    if ($password != $confirm_password) {
        
        header('Location: register.php');
        echo "Passwords do not match.";
    }

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, games_played) VALUES (?, ?, ?, 0)");
    $stmt->bind_param("sss", $name, $email, $password);

  
   if ($stmt->execute()) {
        
        $_SESSION['user_email'] = $email;
        $_SESSION['games_played'] = 0;  
        $_SESSION['user_name']=$name;
        header('Location: home.php');
        exit;
    } else {
       
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyberpunk Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            background-color: transparent;
            border: none;
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
            color: white;
            font-size: 14px;
            width: 80%;
            padding: 8px;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: gray;
        }

        button {
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

        button:hover {
            background-color: #444;
            transform: scale(1.05);
        }

        #options {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        #options a {
            color: gray;
            text-decoration: none;

            transition: color 0.3s ease;
        }

        #options a:hover {
            color: white;
        }

        p {
            font-size: 12px;
            color: white;
            margin-top: 20px;
        }
        h1 {
    font-size: 36px;
    margin-bottom: 30px;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Added text shadow */
}
    </style>
</head>

<body>
    <div class="container">
        <h1>Register</h1>
       <form method="POST" action="register.php">
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
        <div id="options">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>
</body>

</html>