
<?php
include 'dbconnect.php';

session_start();
session_unset();
session_destroy();
header("location:index.php");
echo "logging out please wait...."
?>