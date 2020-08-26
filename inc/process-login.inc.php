<?php //process-login.inc.php
require_once 'db/db_connect.inc.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // assign HTTP header values to variables
    // to use when querying the db
    $username = $db->real_escape_string($_POST['username']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));

    // compose sql query
    $sql = "SELECT * 
            FROM user 
            WHERE 
                username='$username' AND
                password='$password'";
    
    // echo $sql;

    // query the db
    $result = $db->query($sql);
    // checking returned result
    if ($result->num_rows == 1) {
        // establish a session
        $_SESSION['loggedin'] = 1;
        $_SESSION['username'] = $username;

        // fetch results as an associative array (from query)
        $row = $result->fetch_assoc();

        // assign other variables, as needed for app
        $_SESSION['first_name'] = $row['first_name'];

        // redirect user to their gallery page
        header('location: ../gallery.php');
    } else {
        // this redirects them but no session variable 
        // shows a different version of gallery.php
        header('location: ../gallery.php');
        // echo "<p>Please try again or go away</p>";
    }
}
?>