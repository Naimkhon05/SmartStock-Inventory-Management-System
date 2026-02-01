<?php
include 'includes/db.php';
session_start();

if($_POST){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM users WHERE username='$username'");
    if($check->num_rows > 0){
        $error = "Username already exists!";
    } else {
        $conn->query("INSERT INTO users(username,email,password)
                      VALUES('$username','$email','$password')");
        $success = "Registration successful! You can login now.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body class="login-body">

<form method="POST" class="login-box">
<h2>Create Account</h2>

<input name="username" placeholder="Username" required class="input-field">
<input type="email" name="email" placeholder="Email" required class="input-field">
<input type="password" name="password" placeholder="Password" required class="input-field">

<button>Register</button>

<p style="color:red;"><?= $error ?? "" ?></p>
<p style="color:green;"><?= $success ?? "" ?></p>

<p>Already have account? <a href="login.php">Login here</a></p>

</form>

</body>
</html>
