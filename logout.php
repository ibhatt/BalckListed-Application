<?php
session_start();
unset($_SESSION['login_user']);
session_destroy();
header( "refresh:5;url=Loginform2.php" );
echo "Logging out..";
exit;
?>