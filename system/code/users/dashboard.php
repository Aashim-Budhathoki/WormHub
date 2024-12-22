<?php
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username']; // Get the logged-in user's username
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            background-image: url('../assets/deer.jpg');
            background-size: cover;
            background-position: center;
            background-blur: 5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .header h1 {
            margin: 0;
            font-size: 36px;
            text-transform: uppercase;
        }

        .content {
            padding: 30px 20px;
        }

        .welcome {
            font-size: 24px;
            margin-bottom: 20px;
            color: #007bff;
        }

        .nav {
            margin-bottom: 30px;
            text-align: center;
        }

        .nav a {
            color: #007bff;
            text-decoration: none;
            margin-right: 20px;
            font-size: 18px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        .logout {
            text-align: center;
            margin-top: 30px;
        }

        .logout button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .logout button:hover {
            background-color: #e60000;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            color: #666;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 28px;
            }

            .nav a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to Your Dashboard</h1>
    </div>

    <div class="content">
        <div class="welcome">
            <p>Hello, <b><?php echo htmlspecialchars($username); ?></b>! Welcome back.</p>
        </div>

        <div class="nav">
            <a href="../index/index.php">Homepage</a>
            <a href="../food/food_list.php">Food Tracker</a>
            <a href="../share/watchlist.php">Share Management</a>
            <a href="../travel/travel_list.php">Travel Logs</a>
        </div>

        <div class="logout">
            <form action="logout.php" method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>© 2024 Your Company. All rights reserved.</p>
    </div>
</body>
</html>
