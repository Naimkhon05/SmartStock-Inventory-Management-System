<?php
include 'includes/db.php';
session_start();


if($_POST){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$user'");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($pass, $row['password'])){
         $_SESSION['user_id'] = $row['id'];
         $_SESSION['username'] = $row['username'];

            header("Location: index.php");
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body class="login-body">

<form method="POST" class="login-box">
<h2>SmartStock Login</h2>
<input name="username" placeholder="Username" required class="input-field">
<input type="password" name="password" placeholder="Password" required class="input-field">
<button>Login</button>
<p>Don't have account? <a href="register.php">Register here</a></p>

<p style="color:red;"><?= $error ?? "" ?></p>
</form>

</body>
</html>
