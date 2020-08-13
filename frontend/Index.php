<?php
    include_once 'MyHeader.php';
?>

<div id="content">
    <?php 
        //content creation code here
        $dbResponse; // = databseFunction()
        foreach ($dbResponse as $index => $content) {
            foreach ($content as $key => $value) {
                if($key == "Header")
                    echo "<h1>" . $value . "</h1>";
                elseif($key == "Content")
                    echo "<p>" . $value . "</p>";
            }
        }
    ?>
</div>

<?php
    include_once 'MyFooter.php';
?>