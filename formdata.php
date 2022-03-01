<?php

include "connect.php";

if (isset($_POST["submit"])) {

  // Basic Info
  $doctorName = $_POST["doctorName"];
  $admissionDate = $_POST["admissionDate"];
  $plannedProcedure = $_POST["plannedProcedure"];

  // Patient Info
  $patientName = $_POST["patientName"];
  $patientDOB = $_POST["patientDOB"];
  $gender = $_POST["gender"];
  $patientEmail = $_POST["patientEmail"];
  $patientPhoneNumber = $_POST["patientPhoneNumber"];
  $preferredContactMethod = $_POST["preferredContactMethod"];

  // Kin Info
  $kinName = $_POST["kinName"];
  $kinRelationship = $_POST["kinRelationship"];
  $kinEmail = $_POST["kinEmail"];
  $kinPhoneNumber = $_POST["kinPhoneNumber"];

  // Agreement Info
  $tsandcs = $_POST["tsandcs"];
  $signature = $_POST["signature"];

  $sql = "INSERT INTO `hospital`(`doctorName`, `admissionDate`, `plannedProcedure`, `patientName`, `patientDOB`, `gender`, `patientEmail`, `patientPhoneNumber`, `preferredContactMethod`, `kinName`, `kinRelationship`, `kinEmail`, `kinPhoneNumber`, `tsandcs`, `signature`) VALUES ('$doctorName','$admissionDate','$plannedProcedure','$patientName','$patientDOB','$gender','$patientEmail','$patientPhoneNumber','$preferredContactMethod','$kinName','$kinRelationship','$kinEmail','$kinPhoneNumber','$tsandcs','$signature')";

  $result = mysqli_query($link, $sql);

  if ($result) {
    echo "Data has been added successfully <br>";
    header("location: displaydata.php");
  } else {
    echo "Error adding this record $sql " . mysqli_error($link) . "<br>";
  }

}
