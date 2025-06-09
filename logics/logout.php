<?php
session_start();
$_SESSION = array(); // hapus semua data session
session_destroy();   // hancurkan session

header("Location: ../forms/formLogin.php");
exit;
?>
