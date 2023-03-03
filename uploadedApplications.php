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

	$sql = "SELECT * FROM applications;";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];
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
				<th>Application Approval:</th>
				<th>Application Rejection:</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			?>
			<tr>
				<td><?php echo 'First Name:' . ', ' . $rows['first_name'] . ', ' . 'Last Name:' . ', ' . $rows['last_name']; ?></td>
				<td><?php echo  'Postcode:' . ', ' . $rows['postcode'] . ', ' . 'Address:' . ', ' . $rows['address'] . ', ' . 'County and Country:' . ', ' . $rows['county'] . ', ' . $rows['country']; ?></td>
				<td><?php echo $rows['card_type'] . ', ' . $rows['card_number'] . ', ' . $rows['cvv'] . ', ' . $rows['sort_code']; ?></td>
				<td><?php echo $rows['dob'] . ', ' . $rows['residential'] . ', ' . $rows['marital'] . ', ' . $rows['emp_hist']; ?></td>
				<td><?php echo $rows['application_status']; ?></td>
				<td><button type="button" name="approve_application">Approve The Application</button></td>
				<td><button type="button" name="reject_application">Reject The Application</button></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>

<?php
	mysqli_close($conn);
?>
