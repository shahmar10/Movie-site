<?php 
session_start();

unset($_SESSION['uid']);
unset($_SESSION['google']);

echo'<meta http-equiv="refresh" content="0; URL=index.php">';
?>
