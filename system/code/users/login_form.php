<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php"); 
    exit();
}

if (isset($_POST['login'])) {
 
    $con = mysqli_connect("localhost", "root", "", "db_system");
    if (!$con) {
        die("Connection error: " . mysqli_connect_error());
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Both username and password are required.";
    } else {
       
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: dashboard.php"); 
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "User not found.";
        }

        $stmt->close();
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <form class="login-form" method="post" action="login_form.php">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
