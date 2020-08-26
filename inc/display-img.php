<?php 
// if file exists, display file
// $dir = "uploads";
if (isset($_SESSION['username'])) {
    $dir = 'uploads/' . $_SESSION['username'];
} else {
    $dir = 'uploads';
}
$trashCan = "<div class=\"trash-can\">
    <div class=\"icon\">
        <div class=\"lid\"></div>
        <div class=\"lidcap\"></div>
        <div class=\"bin\"></div>
    </div>
</div>";

// open file and read its contents
if (is_dir($dir)) {
    if ($dir_handle = opendir($dir)) {
        // false !== 
        while($filename = readdir($dir_handle)) {
            // echo "filename: {$filename} <br>";
            // if file is not a directory, display it
            // .ds_store file - for Mac OS only
            if (!(is_dir($filename)) && $filename != ".ds_store") {
                echo "<div class=\"photo-upload\">";
                echo "<img src=\"uploads/{$_SESSION['username']}/{$filename}\" alt=\"your uploaded image\" height=\"200\">";
                // echo "<div class=\"delete-link\"><a href=\"?file={$filename}\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></div>";                
                echo "<div class=\"delete-link\"><a href=\"?file={$filename}\">{$trashCan}</a></div>";
                echo "</div>";
            }
        }
        closedir();
    }
}
?>
