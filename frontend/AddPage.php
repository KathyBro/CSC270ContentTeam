<?php
    include_once "..\backend\Helper.php";

    if(isset($_POST['paragraphCount']))
    {
        //Get how many paragraphs
        $count = $_POST['paragraphCount'];

        //Title of the page
        echo '<form method="post" action="/frontend/AddPage.php">';
        echo '<label>Title</page>';
        echo '<input type="text" name="Title"/><br/>';

        for($i = 0; $i < $count; $i++)
        {
            //Header
            echo '<label>Optional Header</label>';
            echo '<input type="text" name="header' . $i . '"/><br/>';

            //Content
            echo '<label>Paragraph</label>';
            echo '<textarea rows="5" cols="50" name="content' . $i . '"></textarea><br/>';
        }

        //ParentPage
        $pageArray = GetAllPageTitles();
        echo "<label>Select Optional Parent Page</label>";
        echo "<select name=\"parentPageId\">";
        echo '<option value="0">None</option>';
    
        for($i = 0; $i < sizeof($pageArray); $i++)
        {
            $id = $i + 1;
            echo "<option value=\"" . $id . "\">"
            . $pageArray[$i] . "</option>";
        }
    
        echo "</select><br/>";

        echo '<label>Sort Order</label>';
        echo '<input type="number" name="sortOrder"/><br/>';

        echo '<button type="submit" value="submit">Submit</button>';
    }
    elseif (isset($_POST['Title']))
    {
        echo var_dump($_POST);
        $title = $_POST['Title'];
        $parentPage = $_POST['parentPageId'];
        $sortOrder = $_POST['sortOrder'];

        //Insert into WebPages
        InsertWebPage($title, $parentPage, $sortOrder);

        //Get the contents and add them
        $id = FindPageIdByTitle($title);
        $keys = array_keys($_POST);
        for($i = 1; $i < sizeof($_POST) - 2; $i+= 2)
        {
            $sortOrder = substr($keys[$i], 6);
            $header = $_POST[$keys[$i]]; //Header
            $content = $_POST[$keys[$i + 1]]; //Content
            InsertContentTable($id, $header, $content, $sortOrder);
        }

        header("Location: /frontend/Index.php?PageId=" . $id);
    }
?>