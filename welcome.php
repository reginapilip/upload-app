<?php // welcome.php
$pageTitle = "Register";
require_once "inc/layout/header.inc.php";
?>

<div class="app-registration">
    <!-- form for registration -->
    <!-- form processed on process-register.inc.php -->
    <div class="registration-form-container">
        <div class="message-area">
            <?php 
            if (isset($_GET['message']) && $_GET['message'] == 'error') {
                echo '<div class="error-msg">';
                echo '<p>Please try registering again. Try using another username and email.</p>';
                echo '</div>';
            } else {
                echo '<div class="welcome-msg">';
                echo '<p>Welcome to Upload. To begin building your gallery, please register. Have an account already? <a href="login.php">Go ahead and log in.</a></p>';
                echo '</div>'; 
            }
            ?>
        </div>
    
        <form action="inc/process-register.inc.php" method="POST" id="registration-form">
            <div class="form-group">
            <label for="first_name">First Name</label>
            <input class="form-control" type="text" id="first_name" required name="first_name"></div>
            
            <div class="form-group">
            <label for="last_name">Last Name</label>
            <input class="form-control" type="text" id="last_name" required name="last_name">
            </div>

            <div class="form-group">
            <label for="username">Username</label>
            <span data-username data-message>Choose another username - only letters allowed</span>
            <input class="form-control registration-username" type="text" id="username" required name="username">
            </div>

            <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" required name="email">
            </div>

            <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" required name="password">
            </div>
            
            <div class="form-group">
            <button class="btn btn-info" type="submit">Register</button>
            </div>
        </form>
    </div>
    
    <div class="account-msg">
        <p class="account-msg-text">Already have an account? <a href="login.php">Please login.</a></p>
    </div>

</div>
<script src="js/input-check.js"></script>
<?php require_once "inc/layout/footer.inc.php" ?>