<!-- Okay, we are going to make a form filling in data from selected value -->
<?php
$title = "Manage Pages";
include_once "MyHeader.php";
include_once "..\backend\Helper.php";
?>

<?php

if(isset($_POST['submit']))
{ //They have selected a page they want to change, need to fill out info
    try {
        $id = (int)$_POST['pageTitleId'];
        $activeHeaderContentArray = GetPageContentById($id);
        //0, 0 = isActive
        //0, 1 = Title
        //index, 0 = Header
        //index, 1 = Content

        //We need to have a form
        echo "
        <form method=\"post\" action=\"/frontend/ManagePages.php\">
        ";
        //Input box for the title
        echo "<label>Title:</label>";
        echo "<input type=\"text\" name=\"Title\" value=\"" . $activeHeaderContentArray[0][1] . "\"><br/><br/>";

        //Radio button for isActive
        echo "<label>Active</label>";
        echo "<input type=\"radio\" name=\"active\" value=\"True\" "; if($activeHeaderContentArray[0][0] == 1) { echo "checked";} echo ">";
        echo "<label>InActive</label>";
        echo "<input type=\"radio\" name=\"active\" value=\"False\" "; if ($activeHeaderContentArray[0][0] == 0) { echo "checked";} echo ">";

        //Now input boxes for the header and the content in a loop
        for ($i = 1; $i < sizeof($activeHeaderContentArray); $i++)
        {
            //Header box
        }
    }
    catch (Exception $e)
    {
        echo "What are you doing such that you didn't give me an integer for the id?";
    }

}
else
{ //If we don't know what page we are changing yet, select one
    //Gotta get all the different pages
    $pageArray = GetAllPageTitles();

    echo "
    <form method=\"post\" action=\"/frontend/ManagePages.php\">
    <label>Select a page to change: </label><br/>
    <select name=\"pageTitleId\">
    ";

    for($i = 0; $i < sizeof($pageArray); $i++)
    {
        $id = $i + 1;
        echo "<option value=\"" . $id . "\">"
        . $pageArray[$i] . "</option>";
    }

    echo "</select>";
    echo "<button type=\"submit\" name=\"submit\">Submit</button>";
    echo "</form>";
}



?>


<?php
include_once "MyFooter.php";
?>