<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === "host" && $password === "pass") {
        $message = "Login success!";
    } else {
        $message = "Login failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSFR Demo</title>
</head>
<body>
    <h1>CSFR Demo</h1>

    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username"><br><br>

        <label>Password:</label>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
    </form>

    <div id="splash" style="margin-top:20px; font-weight:bold;">
        <?php echo $message; ?>
    </div>
</body>
</html>