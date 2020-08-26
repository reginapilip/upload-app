<?php // upload-form.php ?>

<?php 
require_once "inc/process-upload.inc.php";
require_once "inc/functions/functions.inc.php";
?>

<div class="error-msg"><?php if(!empty($message)) {echo "<p>{$message}</p>";} ?></div>
<div class="upload-form">
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
        <input type="file" id="file-upload" name="file_upload">
        <label class="upload-form-label" for="file-upload">Choose a Photo</label>
        <button type="submit" class="upload-form-btn btn btn-info" name="submit" value="Upload">Upload</button>
    </form>
    <!-- 100000000 -->
</div>


