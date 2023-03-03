<?php
  session_start();
?>
<link href="scroll.css" rel="stylesheet" />
<head>
  <img src="logo.png" alt="logo">
  <style>@import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');</style>
  <h1 class="title">Global Finance</h1>
  <ul class="menu cf">
    <li><a href="scroll.html">Home</a></li>
    <li>
      <a href="">Cars</a>
      <ul class="submenu">
        <li><a href="lamborghini.html">Lamborghini</a></li>
        <li><a href="">Bugatti</a></li>
        <li><a href="">Audi TT</a></li>
        <li><a href="">Tesla Model X</a></li>
        <li><a href="">Nissan GTR</a></li>
        <li><a href="">Audi SUV</a></li>
      </ul>
    </li>
    <?php
      if (isset($_SESSION["useruid"])){
        echo "<li><a href='profile.php'>My Profile</a></li>";
        echo "<li><a href='portal.php'>Customer Portal</a></li>";
        echo "<li><a href=contect.php'>Contact Us</a></li>";
        echo "<li><a href=includes/logout.inc.php>Log Out</a></li>";
      }
      else {
        echo "<li><a href='contact.php'>Contact Us</a></li>";
        echo "<li><a href='login.php'>Log In</a></li>";
      }
    ?>
  </ul>
</head>
