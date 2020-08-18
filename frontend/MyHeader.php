<?php
     session_start();
    
    include_once "..\backend\DbConnector.php";
    include_once "..\backend\Helper.php";
    //$listOfHobbies <- needed for Nav generation
?>

<?php
    //  $_SESSION['styleChoice'] = "1";
    $styleChoice = "";
    //Here, we'll check what style has been selected.
    if (array_key_exists('styleChoice', $_GET)) { 
        $_SESSION['styleChoice'] = $_GET['styleChoice']; 
        // $styleChoice = $_SESSION['styleChoice'];
        $styleChoice = $_SESSION['styleChoice'];
    }
    else {
        if(array_key_exists('styleChoice', $_SESSION)) {
            $styleChoice = $_SESSION['styleChoice'];
        }
        else {
            $styleChoice = "1";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title?></title>
    <!-- We'll need to change the style based on admin's selection -->
    <?php
        echo '<link rel="stylesheet" type="text/css" href="' . $styleChoice . 'Style.css">';
        // echo $_SESSION['styleChoice']; 
    ?>
</head>

<body>

<h1 id="main_header">Content Hobbyists</h1>

<div id="nav_holder">
<nav>
    <?php
        //List of pages
        $dbConn = ConnGet();
        $webPages = GetPagesWithChildren($dbConn);
        $contentArray = mySqli_fetch_all($webPages, MYSQLI_ASSOC);
        $linkTemplate = "./Index.php?PageId=";

        foreach ($contentArray as $index => $row) {
            //Check if first element
            if ($index == 0) {
                //Check if the next element is not a child of this one
                if ($contentArray[$index + 1]["Child Id"] == "None") {
                    echo "<a href=" . $linkTemplate . $row["Parent Id"] . ">" . $row["Parent Title"] . "</a>";
                }
                //If the next element is a child (Since it's sorted to have all children be placed after the parent)
                else {
                    echo "<a href=" . $linkTemplate . $row["Parent Id"] . ">" . $row["Parent Title"] . "</a>";
                    echo "<div class='Drop_Down_Button' id='" . $row["Parent Title"] ."_Drop_Button'>^</div>";
                    echo "<div class='Drop_Down_Menu'>";
                }
            }
            //check if any other element
            elseif ($index != sizeof($contentArray) - 1) {
                
                if ($contentArray[$index - 1]["Child Id"] != "None") {
                    if ($contentArray[$index]["Child Id"] != "None") {
                        if ($contentArray[$index + 1]["Child Id"] != "None") {
                            echo "<a href=" . $linkTemplate . $row["Child Id"] . ">" . $row["Child Title"] . "</a>";
                        }
                        else {
                            echo "<a href=" . $linkTemplate . $row["Child Id"] . ">" . $row["Child Title"] . "</a>";
                            echo "</div>";
                        }
                    }
                    elseif ($contentArray[$index + 1]["Child Id"] != "None") {
                        echo "<a href=" . $linkTemplate . $row["Parent Id"] . ">" . $row["Parent Title"] . "</a>";
                        echo "<div class='Drop_Down_Button' id='" . $row["Parent Title"] ."_Drop_Button'>▲</div>";
                        echo "<div class='Drop_Down_Menu'>";
                    }
                    else {
                        echo "<a href=" . $linkTemplate . $row["Parent Id"] . ">" . $row["Parent Title"] . "</a>";
                    }
                }
                elseif ($contentArray[$index]["Child Id"] != "None") {
                    if($contentArray[$index + 1]["Child Id"] != "None") {
                        echo "<a href=" . $linkTemplate . $row["Child Id"] . ">" . $row["Child Title"] . "</a>";
                    }
                    else {
                        echo "<a href=" . $linkTemplate . $row["Child Id"] . ">" . $row["Child Title"] . "</a>";
                        echo "</div>";
                    }
                }
                elseif ($contentArray[$index + 1]["Child Id"] != "None") {
                    echo "<a href=" . $linkTemplate . $row["Parent Id"] . ">" . $row["Parent Title"] . "</a>";
                    echo "<div class='Drop_Down_Button' id='" . $row["Parent Title"] . "_Drop_Button'>▲</div>";
                    echo "<div class='Drop_Down_Menu'>";
                }
                else {
                    echo "<a href=" . $linkTemplate . $row["Parent Id"] . ">" . $row["Parent Title"] . "</a>";
                }
            }
            //If last element
            else {
                if ($contentArray[$index]["Child Id"] != "None") {
                    echo "<a href=" . $linkTemplate . $row["Child Id"] . ">" . $row["Child Title"] . "</a>";
                    echo "</div>";
                }
                else {
                    echo "<a href=" . $linkTemplate . $row["Parent Id"] . ">" . $row["Parent Title"] . "</a>";
                }
            }
        }

        //Offer Login if no one is logged in, else logout
        if(!isset($_SESSION['userId']))
        {
            echo "<a href=\"Login.php\">Login</a>";
        }
        else
        {
            echo "<a href=\"Login.php\">Log out</a>";
        }

        //Offer ManagePages if they are an admin
        if(isset($_SESSION['isAdmin']))
        {
            if($_SESSION['isAdmin'] == 1)
            {
                echo "<a href=\"ManagePages.php\">Manage Pages</a>";
            }
        }

    ?>
</nav>
</div>