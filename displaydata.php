<?php

include "connect.php";

$sql = "SELECT * FROM `hospital`";

$result = mysqli_query($link, $sql);

if ($result) {
  // check for data
  $data = mysqli_num_rows($result);

  if ($data > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $doctorName = $row['doctorName'];
      $admissionDate = $row['admissionDate'];
      $plannedProcedure = $row['plannedProcedure'];
      $patientName = $row['patientName'];
      $patientDOB = $row['patientDOB'];
      $gender = $row['gender'];
      $patientEmail = $row['patientEmail'];
      $patientPhoneNumber = $row['patientPhoneNumber'];
      $preferredContactMethod = $row['preferredContactMethod'];
      $kinName = $row['kinName'];
      $kinRelationship = $row['kinRelationship'];
      $kinEmail = $row['kinEmail'];
      $kinPhoneNumber = $row['kinPhoneNumber'];
      $tsandcs = $row['tsandcs'];
      $signature = $row['signature'];

      echo "<h3>Patient $id </h3>";
      echo "Booked Dr. $doctorName on $admissionDate for $plannedProcedure <br>";

      echo "<br>";
      echo "$patientName was born on $patientDOB and is $gender <br>";
      echo "Email: $patientEmail <br>";
      echo "Phone: $patientPhoneNumber <br>";
      echo "Preferred Contact Method: $preferredContactMethod <br>";
      
      echo "<br>";
      echo "<b>Next of Kin/Contact Person Information</b><br>";
      echo "$kinName is $kinRelationship to patient. <br>";
      echo "Email: $kinEmail <br>";
      echo "Phone: $kinPhoneNumber <br>";

      echo "<br>";
      if ($tsandcs == "agreed") {
        echo "Patient agreed to the Terms and Conditions <br>";
      } else {
        echo "Patient did not agree to the Terms and Conditions <br>";
      }
      echo "Signature: $signature";

      echo "<hr>";
    }
  } else {
    echo "No records were found in the database. <br>";
  }
} else {
  echo "Error executing query $sql " . mysqli_error($link);
}
