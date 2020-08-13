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
        $returnArray = mySqli_fetch_assoc($dbResponse);
        $header = $returnArray["Header"];
        $content = $returnArray["Content"];

        echo "<h1>" . $header . "</h1>";
        echo "<p>" . $content . "</p>";
    ?>
</div>

<?php
    mySqli_close($dbConn);
    include_once 'MyFooter.php';
?>