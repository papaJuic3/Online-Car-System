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
		<h1>Audi TT</h1>
			<div class="container">
					<div class="sketchfab-embed-wrapper">
            <iframe title="2018 Audi TT RS" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/d00ae4bc719249bb9bd1e2fc06853bec/embed"> </iframe>
					</div>
					<p>The Audi TT is a compact sports car produced by the German automaker Audi. The TT was first introduced in 1998 and has since become a popular model for drivers who want a fun and stylish car that also offers great performance.</p>
				</div>
				<?php
					if (isset($_SESSION["useruid"])){
            $_SESSION['car'] = 'audi';
						echo "<button onclick=location.href='portal.php';>Apply for finance on this car</button>";
					}
					else{
            $_SESSION['car'] = 'audi';
						echo "<button onclick=location.href='login.php';>Apply for finance on this car</button>";
					}
				?>
	</body>
<h2>Click the following to learn more.</h2>
<button class="accordion">Car Specifications:</button>
<div class="panel">
  <p>
    <ul>
      <li>Engine: 2.0-liter turbocharged four-cylinder</li>
      <li>Horsepower: 228 hp</li>
      <li>Torque: 258 lb-ft</li>
      <li>0-60 mph: 5.2 seconds</li>
      <li>Top Speed: 155 mph</li>
      <li>Transmission: 7-speed dual-clutch automatic</li>
      <li>Drive Type: All-wheel drive</li>
    </ul>
		</p>
</div>

<button class="accordion">Car Features</button>
<div class="panel">
  <p>
    <ul>
      <li>Virtual cockpit digital instrument cluster</li>
      <li>Automatic climate control</li>
      <li>Leather and Alcantara seats</li>
      <li>12-speaker Bang & Olufsen audio system</li>
      <li>Apple CarPlay and Android Auto compatibility</li>
      <li>LED headlights and taillights</li>
      <li>Automatic emergency braking</li>
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
