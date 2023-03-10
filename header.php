<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<link href="scroll.css" rel="stylesheet" />
<head>
  <style>@import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');</style>
  <ul class="menu cf">
      <?php
        if (isset($_SESSION["adminid"]) && $_SESSION["adminid"] == true) {
          echo "<img src='logo.png'>";
          echo "<h1 class='title'>Global Finance Admin Dashboard</h1>";
          echo "<li><a href='carStock.php'>View Car Stock</a></li>";
          echo "<li><a href='uploadedApplications.php'>View Finance Applications</a></li>";
          echo "<li><a href='uploadedFiles.php'>View Uploaded Files</a></li>";
          echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
        }
        elseif (isset($_SESSION["useruid"])) {
          echo "<img src='logo.png'>";
          echo "<h1 class='title'>Global Finance</h1>";
          echo "<li><a href='index.php'>Home</a></li>";
          echo "<li>";
            echo "<a href=''>Cars</a>";
            echo "<ul class='submenu'>";
              echo "<li><a href='lambo.php'>Lamborghini</a></li>";
              echo "<li><a href='bug.php'>Bugatti</a></li>";
              echo "<li><a href='audi.php'>Audi TT</a></li>";
              echo "<li><a href='tesla.php'>Tesla Model S</a></li>";
              echo "<li><a href='nissan.php'>Nissan GTR</a></li>";
              echo "<li><a href='suv.php'>Audi RS Q8</a></li>";
            echo "</ul>";
          echo "</li>";
          echo "<li><a href='profile.php'>My Profile</a></li>";
          echo "<li><a href='portal.php'>Customer Portal</a></li>";
          echo "<li><a href='contact.php'>Contact Us</a></li>";
          echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
        }
        else {
          echo "<img src='logo.png'>";
          echo "<h1 class='title'>Global Finance</h1>";
          echo "<li><a href='index.php'>Home</a></li>";
          echo "<li>";
            echo "<a href=''>Cars</a>";
            echo "<ul class='submenu'>";
              echo "<li><a href='lambo.php'>Lamborghini</a></li>";
              echo "<li><a href='bug.php'>Bugatti</a></li>";
              echo "<li><a href='audi.php'>Audi TT</a></li>";
              echo "<li><a href='tesla.php'>Tesla Model S</a></li>";
              echo "<li><a href='nissan.php'>Nissan GTR</a></li>";
              echo "<li><a href='suv.php'>Audi RS Q8</a></li>";
            echo "</ul>";
          echo "</li>";
          echo "<li><a href='contact.php'>Contact Us</a></li>";
          echo "<li><a href='login.php'>Log In</a></li>";
        }
      ?>
  </ul>
</head>
