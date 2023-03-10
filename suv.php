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
		<h1>Audi RS Q8</h1>
			<div class="container">
					<div class="sketchfab-embed-wrapper">
						<iframe title="Audi RS Q8" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/7356924a59064cf7bcc3f1eea1152e24/embed"> </iframe>
					</div>
					<p>The Audi RS Q8 is a high-performance SUV that combines the practicality of an SUV with the performance of a sports car. The car is based on the Audi Q8 and is powered by a twin-turbocharged V8 engine that produces 592 horsepower and 590 lb-ft of torque.</p>
				</div>
				<?php
					if (isset($_SESSION["useruid"])){
            $_SESSION['car'] = 'Audi RS';
						echo "<button onclick=location.href='portal.php';>Apply for finance on this car</button>";
					}
					else{
            $_SESSION['car'] = 'Audi RS';
						echo "<button onclick=location.href='login.php';>Apply for finance on this car</button>";
					}
				?>
	</body>
<h2>Click the following to learn more.</h2>
<button class="accordion">Car Specifications:</button>
<div class="panel">
  <p>
    <ul>
      <li>Engine: 4.0-liter twin-turbocharged V8</li>
      <li>Horsepower: 592 hp</li>
      <li>Torque: 590 lb-ft</li>
      <li>0-60 mph: 3.7 seconds</li>
      <li>Top Speed: 155 mph (limited)</li>
      <li>Transmission: 8-speed automatic</li>
      <li>Drive Type: All-wheel drive</li>
    </ul>
	</p>
</div>

<button class="accordion">Car Features</button>
<div class="panel">
  <p>
    <ul>
      <li>RS adaptive air suspension</li>
      <li>21-inch alloy wheels</li>
      <li>Matrix-design LED headlights</li>
      <li>RS sport seats with Valcona leather</li>
      <li>Advanced driver assistance systems</li>
      <li>360-degree camera system</li>
    </ul>
	</p>
</div>

<button class="accordion">Buy This Car</button>
<div class="panel">
	<p> To Purchase This Car By Making a Full Payment, Contact One of The Several Dealers Listed Below: </p>
	<div class="map-body">
		<iframe id="map-iframe" src="https://www.google.com/maps/d/embed?mid=1q3Ww_Z30qV5GKuV-5iJZU12Rmuzhu4Q&amp;ehbc=2E312F" width="640" height="480"></iframe>
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
