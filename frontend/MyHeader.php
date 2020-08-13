<?php
    session_start();

    include_once "..\backend\DbConnector.php";
    include_once "..\backend\Helper.php";
    //$listOfHobbies <- needed for Nav generation
?>

<?php
$styleChoice = 1;
//Here, we'll check what style has been selected.
if (isset($_COOKIE["StyleChoice"])) 
{
    $styleChoice = $_COOKIE["StyleChoice"];
}
else
{
    $_COOKIE["StyleChoice"] = $styleChoice;
}


?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title?></title>
    <!-- We'll need to change the style based on admin's selection -->
    <?php
        echo '<link rel="stylesheet" type="text/css" href="' . $styleChoice . 'Style.css">';
    ?>
</head>

<body>

<h1>Content Hobbyists</h1>

<nav>
    <?php
        //List of pages
    ?>
</nav>
