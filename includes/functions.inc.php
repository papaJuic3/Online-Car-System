<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
    $result;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    // question mark functions as a placeholder when connecting to the database
    // using prepared sql statements functions as a security measure
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createUser($conn, $name, $email, $username, $pwd){
    // question mark functions as a placeholder when connecting to the database
    // using prepared sql statements functions as a security measure
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPass) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=invalidcredentials");
        exit();
    }
    $hashedPwd = $uidExists["usersPass"];
    // $checkPwd = password_verify($pwd, $hashedPwd)
    if (password_verify($pwd, $hashedPwd)) {
    // if ($checkPwd === false){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../in.php");
        exit();
    }
    // else if ($checkPwd === true){
    else {
        header("location: ../login.php?error=invalidcredentials");
        exit();
    }
}

function emptyInputForm($name, $surname, $postcode, $address, $county, $country, $card_type, $number, $cvv, $sort_code, $dob, $res_status, $mar_status, $emp_hist) {
    $result;
    if (empty($name) || empty($surname) || empty($postcode) || empty($address) || empty($county) || empty($country) || empty($card_type) || empty($number)
    || empty($cvv) || empty($sort_code) || empty($dob) || empty($res_status) || empty($mar_status) || empty($emp_hist)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function postcode_check(&$postcode) {
  // Permitted letters depend upon their position in the postcode.
  $alpha1 = "[abcdefghijklmnoprstuwyz]";                          // Character 1
  $alpha2 = "[abcdefghklmnopqrstuvwxy]";                          // Character 2
  $alpha3 = "[abcdefghjkstuw]";                                   // Character 3
  $alpha4 = "[abehmnprvwxy]";                                     // Character 4
  $alpha5 = "[abdefghjlnpqrstuwxyz]";                             // Character 5

  // Expression for postcodes: AN NAA, ANN NAA, AAN NAA, and AANN NAA with a space
  // Or AN, ANN, AAN, AANN with no whitespace
  $pcexp[0] = '^(' . $alpha1 . '{1}' . $alpha2 . '{0,1}[0-9]{1,2})([[:space:]]{0,})([0-9]{1}' . $alpha5 . '{2})?$';

  // Expression for postcodes: ANA NAA
  // Or ANA with no whitespace
  $pcexp[1] = '^(' . $alpha1 . '{1}[0-9]{1}' . $alpha3 . '{1})([[:space:]]{0,})([0-9]{1}' . $alpha5 . '{2})?$';

  // Expression for postcodes: AANA NAA
  // Or AANA With no whitespace
  $pcexp[2] = '^(' . $alpha1 . '{1}' . $alpha2 . '[0-9]{1}' . $alpha4 . ')([[:space:]]{0,})([0-9]{1}' . $alpha5 . '{2})?$';

  // Exception for the special postcode GIR 0AA
  // Or just GIR
  $pcexp[3] = '^(gir)([[:space:]]{0,})?(0aa)?$';

  // Standard BFPO numbers
  $pcexp[4] = '^(bfpo)([[:space:]]{0,})([0-9]{1,4})$';

  // c/o BFPO numbers
  $pcexp[5] = '^(bfpo)([[:space:]]{0,})(c\/o([[:space:]]{0,})[0-9]{1,3})$';

  // Overseas Territories
  $pcexp[6] = '^([a-z]{4})([[:space:]]{0,})(1zz)$';

  // Anquilla
  $pcexp[7] = '^(ai\-2640)$';

  // Load up the string to check, converting into lowercase
  $postcode_check = strtolower($postcode);

  // Assume we are not going to find a valid postcode
  $valid = false;

  // Check the string against the six types of postcodes
  foreach ($pcexp as $regexp) {
    if (preg_match('/' . $regexp . '/i', $postcode_check, $matches)) {

      // Load new postcode back into the form element
      $postcode = strtoupper($matches[1]);
      if (isset($matches[3])) {
        $postcode_check .= ' ' . strtoupper($matches[3]);
      }

      // Take account of the special BFPO c/o format
      $postcode_check = preg_replace('/C\/O/', 'c/o ', $postcode_check);

      // Remember that we have found that the code is valid and break from loop
      $valid = true;
      break;
    }
  }

  // Return with the reformatted valid postcode in uppercase if the postcode was
  // valid
  if ($valid) {
    $postcode = $postcode_check;
    return true;
  }
  else {
    return false;
  }
}

function validatecard($number)
 {
    global $type;
    $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex"       => "/^3[47][0-9]{13}$/",
        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );
    if (preg_match($cardtype['visa'],$number))
    {
	      $type= "visa";
        return true;
    }
    else if (preg_match($cardtype['mastercard'],$number))
    {
	      $type= "mastercard";
        return true;
    }
    else if (preg_match($cardtype['amex'],$number))
    {
	      $type= "amex";
        return true;

    }
    else if (preg_match($cardtype['discover'],$number))
    {
	      $type= "discover";
        return true;
    }
    else
    {
        header("location: ../portal.php?error=invalidCardNumber");
        return false;
    }
 }

function createApplication($conn, $username, $name, $surname, $postcode, $address, $county, $country, $card_type, $number, $cvv, $sort_code, $dob, $res_status, $mar_status, $emp_hist, $car){
    // question mark functions as a placeholder when connecting to the database
    // using prepared sql statements functions as a security measure
    $sql = "INSERT INTO applications (username, first_name, last_name, postcode, address, county, country, card_type, card_number, cvv, sort_code, dob, residential, marital, emp_hist, application_status, car) VALUES (? ,? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../portal.php?error=stmtfailed");
        exit();
    }
    $status = "pending";
    mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $username, $name, $surname, $postcode, $address, $county, $country, $card_type, $number, $cvv, $sort_code, $dob, $res_status, $mar_status, $emp_hist, $status, $car);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../portal.php?error=none");
    exit();
}

