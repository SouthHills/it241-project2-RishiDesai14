<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "password")
    {
        $_SESSION["username"] = $username; // No ID regeneration, no secure flags
        header("Location: insecureIndex.php");
        exit();
    }
    else
    {
        echo "Invalid username or password.";
    }
}
?>

<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required />
    <br />
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required />
    <br />
    <button type="submit" value="Login">Submit</button>
</form>
