<?php
  include_once 'header.php';
?>
  <section class="signup-form">
    <h2>Sign Up</h2>
    <div class='signup-form-form'>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full Name:">
            <input type="text" name="email" placeholder="Email:">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdrepeat" placeholder="Re-enter Password: ">
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Please Fill Out The Appropriate Fields</p>";
            }
            else if ($_GET["error"] == "invaliduid") {
                echo "<p>Please Choose an Appropriate Username</p>";
            }
            else if ($_GET["error"] == "invalidEmail") {
                echo "<p>Please Input an Appropriate Email Address</p>";
            }
            else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>The Passwords Do Not Match</p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p>Username is Already Taken</p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something Went Wrong Please Try Again</p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<p>Account Successfully Created!</p>";
            }
        }
  ?>
</section>

<?php
    // include_once 'footer.php';
?>
