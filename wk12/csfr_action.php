<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    $postedConfirmation = $_POST["confirmation"] ?? "";
    $sessionConfirmation = $_SESSION["confirmation"] ?? "";

    if ($postedConfirmation !== "" && $postedConfirmation === $sessionConfirmation) {
        if ($username === "host" && $password === "pass") {
            $message = "Protected login success!";
        } else {
            $message = "Protected login failed: wrong username or password.";
        }
    } else {
        $message = "Request blocked: invalid confirmation token.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSFR Protection Action</title>
</head>
<body>
    <h1>CSFR Protection Action</h1>

    <div id="splash" style="margin-top:20px; font-weight:bold;">
        <?php echo $message; ?>
    </div>
</body>
</html>