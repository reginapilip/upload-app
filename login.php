<?php // login.php
$pageTitle = "Login";
require_once 'inc/layout/header.inc.php';
require_once 'inc/process-login.inc.php';

echo '<div class="login-form-container">';
    // checking if account registered successfully
    // displays success message
    if (isset($_GET['message']) && $_GET['message'] == 'registered') {
        // build message
        echo '<p class="referrer-note">Account successfully created. Please login now.</p>';
    }
    ?>

    <!-- login form -->
    <form action="inc/process-login.inc.php" method="POST" id="login-form">
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" id="username" required name="username">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" required name="password">
        </div>

        <div class="form-group">
            <button class="btn btn-info" type="submit">Log In</button>
        </div>
    </form>
    
    <div class="account-msg">
        <p>Don't have an account? <a href="welcome.php">Please register.</a></p>
    </div>

    
<?php 
echo '</div>';
?>

<?php
require_once "inc/layout/footer.inc.php";
?>


