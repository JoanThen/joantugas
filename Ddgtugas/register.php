<?php
include "config.php";
error_reporting(0);
session_start();

if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST["password"]);
    $cppassword = md5($_POST["cppassword"]);

    if ($password == $cppassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Wow! User Registration Completed.');</script>";
                header("Location: success.php");
                exit;
            } else {
                echo "<script>alert('Oops! Something went wrong.');</script>";
            }
        } else {
            echo "<script>alert('Email already exists.');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Register</title>
</head>
<body>
  <div class="container">
    <form action="register.php" method="post" class="login-email">
      <p style="font-size: 2rem; font-weight:850">REGISTER</p>
      <div class="input-group">
        <input type="text" placeholder="Username" name="username" value="<?php echo htmlspecialchars($username ?? ''); ?>" required>
      </div>
      <div class="input-group">
        <input type="email" placeholder="Email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? ''); ?>" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Confirm Password" name="cppassword" value="<?php echo htmlspecialchars($_POST['cppassword'] ?? ''); ?>" required>
      </div>
      <div class="input-group">
        <button name="submit" type="submit" class="btn">Register now</button>
      </div>
      <p class="login-register-text">Have an account? <a href="index.php">Log in</a></p>
    </form>
  </div>
</body>
</html>
