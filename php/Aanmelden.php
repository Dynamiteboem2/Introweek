<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'email', 'naam', and 'geboortedatum' keys exist in the POST array
    if (isset($_POST["email"]) && isset($_POST["naam"]) && isset($_POST["geboortedatum"])) {
        $Email = $_POST["email"];
        $Naam = $_POST["naam"];
        $Geboortedatum = $_POST["geboortedatum"];

        // Perform database insertion (ensure you have a database connection)
        $dsn = "mysql:host=localhost;dbname=introweek_lj2";
        $DBusername = "root";
        $DBpassword = '';
        $emailDupe = false;
        $userDupe = false;

        try {
            $pdo = new PDO($dsn, $DBusername, $DBpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO aanmelden (Email, Naam, GeboorteDatum) 
            VALUES (:email, :naam, :geboortedatum)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $Email);
    $stmt->bindParam(':naam', $Naam);
    $stmt->bindParam(':geboortedatum', $Geboortedatum);
    

            $stmt->execute();

            echo "<div class='success'><p class='successmessage'>Correct aangemeld! Je wordt binnen enkele seconden doorgestuurd naar de homepage.</p></div>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error: Required form fields are missing.";
    }
}
?>
<style>
.success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    color: #155724;
    font-size: 1.2rem;
    margin: 1rem 0;
    padding: 0.5rem 1rem;
}
</style>