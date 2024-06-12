<?php
// Mulai session
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

header("Location: dashboard.php");
exit();
?>
