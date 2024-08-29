<?php
$servername = "localhost";
$username = "root";  // MySQL gebruikersnaam
$password = "";  // MySQL wachtwoord
$dbname = "introweek_lj2";  // Database naam

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['naam'])) {
        $naam = $_POST['naam'];
    } else {
        die("Naam is niet ingesteld in het formulier.");
    }

    $password = isset($_POST['password']) ? $_POST['password'] : die("Wachtwoord is niet ingesteld in het formulier.");

    // Maak verbinding met de database
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Controleer of de gebruikersnaam al bestaat
    $stmt = $conn->prepare("SELECT naam FROM users WHERE naam=?");
    $stmt->bind_param("s", $naam);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Gebruikersnaam bestaat al
        header("Refresh: 3; url=acountmaken.php");
        echo "Gebruikersnaam bestaat al. Je wordt doorgestuurd naar account aanmaken...";
        exit();
    } else {
        // Voeg de nieuwe gebruiker toe
        $stmt = $conn->prepare("INSERT INTO users (naam, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $naam, $password);

        if ($stmt->execute()) {
            header("Refresh: 3; url=login.php");
            echo "Registratie succesvol. Je wordt doorgestuurd naar de login pagina...";
            exit();
        } else {
            // Er is een fout opgetreden, stuur terug naar de registratiepagina met een foutmelding
            header("Location: Acountmaken.php?error=failed");
            exit();
        }
    }

    $stmt->close();
    $conn->close();
} else {
    // Ongeldige aanvraagmethode, stuur terug naar de registratiepagina
    header("Location: register.php?error=invalid");
    exit();
}
?>
