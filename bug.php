<?php include_once 'header.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

.container {
	display: flex;
	flex-direction: row;
	justify-content: space-between;
	align-items: center;
	margin: 30px auto;
	max-width: 1200px;
	padding: 20px;
	border: 2px solid white;
	border-radius: 10px;
	box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.5);
}
iframe {
	display: block;
	margin: 0 auto;
	width: 750px;
	height: 400px;
	border: none;
	border-radius: 10px;
	box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.5);
}
.description {
max-width: 600px;
margin-right: 100px;
}
h1 {
  text-align: center;
  color: black;
	font-size: 40px;
}
button {
	display: block;
	margin: 30px auto;
	padding: 10px 20px;
	border: none;
	border-radius: 5px;
	background-color: #1CAAD9;
	color: white;
	font-size: 20px;
	font-weight: bold;
	cursor: pointer;
}

button:hover {
	background-color: #0B8DA5;
}

p {
	font-size: 20px;
	line-height: 1.5;
}

</style>
</head>
<body>
	<body>
		<h1>Bugatti La Voiture Noire 2019</h1>
			<div class="container">
					<div class="sketchfab-embed-wrapper">
            <iframe title="Bugatti La Voiture Noire 2019" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/5ae6352593094f02b25c941cbbc88bbd/embed"> </iframe>
					</div>
					<p>The Bugatti La Voiture Noire 2019 is a one-of-a-kind hypercar that was unveiled at the 2019 Geneva Motor Show. The car was designed as a tribute to the Bugatti Type 57 SC Atlantic and is considered one of the most exclusive and expensive cars in the world.</p>
				</div>
				<?php
					if (isset($_SESSION["useruid"])){
            $_SESSION['car'] = 'bugatti';
						echo "<button onclick=location.href='portal.php';>Apply for finance on this car</button>";
					}
					else{
            $_SESSION['car'] = 'bugatti';
						echo "<button onclick=location.href='login.php';>Apply for finance on this car</button>";
					}
				?>
	</body>
<h2>Click the following to learn more.</h2>
<button class="accordion">Car Specifications:</button>
<div class="panel">
  <p>
    <ul>
      <li>Engine: 8.0-liter quad-turbocharged W16</li>
      <li>Horsepower: 1500 hp</li>
      <li>Torque: 1180 lb-ft</li>
      <li>0-60 mph: 2.4 seconds</li>
      <li>Top Speed: 261 mph</li>
      <li>Transmission: 7-speed dual-clutch automatic</li>
      <li>Drive Type: All-wheel drive</li>
    </ul>
		</p>
</div>

<button class="accordion">Car Features</button>
<div class="panel">
  <p>
    <ul>
      <li>CNC-machined central spine</li>
      <li>Full LED lighting</li>
      <li>Custom leather and carbon fiber interior</li>
      <li>Advanced driver assistance systems</li>
      <li>4 exhaust pipes with integrated sound system</li>
      <li>Custom-designed wheels with center-lock nuts</li>
    </ul>
	</p>
</div>

<button class="accordion">Buy This Car</button>
<div class="panel">
	<p> To Purchase This Car By Making a Full Payment, Contact One of The Several Dealers Listed Below: </p>
	<div class="map-body">
		<iframe src="https://www.google.com/maps/d/embed?mid=1b-4B55tgQzfqKQyNYxkzSzmmpyy4R9k&ehbc=2E312F" width="640" height="480"></iframe>
	</div>
</div>

</head>
</html>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>

</body>
</html>
