<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Results</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    background-color: #f5f5f5;
}

h1 {
    color: #333;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    margin: 0; 
    margin-bottom: 1rem; 
}

th {
    background-color: #4cafaf;
    color: white;
    margin: 0; 
    margin-bottom: 1rem; 
}

a {
    color: #4CAF50;
    text-decoration: none;
    margin: 0; 
    margin-bottom: 1rem; 
}

form {
    display: flex;
    flex-direction: column;
    width: 300px;
}

label, input {
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: #4cafaf;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
}

    </style>
</head>
<body>

<h1>Aanmeldingen</h1>
<?php

$dsn = "mysql:host=localhost;dbname=introweek_lj2";
$DBusername = "root";
$DBpassword = '';
$emailDupe = false;
$userDupe = false;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT Naam, Email, Geboortedatum FROM aanmelden");

if (!$stmt) {
    echo "Prepare failed: " . $conn->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: " . $stmt->error;
}

$stmt->bind_result($Naam, $Email, $Geboortedatums);

echo "<table><tr>
<th>Naam</th>
<th>Email</th>
<th>Geboortedatum</th>

</tr>";
while ($stmt->fetch()) {
    echo "<tr><td>" . $Naam . "</td><td>" . $Email . "</td><td>" . $Geboortedatum . "</td></tr>";
}
echo "</table>";

$stmt->close();
$conn->close();
?>


<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
?>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
<?php
}
?>

    
    
</body>
</html>