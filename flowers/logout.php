<!--THis php ensures that when the user logouts out all of their data 
is cleared from the session array-->
<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header("location: login.php");
    exit;
?>
<!--Coded by Xamarys Liranzo, Santiago Murillo, and Jean Malinao-->