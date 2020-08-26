<?php // process-upload-form.inc.php
require_once 'inc/functions/functions.inc.php';

// add error handling

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (is_dir('uploads/' . $_SESSION['username'])) {
        moveFile();
    } else {
        $upload_dir = mkdir('uploads/' . $_SESSION['username']);
        moveFile();
    }
} 



?>