<?php

//Constants
DEFINE ('DB_USER', 'databaseUser');
DEFINE ('DB_PSWD', 'user123');
DEFINE ('DB_SERVER', 'localhost');
DEFINE ('DB_NAME', 'ContentTeamDatabase');

function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3308)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}

function FindUser($dbConn, $username, $password)
{
    $query = "SELECT id, isAdmin FROM UserTable WHERE username=\"" . $username .
    "\" AND password=\"" . $password . "\";";

    return mysqli_query($dbConn, $query);
}

?>
