<?php
  include_once 'header.php';
?>
<style>
.signup-form {
  width: 80%;
  max-width: 600px;
  margin: 0 auto;
  background-color: #d3d3d3;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  padding: 40px;
  text-align: center;
}

.signup-form h2 {
  font-size: 2rem;
  margin-bottom: 20px;
  color: #333;
}

.signup-form form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.signup-form input {
  padding: 10px;
  margin: 10px 0;
  width: 100%;
  max-width: 400px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 1.2rem;
}

.signup-form button {
  background-color: #53adca;
  color: white;
  padding: 10px 20px;
  margin: 20px 0;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1.2rem;
}

.signup-form button:hover {
  background-color: #00008b;
}

.error {
  color: #ff0000;
}

.success {
  color: green;
}

.signup-form a {
  color: #333;
  font-size: 1.2rem;
  text-decoration: none;
  border-bottom: 1px solid #333;
  margin-top: 20px;
}

.signup-form a:hover {
  color: #4CAF50;
  border-bottom: 1px solid #4CAF50;
}

.signup-link {
  text-align: center;
  margin-top: 20px;
  font-size: 18px;
}

.signup-link a {
  color: #007bff;
  text-decoration: none;
}

.signup-link a:hover {
  color: #007bff;
  text-decoration: underline;
}

</style>
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
        <p class="signup-link">Already have an account? <a href="login.php">Log In</a></p>
    </div>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p class='error'>Please Fill Out The Appropriate Fields</p>";
            }
            else if ($_GET["error"] == "invaliduid") {
                echo "<p class='error'>Please Choose an Appropriate Username</p>";
            }
            else if ($_GET["error"] == "invalidEmail") {
                echo "<p class='error'>Please Input an Appropriate Email Address</p>";
            }
            else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p class='error'>The Passwords Do Not Match</p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p class='error'>Username is Already Taken</p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p class='error'>Something Went Wrong Please Try Again</p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<p class='success'>Account Successfully Created!</p>";
            }
        }
  ?>
</section>

<?php
    // include_once 'footer.php';
?>
