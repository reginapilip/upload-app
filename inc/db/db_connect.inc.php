<?php //db_connect.inc.php

// create a new connection to the database
$db = new mysqli('localhost', 'root', '', 'upload');

// if connection errors
if ($db->connect_error) {
    $error = $db->connect_error;
    echo $error;
}

// set character encoding of db connection to UTF-8
$db->set_charset('utf8');
?>