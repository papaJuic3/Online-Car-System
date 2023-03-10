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
        <img src="lambo.png" onclick="changePage(1)" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <img src="tt.png" onclick="changePage(2)" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <img src="bug.png" onclick="changePage(3)" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <img src="nissan-gtr.jpg" onclick="changePage(4)" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <img src="RS.png" onclick="changePage(5)" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <img src="tesla.jpg" onclick="changePage(6)" style="width:100%;">
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
<script>
var page = 0;
async function changePage(page) {
  if (page == 1) {
    window.location.assign("lambo.php")
  }
  else if (page == 2) {
    window.location.assign("audi.php")
  }
  else if (page == 3) {
    window.location.assign("bug.php")
  }
  else if (page == 4) {
    window.location.assign("nissan.php")
  }
  else if (page == 5) {
    window.location.assign("suv.php")
  }
  else if (page == 6) {
    window.location.assign("tesla.php")
  }
}
</script>
</body>
</html>
<?php include_once 'footer.php'; ?>
