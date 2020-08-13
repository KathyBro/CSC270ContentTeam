<?php
    include_once "DbConnector.php";

    function Login($username, $password){
        $dbConn = ConnGet();
        $tableInfo = FindUser($dbConn, $username, $password);
        $tableArray = mysqli_fetch_array($tableInfo);
        $id = $tableArray['id'];
        $isAdmin = $tableArray['isAdmin'];

        $response = '[{"id":"' . $id . '", "isAdmin":"' . $isAdmin . '"}]';

        return $response;
    }




?>