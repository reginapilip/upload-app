<?php // register.php
// this processes the register form on welcome.php
$pageTitle = "Welcome!";
require_once 'db/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // assign variable names to superglobal's returned values
    $firstName = $db->real_escape_string($_POST['first_name']);
    $lastName = $db->real_escape_string($_POST['last_name']);
    $username = $db->real_escape_string($_POST['username']);
    $email = $db->real_escape_string($_POST['email']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));

    // construct the sql query using variable values to insert form's posted values into the database
    $sql = "INSERT INTO user (
                first_name,
                last_name,
                username,
                email,
                password)
            VALUES (
                '$firstName',
                '$lastName',
                '$username',
                '$email',
                '$password')";
    
    echo $sql;

    // query the db
    $result = $db->query($sql);

    // error handling
    if (!$result) {
        // can add logic here to handle different db errors
        // echo $db->error . "<br>";
        // echo "<div>
        //         <h1>There was a problem registering your account. Try again.</h1>
        //       </div>";
        header("Location: ../welcome.php?message=error");
    } else {
        // create a user folder
        if (!is_dir($username)) {
            mkdir('../uploads/' . $username);
        }
        // redirect user to login page with a message on the page, asking them to login and that their account creation was successful
        header("Location: ../login.php?message=registered");


        // echo "<div class=\"container\">
        //         <div class=\"row\">
        //             <div class=\"col-12\">
        //             <h1>You're good to go! Now, log in please.</h1>
        //             <button class=\"btn btn-info\"><a href=\"../login.php\" id=\"login\">Login</a></button>
        //         </div>
        //       </div>
        //     </div>";
    }
}
?>
<script src="input-check.js"></script>