function alreadyRegistered($conn, $name, $surname, $address){
    // question mark functions as a placeholder when connecting to the database
    // using prepared sql statements functions as a security measure
    $sql = "SELECT * FROM applications WHERE first_name = ? OR last_name = ? OR address = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../portal.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $name, $surname, $address);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function validate_cvv($cvv) {
  // CVV codes should be 3 or 4 digits long
  if (!preg_match('/^\d{3,4}$/', $cvv)) {
    return false;
  }
  else {
    // The CVV code is valid
    return true;
  }
}

function validate_dob($dob) {
  // Convert the date of birth to a Unix timestamp
  $dob_timestamp = strtotime($dob);

  // Calculate the user's age in seconds
  $age_in_seconds = time() - $dob_timestamp;

  // Calculate the user's age in years
  $age_in_years = floor($age_in_seconds / (365 * 24 * 60 * 60));
  // Check if the user is older than 18 years
  if ($age_in_years < 18) {
    return false;
  } else {
    // The user is older than 18 years
    return true;
  }
}

function adminExists($conn, $username){
    // question mark functions as a placeholder when connecting to the database
    // using prepared sql statements functions as a security measure
    $sql = "SELECT * FROM admin WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../adminLogin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function loginAdmin($conn, $username, $pwd){
    $adminExists = adminExists($conn, $username);
    $hashedPwd = $adminExists["password"];
    if ($adminExists === false){
        header("location: ../adminLogin.php?error=invalidcredentials");
        exit();
    }
    if (password_verify($pwd, $hashedPwd)) {
        header("location: mail.inc.php");
        session_start();
        $_SESSION["adminid"] = $adminExists["username"];
        $_SESSION["adminuid"] = $adminExists["username"];
        exit();
    }
    else {
        header("location: ../adminLogin.php?error=invalidcredentials");
        exit();
    }
}

function approve_application($conn, $postcode, $address){
    // question mark functions as a placeholder when connecting to the database
    // using prepared sql statements functions as a security measure
    $sql = "UPDATE applications SET application_status = ? WHERE address = ? AND postcode = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../uploadedApplications.php?error=stmtfailed");
        exit();
    }
    $status = "approved";
    mysqli_stmt_bind_param($stmt, "sss", $postcode, $address, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../uploadedApplications.php?error=none");
    exit();
}

function reject_application($conn, $postcode, $address){
    // question mark functions as a placeholder when connecting to the database
    // using prepared sql statements functions as a security measure
    $sql = "UPDATE applications SET application_status = ? WHERE address = ? AND postcode = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../uploadedApplications.php?error=stmtfailed");
        exit();
    }
    $status = "rejected";
    mysqli_stmt_bind_param($stmt, "sss", $postcode, $address, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../uploadedApplications.php?error=none");
    exit();
}
?>
