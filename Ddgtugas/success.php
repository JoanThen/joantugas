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
    <title>Success</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Selamat <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
        <p>Kamu telah berhasil login/registrasi.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
