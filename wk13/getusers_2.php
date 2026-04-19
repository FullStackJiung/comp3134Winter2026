<?php
$host = "127.0.0.1";
$user = "wk13user";
$pass = "StrongPass123!";
$dbname = "wk13lab";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = null;
$queryValue = "";

if (isset($_GET['firstname'])) {
    $queryValue = $_GET['firstname'];

    // Safe query using prepared statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE firstname = ? AND active = 1");
    $stmt->bind_param("s", $queryValue);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Get Users 2</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Search Users by First Name</h1>

    <form method="GET" action="">
        <input type="text" name="firstname" placeholder="Enter first name">
        <button type="submit">Search</button>
    </form>

    <br>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Active</th>
        </tr>

        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['firstname'] . "</td>";
                echo "<td>" . $row['lastname'] . "</td>";
                echo "<td>" . $row['active'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
