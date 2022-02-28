<?php

$link = mysqli_connect("localhost", "root", "", "vivaldi");

if ($link == true) {
  echo "Connection was successful <br>";
} else {
  echo "Error connecting " . mysqli_connect_error($link) . "<br>";
}


if (isset($_POST["submit"])) {

  // Basic Info
  $doctorFName = $_POST["doctorFName"];
  $doctorLName = $_POST["doctorLName"];
  $admissionDate = $_POST["admissionDate"];
  $plannedProcedure = $_POST["plannedProcedure"];

  // Patient Info
  $patientFName = $_POST["patientFName"];
  $patientLName = $_POST["patientLName"];
  $patientDOB = $_POST["patientDOB"];
  $gender = $_POST["gender"];
  $patientEmail = $_POST["patientEmail"];
  $patientPhoneNumber = $_POST["patientPhoneNumber"];
  $preferredContactMethod = $_POST["preferredContactMethod"];

  // Kin Info
  $kinFName = $_POST["kinFName"];
  $kinLName = $_POST["kinLName"];
  $kinRelationship = $_POST["kinRelationship"];
  $kinEmail = $_POST["kinEmail"];
  $kinPhoneNumber = $_POST["kinPhoneNumber"];

  // Agreement Info
  $tsandcs = $_POST["tsandcs"];
  $agreementDate = $_POST["todaysDate"];
  $signature = $_POST["signature"];

  $sql = "INSERT INTO `hospital`(`doctorFName`, `doctorLName`, `admissionDate`, `plannedProcedure`, `patientFName`, `patientLName`, `patientDOB`, `gender`, `patientEmail`, `patientPhoneNumber`, `preferredContactMethod`, `kinFName`, `kinLName`, `kinRelationship`, `kinEmail`, `kinPhoneNumber`, `tsandcs`, `agreementDate`, `signature`) VALUES ('$doctorFName','$doctorLName','$admissionDate','$plannedProcedure','$patientFName','$patientLName','$patientDOB','$gender','$patientEmail','$patientPhoneNumber','$preferredContactMethod','$kinFName','$kinLName','$kinRelationship','$kinEmail','$kinPhoneNumber','$tsandcs','$agreementDate','$signature')";
  $result = mysqli_query($link, $sql);

  if ($result) {
    echo "Data has been added successfully <br>";
  } else {
    echo "Error adding this record $sql " . mysqli_error($link) . "<br>";
  }

  // echo "<h4>Basic Information</h4>";
  // echo "Patient booked Dr. $doctorLName $doctorFName on $admissionDate for $plannedProcedure <br>";

  // echo "<hr>";

  // echo "<h4>Patient Information</h4>";
  // echo "Name: $patientLName $patientFName <br>";
  // echo "DOB: $patientDOB <br>";
  // echo "Gender: $gender <br>";
  // echo "Email: $patientEmail <br>";
  // echo "Phone: $patientPhoneNumber <br>";
  // echo "Preferred Contact Method: $preferredContactMethod <br>";

  // echo "<hr>";

  // echo "<h4>Next of Kin/Contact Person Information</h4>";
  // echo "Name: $kinLName $kinFName <br>";
  // echo "Relationship To Patient: $kinRelationship <br>";
  // echo "Email: $kinEmail <br>";
  // echo "Phone: $kinPhoneNumber <br>";

  // echo "<hr>";

  // echo "<h4>Agreement</h4>";
  // if ($tsandcs == "agreed"){
  //   echo "Patient agreed to the Terms and Conditions <br>";
  // } else {
  //   echo "Patient did not agree to the Terms and Conditions <br>";
  // }
  // echo "Agreement Date: $todaysDate <br>";
  // echo "Signature: $signature <br>";

}
