<?php // functions.inc.php

// new move file
function moveFile() {  
    // $upload_errors = array(
    //     UPLOAD_ERR_OK => "No errors!",
    //     UPLOAD_ERR_INI_SIZE => "Your file is too large!",
    //     UPLOAD_ERR_FORM_SIZE => "Your file is too large!",
    //     UPLOAD_ERR_PARTIAL => "Uploaded partially",
    //     UPLOAD_ERR_NO_FILE => "No file to upload",
    //     UPLOAD_ERR_NO_TMP_DIR => "No folder found",
    //     UPLOAD_ERR_CANT_WRITE => "Can't write to disk",
    //     UPLOAD_ERR_EXTENSION => "File upload stopped by extension");  
    // check if file already exists and 
    $tmp_file = $_FILES['file_upload']['tmp_name'];
    $upload_dir = 'uploads/' . $_SESSION['username'];
    $target_file = basename($_FILES['file_upload']['name']);

    // move file from tmp dir to perm dir
    move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file);
    // if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
    //     $message = "file uploaded";
    // } else {
    //     $error = $_FILES['file_upload']['error'];
    //     $message = $upload_errors[$error];
    // }
}

function showMessage() {
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        // see functions.inc.php for bootstrap classes to add
        // echo '<div>';
        // echo $message;
        // echo '</div>';
    }
}

// deletes a file
function deleteFile() {
    $newFileName = 1;
    // if return from rename() == true
    if (rename("uploads/" . $_SESSION['username'] . "/" . $_GET['file'], "deletes/" . $newFileName++ . "-" . $_GET['file'])) {
        // echo "File deleted successfully.";
        // message not showing? 
        header('Location: gallery.php?message=Successfully Deleted');
    } else {
        header('Location: gallery.php?message=Something went wrong');
    }
    // showMessage();
}

?>