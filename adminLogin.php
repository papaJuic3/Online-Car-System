<?php include_once 'header.php'; ?>
<style>
.admin-login-form {
  margin: auto;
  width: 50%;
  background-color: #d3d3d3;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
}

.admin-login-form h2 {
  font-size: 2rem;
  margin-bottom: 20px;
}

.login-form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form-control {
  display: flex;
  flex-direction: column;
  margin-bottom: 10px;
  text-align: left;
}

.form-control label {
  font-size: 1.2rem;
  margin-bottom: 5px;
}

.form-control input[type="text"],
.form-control input[type="password"] {
  padding: 10px;
  font-size: 1.2rem;
  border: 2px solid #cccccc;
  border-radius: 5px;
}

.form-control input[type="text"]:focus,
.form-control input[type="password"]:focus {
  outline: none;
  border-color: black;
}

.error {
  color: #ff0000;
}
button[type="submit"] {
  background-color: #53adca;
  border: none;
  color: white;
  padding: 12px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
  transition-duration: 0.4s;
  cursor: pointer;
  margin-top: 10px;
}

button[type="submit"]:hover {
  background-color: #00008b;
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
  text-decoration: underline;
}

</style>
<section class="admin-login-form">
  <h2>Admin Log In</h2>
  <div class="login-form-container">
    <form action="includes/adminLogin.inc.php" method="post">
      <div class="form-control">
        <label for="username">Username/Email:</label>
        <input type="text" id="username" name="username">
      </div>
      <div class="form-control">
        <label for="password">Password:</label>
        <input type="password" id="password" name="pwd">
      </div>
      <button type="submit" name="submit">Log In</button>
    </form>
  </div>
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p class='error'>Please Fill Out The Appropriate Fields</p>";
    } else if ($_GET["error"] == "invalidcredentials") {
      echo "<p class='error'>Incorrect Username or Password</p>";
    }
  }
  ?>
</section>
