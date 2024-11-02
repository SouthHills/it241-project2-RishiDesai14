<?php
// Enable secure session settings
ini_set('session.cookie_secure', '1'); // Ensure cookies are sent over HTTPS only
ini_set('session.cookie_httponly', '1'); // Prevent JavaScript from accessing session cookies
ini_set('session.use_strict_mode', '1'); // Prevent session fixation
session_start();

// Regenerate session ID to prevent fixation
if (!isset($_SESSION['initiated']))
{
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}