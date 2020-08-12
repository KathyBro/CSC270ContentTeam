<?php
    session_start();

    include_once "DbConnector.php";
    include_once "Helper.php";
    $title = "Content Website";
    //$listOfHobbies <- needed for Nav generation
?>

<?php
$stylechoice = 1;
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
    <title><?php echo $title ?></title>
    <!-- We'll need to change the style based on admin's selection -->
    <?php
        echo '<link rel="stylesheet" type="text/css" href="' . $styleChoice . 'Style.css">';
    ?>
</head>

<body>

<nav>
    <a href="">Home</a>
    <a href="">About</a>
    <div id="AboutDropButton" class="dropDownButton"></div>
    <div id="AboutDropDown" class="dropDownList">
        <a href="">About</a>
    </div>
    <a href="">Hobbies</a>
    <div id="HobbyDropButton" class="dropDownButton"></div>
    <div id="HobbyDropDown" class="dropDownList">
        <?php
            //loop through hobbies
                //place links here
        ?>
    </div>
</nav>
