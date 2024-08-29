

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
// Databaseverbinding
$dsn = "mysql:host=localhost;dbname=introweek_lj2";
$DBusername = "root";
$DBpassword = '';

try {
    // Maak een nieuwe PDO verbinding
    $pdo = new PDO($dsn, $DBusername, $DBpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Selecteer gegevens uit de Aanmelden tabel
    $stmt = $pdo->prepare("SELECT Naam, Email, Geboortedatum FROM aanmelden");
    $stmt->execute();

    echo "<table><tr>
    <th>Naam</th>
    <th>Email</th>
    <th>Geboortedatum</th>
    </tr>";

    // Haal de resultaten op en toon deze in de tabel
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . htmlspecialchars($row['Naam']) . "</td><td>" . htmlspecialchars($row['Email']) . "</td><td>" . htmlspecialchars($row['Geboortedatum']) . "</td></tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!-- Link naar de homepage -->
<p><a href="../html/index.html">Terug naar de homepage</a></p>

<?php
// Controleer of de gebruiker is ingelogd en toon een logout knop
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
