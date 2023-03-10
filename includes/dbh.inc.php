<?php
  $serverName = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "ccse";
  $port = "3307";

  $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName, $port);

  if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
  }
?>
