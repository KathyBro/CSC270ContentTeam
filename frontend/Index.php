<?php
    include_once 'MyHeader.php';
    // Move to Index
    $PageId = "0";
    // Get the page parameter
    if (array_key_exists("PageId", $_GET) == true) {
        $PageId = $_GET["PageId"];
    }
    $dbConn = ConnGet();
?>

<div id="content">
    <?php 
        //content creation code here
        $dbResponse = GetPageContentAndActivityById($dbConn, $PageId);
        $contentArray = mySqli_fetch_all($dbResponse, MYSQLI_ASSOC);
        //Test
        foreach ($contentArray as $index => $contentRow) {
            foreach ($contentRow as $key => $value) {
                if($key == "Header" && $value != "")
                    echo "<h1>" . $value . "</h1>";
                elseif($key == "Content" && $value != "")
                    echo "<p>" . $value . "</p>";
            }
        }      
    ?>
</div>

<?php
    mySqli_close($dbConn);
    include_once 'MyFooter.php';
?>