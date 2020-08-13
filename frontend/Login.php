<?php 
include_once "MyHeader.php";
include_once "..\backend\Helper.php";
?>

<?php

if(!isset($_SESSION['userId'])) {
    echo "
    <form method=\"post\" action=\"/frontend/Login.php\">
    <label>Username:</label>
    <input type=\"text\" name=\"username\"/>
    
    <label>Password:</label>
    <input type=\"password\" name=\"password\"/>
    <button type=\"submit\" value=\"Submit\">Submit</button>
    </form>";
}
else if (isset($_SESSION['userId'])) //We'll log them out if they go here again.
{
    unset($_SESSION['userId']);
    header("Location: /frontend/Index.php");
}

?>

<?php
include_once "MyFooter.php";
?>