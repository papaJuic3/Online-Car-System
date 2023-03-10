<!DOCTYPE html>
<html>
<style>
body {
font-family: Arial, sans-serif;
margin: 0;
padding: 0;
background-color: #f5f5f5;
display: flex;
justify-content: center;
align-items: center;
height: 100vh; /* added to center vertically */
}

.container {
max-width: 500px;
margin: 0 auto; /* changed to 0 */
background-color: #fff;
border-radius: 5px;
box-shadow: 0 2px 5px rgba(0,0,0,0.1);
padding: 30px;
display: flex;
flex-direction: column; /* added to center children vertically */
justify-content: center;
align-items: center;
}

h1 {
text-align: center;
margin-top: 0;
}

label {
display: flex;
flex-direction: column; /* added to center children vertically */
margin-bottom: 10px;
justify-content: center;
align-items: center;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-sizing: border-box; /* added to include padding in width */
  transition: border-color 0.3s ease; /* added transition for border-color */
}

input[type="text"]:focus {
  border-color: #4CAF50; /* added focus style */
}

button[type="submit"] {
background-color: #53adca;
color: #fff;
border: none;
border-radius: 5px;
padding: 10px 20px 10px 20px;
font-size: 16px;
cursor: pointer;
transition: background-color 0.3s ease, opacity 0.3s ease; /* added transition for opacity */
display: flex;
justify-content: center;
align-items: center;
}

button[type="submit"]:hover {
background-color: #4CAF50;
opacity: 0.8;
}

.error {
color: red;
margin-top: 10px;
}

.success {
color: green;
margin-top: 10px;
}

/* added keyframes for fadeIn animation */
@keyframes fadeIn {
from {
  opacity: 0;
}
to {
  opacity: 1;
}
}

/* added animation for container */
.container {
animation: fadeIn 0.5s ease-in-out;
}

</style>
<head>
  <title>Please Enter MFA Token</title>
</head>
<body>
  <?php
    // Generate and send MFA token email
    $to = 'recipient@example.com';
    if (isset($_POST['mfa'])) {
      // Retrieve MFA token from the POST request
      $mfa = $_POST['mfa'];
      // Generate MFA token
      $mfa = strval(mt_rand(100000, 999999));

      // Send email with MFA token
      $subject = 'Your MFA Token';
      $message = 'This is your 6-digit MFA token: ' . $mfa;
      $headers = "From: your-email@domain.com\r\n";

      if (mail($to, $subject, $message, $headers)) {
        // Save MFA token in session
        session_start();
        $_SESSION['mfa'] = $mfa;
      } else {
        echo '<p>Failed to send email with MFA token.</p>';
      }
    }

    // Validate MFA token
    if (isset($_POST['verify'])) {
      // Get user input MFA token and compare with saved token in session
      session_start();
      $savedMfa = $_SESSION['mfa'];
      $userMfa = $_POST['verify'];
      if ($savedMfa == $userMfa) {
        echo '<p>Authentication successful!</p>';
        // Clear saved MFA token from session
        unset($_SESSION['mfa']);
        header("location: ../admin.php");
      } else {
        echo '<p>Authentication failed. Please try again.</p>';
      }
    }
  ?>
  <br>
  <form method="post">
    <label for="verify">Please Enter The MFA token:</label><br>
    <input type="number" id="verify" name="verify" required>
    <br>
    <br>
    <button type="submit">Verify MFA Token</button>
  </form>
    <form method="post">
      <button type="submit" name="mfa">Send MFA Token</button>
    </form>
  </form>
</body>
</html>
