<!DOCTYPE html>
<html>
<head>
    <title>Inloggen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #1d4a7c;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #154a68; /* Slightly darker color on hover */
        }
        .flex-container {
            display: flex;
            justify-content: space-between; /* Dit zorgt ervoor dat de elementen verdeeld worden over de beschikbare ruimte */
        }
        .jc-flex-end {
            margin-left: auto; /* Dit zorgt ervoor dat het element aan het einde van de flex-container wordt geplaatst */
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="logincheck.php" method="post">
        <h1>Login</h1>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <label for="username">Username:</label>
        <input type="text" name="naam" id="naam" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Login">
        <div class="flex-container">
            <a href="../html/index.html">Back</a>
            <a href="Acountmaken.php" class="jc-flex-end">Account Maken</a>
        </div>
    </form>
</body>
</html>