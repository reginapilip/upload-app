<?php // gallery.php
session_start();
$pageTitle = "Build Your Gallery";

require_once 'inc/functions/functions.inc.php';

// header
require_once "inc/layout/gallery-header.inc.php";
// block unauthorized users
if (!isset($_SESSION['loggedin'])) {
    // echo "<p>log in to see your gallery</p>";
    require_once 'inc/layout/app-info.inc.php';
} else {
    // app usage instructions
    require_once "inc/layout/instructions.inc.php";
    // upload form 
    require_once "inc/upload-form.php";
    // a place to display images uploaded
    echo "<div class=\"gallery-container\">";
        require_once "inc/display-img.php";
    echo "</div>";   
    // delete functionality
    require_once "delete.php";
}
// footer
require_once "inc/layout/footer.inc.php";
?>