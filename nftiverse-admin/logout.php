<?php
session_start();
session_destroy();
session_unset();
echo "<script> location.href='./login.php'</script>";
exit();
?>