<?php
// include('file_upload.inc.php');
session_start();

if (isset($_POST["submit"])){
  // $username = $_SESSION["useruid"];
  $name = $_POST['firstName'];
  $surname = $_POST['lastName'];
  $postcode = $_POST['postcode'];
  $address = $_POST['address'];
  $county = $_POST['county'];
  $country = $_POST['country'];
  $card_type = $_POST['card_type'];
  $number = $_POST['number'];
  $cvv = $_POST['cvv'];
  $sort_code = $_POST['sort_code'];
  $dob = $_POST['dob'];
  $res_status = $_POST['res_status'];
  $mar_status = $_POST['mar_status'];
  $emp_hist = $_POST['emp_hist'];
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTmp = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];
  $fileExt = explode('.', $fileName);
  $username = $_SESSION['useruid'];
  $car = $_SESSION['car'];
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'docx');
  if (in_array($fileActualExt, $allowed)){
      if ($fileError === 0){
          if ($fileSize < 1000000){
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = '../uploads/'.$fileNameNew;
              move_uploaded_file($fileTmp, $fileDestination);
              // header("location: index.php?uploadsuccess");
            } else {
              echo "your file is too big";
            }
        } else {
          echo "There was an error uploading your file";
        }
   } else {
      echo "you cannot upload files of this type";
  }
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputForm($name, $surname, $postcode, $address, $county, $country, $card_type, $number, $cvv, $sort_code, $dob, $res_status, $mar_status, $emp_hist) !== false){
    header("location: ../portal.php?error=emptyinput");
    exit();
  }
  if (postcode_check($postcode) === false){
    header("location: ../portal.php?error=invalidpostcode");
    exit();
  }
  if (validatecard($number) === false){
    header("location: ../portal.php?error=invalidCardNumber");
    exit();
  }
  if (validate_dob($dob) === false){
    header("location: ../portal.php?error=invalidDob");
    exit();
  }
  if (validate_cvv($cvv) === false){
    header("location: ../portal.php?error=invalidCvv");
    exit();
  }
  if (alreadyRegistered($conn, $name, $surname, $address) !== false){
    header("location: ../portal.php?error=alreadyRegistered");
    exit();
  } //check sort code and change inputs
  else {
    createApplication($conn, $username, $name, $surname, $postcode, $address, $county, $country, $card_type, $number, $cvv, $sort_code, $dob, $res_status, $mar_status, $emp_hist, $car);
  } // maybe add another column for associated file names passing in $fileNameNew
}
else {
  header("location: ../portal.php");
}
?>
