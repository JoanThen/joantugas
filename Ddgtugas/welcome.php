<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . htmlspecialchars($_SESSION["username"]) . "</h1>"; ?>
    <h1>Congratulations, you have successfully logged in</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
