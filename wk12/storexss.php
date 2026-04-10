<?php
$content = file_get_contents("storedxss.txt");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stored XSS Demo</title>
</head>
<body>
    <h1>Stored XSS Demo</h1>

    <?php echo $content; ?>
</body>
</html>