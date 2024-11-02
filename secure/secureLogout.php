<?php
require 'secureSession.php';
session_unset();
session_destroy();
header("Location: secureLogin.php");
exit();