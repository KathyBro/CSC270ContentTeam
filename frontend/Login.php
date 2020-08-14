<?php 
$title = "Login";
include_once "MyHeader.php";
include_once "..\backend\Helper.php";
?>

<?php

if(!isset($_SESSION['userId'])) {
    if(array_key_exists("username", $_POST))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userInfo = json_decode(Login($username, $password), true);
        echo var_dump($userInfo);
        //Setting up the userId and the admin boolean.
        $_SESSION['userId'] = $userInfo[0]["id"];
        $_SESSION['isAdmin'] = $userInfo[0]["isAdmin"];

        header("Location: /frontend/Index.php?PageId=1");
    }
    else
    {
        echo "
        <form method=\"post\" action=\"/frontend/Login.php\">
        <label>Username:</label>
        <input type=\"text\" name=\"username\"/>
        
        <label>Password:</label>
        <input type=\"password\" name=\"password\"/>
        <button type=\"submit\" value=\"Submit\">Submit</button>
        </form>";
    }
}
else if (isset($_SESSION['userId'])) //We'll log them out if they go here again.
{
    unset($_SESSION['userId']);
    unset($_SESSION['isAdmin']);
    header("Location: /frontend/Index.php?PageId=1");
}

?>

<?php
include_once "MyFooter.php";
?>