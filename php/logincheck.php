<?php
$servername = "localhost";
$username = "root";  // MySQL username
$password = "";      // MySQL password
$dbname = "introweek_lj2";  // Database name


// Debugging code to check if POST data is being received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}


// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username and password from the POST request
$naam = $_POST['naam'];  // This is the username field from the form
$password = $_POST['password'];  // Password field from the form

// Prepare and bind the SQL statement
$stmt = $conn->prepare("SELECT naam, password FROM users WHERE naam=?");
$stmt->bind_param("s", $naam);  // Bind the $naam variable to the SQL statement

// Execute the query
$stmt->execute();

// Bind the result variables
$stmt->bind_result($stored_naam, $stored_password);
$stmt->store_result();

// Check if the user exists and validate the password
if ($stmt->fetch()) {
    if ($password == $stored_password) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['naam'] = $stored_naam;

        header("Location: aanmelden_result.php");
        exit; // Stop script execution after redirection
    } else {
        echo "Invalid username or password";
        header("refresh:3;url=login.php"); // Redirect after 3 seconds
    }
} else {
    echo "Invalid username or password";
    header("refresh:3;url=login.php"); // Redirect after 3 seconds
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
