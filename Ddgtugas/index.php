<?php
include "config.php";
session_start();
error_reporting(0);

if (isset($_SESSION['username'])) {
    header("location: success.php");
    exit;
}

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = md5($_POST["password"]);
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && $result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("location: success.php");
        exit;
    } else {
        echo "<script>alert('Woops! Email or Password is incorrect.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Log In</title>
</head>
<body>
  <div class="container">
    <form action="" method="POST" class="login-email">
      <p style="font-size: 2rem; font-weight: 850">LOG IN</p>
      <div class="input-group">
        <input type="email" placeholder="Email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? ''); ?>" required>
      </div>
      <div class="input-group">
        <button name="submit" class="btn">Log in</button>
      </div>
      <p class="login-register-text">Don't have an account? <a href="register.php">Register now</a></p>
    </form>
  </div>
</body>
</html>
