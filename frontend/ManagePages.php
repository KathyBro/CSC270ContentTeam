<!-- Okay, we are going to make a form filling in data from selected value -->
<?php
$title = "Manage Pages";
include_once "MyHeader.php";
include_once "..\backend\Helper.php";
?>

<?php


if (isset($_POST['pageTitleId'])) { //They have selected a page they want to change, need to fill out info
    try {
        $id = (int)$_POST['pageTitleId'];
        echo $id;
        $activeHeaderContentArray = GetPageContentById($id);
        //0, 0 = isActive
        //0, 1 = Title
        //0, 2 = WebPageId
        //index, 0 = Header
        //index, 1 = Content
        //index, 2 = ContentId;


        //We need to have a form
        echo "
        <form method=\"post\" action=\"/frontend/ManagePages.php\">
        ";
        echo "<input type=\"hidden\" name=\"PageId\" value=\"" . $activeHeaderContentArray[0][2] . "\">";
        //Input box for the title
        echo "<label>Title:</label>";
        echo "<input type=\"text\" name=\"Title\" value=\"" . $activeHeaderContentArray[0][1] . "\"><br/><br/>";

        //Radio button for isActive
        echo "<label>Keep Page</label>";
        echo "<input type=\"radio\" name=\"active\" value=\"1\" ";
        if ($activeHeaderContentArray[0][0] == 1) {
            echo "checked";
        }
        echo ">";
        echo "<label>Remove Page</label>";
        echo "<input type=\"radio\" name=\"active\" value=\"0\" ";
        if ($activeHeaderContentArray[0][0] == 0) {
            echo "checked";
        }
        echo "><br/>";

        //Now input boxes for the header and the content in a loop
        for ($i = 1; $i < sizeof($activeHeaderContentArray); $i++) {
            //Header box
            echo "<label>Header</label>";
            echo "<input type=\"text\" name=\"Header" . $activeHeaderContentArray[$i][2] . "\" value=\"" . $activeHeaderContentArray[$i][0] . "\"><br/>";

            //Content box
            echo "<label>Content</label>";
            echo "<textarea rows=\"5\" cols=\"50\" name=\"Content" . $activeHeaderContentArray[$i][2] . "\">" . $activeHeaderContentArray[$i][1] . "</textarea><br/>";
        }

        echo '<button type="submit" name="submit" value="submit">Submit</button>';
        echo '</form>';
    } catch (Exception $e) {
        echo "What are you doing such that you didn't give me an integer for the id?";
    }
} else {
    //They might have changed some values in the page
    if (isset($_POST['PageId'])) {
        //Check if they changed the value of activity. This is based in the webpage table.
        ChangeWebPageInformation($_POST['active'], $_POST['Title'], $_POST['PageId']);

        //Change the content
        //We need to find the id
        $keys = array_keys($_POST);
        for ($i = 3; $i < sizeof($keys) - 1; $i += 2) {
            $contentid = substr($keys[$i], 6);
            $header = $_POST[$keys[$i]]; //Header
            $content = $_POST[$keys[$i + 1]]; //Content
            ChangeContentInformation($contentid, $header, $content);
        }

        echo "<h1>Changes Saved!</h1>";
    }


   

    //If we don't know what page we are changing yet, select one
    //Gotta get all the different pages
    $pageArray = GetAllPageTitles();


    echo "<form><a href=http://localhost/frontend/ManagePages.php?styleChoice=1>Style 1</a> <a href=http://calc.mypc.com/frontend/ManagePages.php?styleChoice=2>Style 2</a></form>";
    echo "
    <form method=\"post\" action=\"/frontend/ManagePages.php\">
    <label>Select a page to change: </label><br/>
    <select name=\"pageTitleId\">
    ";

    for ($i = 0; $i < sizeof($pageArray); $i++) {
        $id = $i + 1;
        echo "<option value=\"" . $id . "\">"
            . $pageArray[$i] . "</option>";
    }

    echo "</select>";
    echo "<button type=\"submit\" name=\"submit\">Submit</button>";
    echo "</form>";

    //Maybe to add a page
    echo '<form method="post" action="/frontend/AddPage.php">';
    echo '<label>Adding Page</label><br/>';
    echo '<label>Paragraph Amount</label>';
    echo '<input type="number" name="paragraphCount"/>';
    echo "<button type=\"submit\" name=\"submit\">Submit</button>";
    echo '</form>';
}



?>


<?php
include_once "MyFooter.php";
?>