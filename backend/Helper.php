<?php
    include_once "DbConnector.php";

    function Login($username, $password){
        $dbConn = ConnGet();
        $tableInfo = FindUser($dbConn, $username, $password);
        $tableArray = mysqli_fetch_array($tableInfo);
        $id = $tableArray['id'];
        $isAdmin = $tableArray['isAdmin'];

        $response = '[{"id":"' . $id . '", "isAdmin":"' . $isAdmin . '"}]';

        mysqli_close($dbConn);
        return $response;
    }

    function GetAllPageTitles()
    {
        $dbConn = ConnGet();

        $returnedTable = ReturnWebPages($dbConn);

        $i = 0;
        $returningArray = null;
        while ($row = mysqli_fetch_row($returnedTable))
        {
            $returningArray[$i] = $row[1];
            $i++;
        }

        mysqli_close($dbConn);
        return $returningArray;
    }

    function GetPageContentById($id)
    {
        $dbConn = ConnGet();

        $returnedContent = GetPageContentAndActivityById($dbConn, $id);

        $i = 1;
        $returningArray = null;
        while ($row = mysqli_fetch_row($returnedContent))
        {
            $returningArray[0][0] = $row[2]; //isActive
            $returningArray[$i][0] = $row[0]; //Header
            $returningArray[$i][1] = $row[1]; //Content
            $returningArray[0][1] = $row[3]; //Title
            $returningArray[$i][2] = $row[4]; //ContentId
            $returningArray[0][2] = $row[5]; //WebPageId
            $i++;
        }

        mysqli_close($dbConn);
        return $returningArray;
    }

    function ChangeWebPageInformation($activity, $title, $id)
    {
        $dbConn = ConnGet();

        ChangeWebPageTitleAndActivity($dbConn, $activity, $title, $id);

        mysqli_close($dbConn);
    }

    function ChangeContentInformation($id, $header, $content)
    {
        $dbConn = ConnGet();

        UpdateContentTable($dbConn, $id, $header, $content);

        mysqli_close($dbConn);
    }




?>