<!DOCTYPE html>
<html>
<head>
    <title>
        Select and upload multiple files to the server and fill out the form
    </title>
</head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
<body>
    <!-- multipart/form-data ensures that form data is going to be encoded as MIME data -->
    <!-- <form action="includes/file_upload.inc.php" method="POST" enctype="multipart/form-data"> -->
    <form action="includes/submit.inc.php" method="POST" enctype="multipart/form-data">
        <h2>Finance Form</h2>
          <label for="file">Please Upload: Drivers Licence, Proof of Address and Proof of Income: </label>
          <input type="file" name="file" multiple>
          <input type="text" name="firstName" placeholder="First Name: ">
          <input type="text" name="lastName" placeholder="Last Name: ">
          <input type="text" name="postcode" placeholder="Postcode: ">
          <input type="text" name="address" placeholder="Address:">
          <input type="text" name="county" placeholder="County: ">
          <input type="text" name="country" placeholder="Country: ">
          <input type="text" name="card_type" placeholder="Card type: ">
          <input type="text" name="number" placeholder="Card Number: ">
          <input type="text" name="cvv" placeholder="CVV: ">
          <input type="text" name="sort_code" placeholder="Sort Code:">
          <label for="dob">Date of Birth: </label>
          <input type="date" name="dob">
          <input type="text" name="res_status" placeholder="Resedential Status:">
          <input type="text" name="mar_status" placeholder="Marital Status:">
          <input type="text" name="emp_hist" placeholder="Employment History and Current Employment: ">
          <input type="submit" name="submit" value="Submit">
    </form>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Please Fill Out The Appropriate Fields</p>";
            }
            else if ($_GET["error"] == "invalidpostcode") {
                echo "<p>Please Enter a Valid Postcode</p>";
            }
            else if ($_GET["error"] == "invalidCardNumber") {
                echo "<p>Please Input a Valid Card Number</p>";
            }
            else if ($_GET["error"] == "alreadyRegistered") {
                echo "<p>An Application Already Exists</p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p>Username is Already Taken</p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something Went Wrong Please Try Again</p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<p>Application Successfully Created!</p>";
            }
        }
      ?>
</body>
</html>
