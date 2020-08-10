<?php
    session_start();

    include_once "DbConnector.php";
    include_once "Helper.php";
    $title = "Content Website";
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