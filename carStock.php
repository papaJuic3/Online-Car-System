<?php include_once 'header.php'; ?>
<?php
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
		die("Connection Failed:" . mysqli_connect_error());
	}

	$sql = "SELECT * FROM cars;";
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
	background-color: #53adca;
	background-repeat: no-repeat;
	position: center;
	background-size: contain;
	cursor: pointer;
	color: white;
}

td button:hover {
background-color: blue;
opacity: 0.8;
}
</style>

<body>
	<table>
		<thead>
			<tr>
				<th>Car Name:</th>
				<th>Stock:</th>
				<th>Number Sold:</th>
				<th>Increase Car Stock:</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			?>
			<tr>
				<td><?php echo $rows['car_name']; ?></td>
				<td><?php echo $rows['stock']; ?></td>
				<td><?php echo $rows['sold_no']; ?></td>
				<td><button type="button" name="increase_stock">Increase Car Stock</button></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>

<?php
	mysqli_close($conn);
?>
