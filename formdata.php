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

}
