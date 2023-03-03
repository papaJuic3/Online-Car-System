<?php
  include_once 'header.php';
?>


<?php
      if (isset($_SESSION["useruid"])){
        echo "<p>Get Your Engines Ready " . $_SESSION["useruid"] . "</p>";
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Our Cars:</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Our Cars:</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="Lamborghini.png" alt="Lamborghini" style="width:100%;">
        <div class="carousel-caption">
          <h3>Lamborghini Hurracan</h3>
        </div>
      </div>

      <div class="item">
        <img src="Audi.png" alt="Audi TT" style="width:100%;">
        <div class="carousel-caption">
          <h3>Audi TT</h3>
        </div>
      </div>

      <div class="item">
        <img src="bugatti.png" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>Bugatti</h3>
        </div>
      </div>

      <div class="item">
        <img src="Nissan-GTR.png" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>Nissan GTR</h3>
        </div>
      </div>

      <div class="item">
        <img src="suv.png" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>Audi SUV</h3>
        </div>
      </div>

      <div class="item">
        <img src="Tesla.png" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>Tesla Model X</h3>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
