<?php include_once 'header.php'; ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['useruid'])) {
  $username = $_SESSION['useruid'];
  $serverName = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "ccse";
  $port = "3307";

  // connect the database with the server
  $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName, $port);

  // if error occurs
  if (!$conn)
  {
    header("location: ../profile.php?error=stmtfailed");
    exit();
  }

  $sql = "SELECT * FROM applications WHERE username='$username';";
  $result = ($conn->query($sql));
  //declare array to store the data of database
  $rows = [];
  if ($result->num_rows > 0)
  {
    // fetch all data from db into array
    $rows = $result->fetch_all(MYSQLI_ASSOC);
  }
}
else {
  echo "No user logged in.";
}

?>

<!DOCTYPE html>
<html>
<style>
	td,th {
		border: 1px solid black;
		padding: 10px;
		margin: 5px;
		text-align: center;
	}
	table {
	border-collapse: collapse;
	width: 100%;
	max-width: 800px;
	margin: 0 auto;
}
th, td {
	padding: 10px;
	text-align: left;
	border-bottom: 1px solid #ddd;
}
th {
	background-color: #f2f2f2;
}
td button {
	padding: 5px;
	border: none;
	background-color: transparent;
	background-repeat: no-repeat;
	background-position: center;
	background-size: contain;
	cursor: pointer;
}
td button[name="approve_application"] {
	background-image: url('tick.png');
}
td button[name="reject_application"] {
	background-image: url('cross.png');
}
</style>

<body>
  <table>
    <thead>
      <tr>
        <th>Applicant's Name:</th>
        <th>Applicant's Address:</th>
        <th>Applicant's Bank Details:</th>
        <th>Applicant's Personal Information:</th>
        <th>Applied For Car:</th>
        <th>Application Status:</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(!empty($rows))
      foreach($rows as $row)
      {
      ?>
      <tr>
        <td><?php echo 'First Name:' . ', ' . $row['first_name'] . ', ' . 'Last Name:' . ', ' . $row['last_name']; ?></td>
        <td><?php echo  'Postcode:' . ', ' . $row['postcode'] . ', ' . 'Address:' . ', ' . $row['address'] . ', ' . 'County and Country:' . ', ' . $row['county'] . ', ' . $row['country']; ?></td>
        <td><?php echo $row['card_type'] . ', ' . $row['card_number'] . ', ' . $row['cvv'] . ', ' . $row['sort_code']; ?></td>
        <td><?php echo $row['dob'] . ', ' . $row['residential'] . ', ' . $row['marital'] . ', ' . $row['emp_hist']; ?></td>
        <td><?php echo $row['car']; ?></td>
        <td><?php echo $row['application_status']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>

<?php
mysqli_close($conn);
?>
