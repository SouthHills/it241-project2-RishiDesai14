<?php
require 'secureSession.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "password")
    {
        session_regenerate_id(true); //Regenerate session ID after login for added security
        $_SESSION["username"] = $username;
        header("Location: secureIndex.php");
        exit();
    }
    else
    {
        echo "Invalid username or password";
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
