<?php

session_start();

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $stmt = $conn->prepare("SELECT id, name, password, games_played FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);  

   
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

      
        if ($password == $user['password']) {
           
            $_SESSION['user_email'] = $email;  
            $_SESSION['games_played'] = $user['games_played']; 
            $_SESSION['user_name'] = $user['name'];  
            
        
            header('Location: home.php');
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that email address.";
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
    <title>Login</title>
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
            justify-content: space-between;
            margin-top: 15px;
        }

        #options a {
            color: gray;
            text-decoration: none;
            font-size: 12px;
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

        a {
            text-decoration: none;
            color: rgb(82, 82, 82);
        }
        h1 {
    font-size: 36px;
    margin-bottom: 30px;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Added text shadow */
    
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
</head>

<body>
    <nav>
        <a href="index.php">
    <button class="leave-button">
        <i class="fas fa-sign-out-alt"></i> Leave
    </button>
</a>
    </nav>
    

    <div class="container">
        <h1>Login</h1>
   <form method="POST" action="login.php">
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="footer">
            Don't have an account? <a href="register.php">Register</a>
        </div>
        
    </div>
</body>

</html>