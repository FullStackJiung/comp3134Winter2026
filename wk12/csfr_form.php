<?php
session_start();
$_SESSION["confirmation"] = bin2hex(random_bytes(16));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Protected CSFR Form</title>
</head>
<body>
    <h1>Protected CSFR Form</h1>

    <form action="csfr_action.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username"><br><br>

        <label>Password:</label>
        <input type="password" name="password"><br><br>

        <input type="hidden" name="confirmation" value="<?php echo $_SESSION['confirmation']; ?>">

        <button type="submit">Login</button>
    </form>
</body>
</html>