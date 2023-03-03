<?php
echo '<link href="scroll.css" rel="stylesheet" />';
echo 'include_once 'header.php';';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<h2>Our Car Selection</h2>';
echo '<br>';
echo '<div class="carousel" id="test1">';
echo '<input type="radio" name="item" value="1" checked>';
echo '<div>';
echo '<img src="Lamborghini.png" onclick="changePage(1)">';
echo '</div>';
echo '';
echo '<input type="radio" name="item" value="2">';
echo '<div>';
echo '<img src="suv.png" onclick="changePage(2)">';
echo '</div>';
echo '';
echo '<input type="radio" name="item" value="3">';
echo '<div>';
echo '<img src="Nissan-GTR.png" onclick="changePage(2)">';
echo '</div>';
echo '';
echo '<input type="radio" name="item" value="4">';
echo '<div>';
echo '<img src="bugatti.png" onclick="changePage(3)">';
echo '</div>';
echo '';
echo '<input type="radio" name="item" value="5">';
echo '<div>';
echo '<img src="Tesla.png" onclick="changePage(6)">';
echo '</div>';
echo '<input type="radio" name="item" value="6">';
echo '<div>';
echo '<img src="Audi.png" onclick="changePage(4)">';
echo '</div>';
echo '</div>';

  <script>
  var page = 0;
  async function changePage(page) {
    if (page == 1) {
      window.location.assign("lambo.html")
    }
    else if (page == 2) {
      window.location.assign("nissan.html")
    }
    else if (page == 3) {
      window.location.assign("bugatti.html")
    }
    else if (page == 4) {
      window.location.assign("audi.html")
    }
    else if (page == 5) {
      window.location.assign("suv.html")
    }
    else if (page == 6) {
      window.location.assign("tesla.html")
    }
  }
  </script>
?>
