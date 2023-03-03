<?php
  session_start();

if (isset($_SESSION['useruid'])) {
  $username = $_SESSION['useruid'];
  echo "Current user: $username";
}
else {
  echo "No user logged in.";
}
?>
<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "ccse";

// connect the database with the server
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

	// if error occurs
	if (!$conn)
	{
		die("Connection Failed:" . mysqli_connect_error());
	}
  $query= mysqli_query("SELECT * FROM `applications` WHERE `username` = '".$_SESSION['useruid']."' ")or die(mysqli_error());
  $arr = mysqli_fetch_array($query);
  $num = mysqli_numrows($query);
	if ($result->num_rows > 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);
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
</style>

<body>
	<table>
		<thead>
			<tr>
				<th>Applicant's Name:</th>
				<th>Applicant's Address:</th>
				<th>Applicant's Bank Details:</th>
				<th>Applicant's Personal Info:</th>
				<th>Application Status:</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			?>
			<tr>
				 <!-- <td><?php // echo 'First Name:' . ', ' . $arr['first_name']; . ', ' . 'Last Name:' . ', ' . $arr['last_name']; ?></td> -->
        <td>First Name: <?php echo $arr['first_name']; ?></td>
				<!-- <td><?php //echo  'Postcode:' . ', ' . $arr['postcode'] . ', ' . 'Address:' . ', ' . $rows['address'] . ', ' . 'County and Country:' . ', ' . $rows['county'] . ', ' . $rows['country']; ?></td> -->
				<!-- <td><?php //echo $arr['card_type'] . ', ' . $arr['card_number'] . ', ' . $rows['cvv'] . ', ' . $rows['sort_code']; ?></td> -->
				<!-- <td><?php //echo $rows['dob'] . ', ' . $arr['residential'] . ', ' . $rows['marital'] . ', ' . $rows['emp_hist']; ?></td> -->
				<!-- <td><?php //echo $rows['application_status']; ?></td> -->
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>

<?php
	mysqli_close($conn);
?>
