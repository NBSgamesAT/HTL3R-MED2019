<?php
session_start();
$_SESSION[] = array();
session_destroy();
setcookie (session_id(), "", time() - 3600);
header("Location: /index.php")
?>