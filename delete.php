<?php //delete.php
require_once 'inc/functions/functions.inc.php';

// see showMessage() function

// see deleteFile() function

if (isset($_GET['file'])) {
    // create a backups folder (see code for making the uploads dir)
    if (is_dir('deletes')) {
        deleteFile();
    } else {
        $delete_dir = mkdir('deletes');
        deleteFile();
    }
}   

?>