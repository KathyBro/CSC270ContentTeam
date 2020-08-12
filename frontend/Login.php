<?php 
include_once "MyHeader.php";
?>

<?php

if(!isset($_SESSION['adminId'])) {
    echo "
    <form method=\"post\" action=\"/frontend/index.php\">
    <label>Username:</label>
    <input type=\"text\" name=\"username\"/>
    
    <label>Password:</label>
    <input type=\"password\" name=\"password\"/>
    <button type=\"submit\" value=\"Submit\">Submit</button>
    </form>";
}

?>

<?php
include_once "MyFooter.php";
?>