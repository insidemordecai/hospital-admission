<?php

include "connect.php";

if (isset($_POST["submit"])) {
  // update
  $id = $_POST["id"];

  $up_doctorName = $_POST["doctorName"];
  $up_admissionDate = $_POST["admissionDate"];
  $up_plannedProcedure = $_POST["plannedProcedure"];
  $up_patientName = $_POST["patientName"];
  $up_patientDOB = $_POST["patientDOB"];
  $up_gender = $_POST["gender"];
  $up_patientEmail = $_POST["patientEmail"];
  $up_patientPhoneNumber = $_POST["patientPhoneNumber"];
  $up_preferredContactMethod = $_POST["preferredContactMethod"];
  $up_kinName = $_POST["kinName"];
  $up_kinRelationship = $_POST["kinRelationship"];
  $up_kinEmail = $_POST["kinEmail"];
  $up_kinPhoneNumber = $_POST["kinPhoneNumber"];
  $up_tsandcs = $_POST["tsandcs"];
  $up_signature = $_POST["signature"];

  $up_sql = "UPDATE `hospital` SET `doctorName`='$up_doctorName',`admissionDate`='$up_admissionDate',`plannedProcedure`='$up_plannedProcedure',`patientName`='$up_patientName',`patientDOB`='$up_patientDOB',`gender`='$up_gender',`patientEmail`='$up_patientEmail',`patientPhoneNumber`='$up_patientPhoneNumber',`preferredContactMethod`='$up_preferredContactMethod',`kinName`='$up_kinName',`kinRelationship`='$up_kinRelationship',`kinEmail`='$up_kinEmail',`kinPhoneNumber`='$up_kinPhoneNumber',`tsandcs`='$up_tsandcs',`signature`='$up_signature' WHERE id = $id";

  $up_result = mysqli_query($link, $up_sql);

  if ($up_result) {
    echo "Record has been updated";
    header("location: displaydata.php");
  } else {
    echo "Error executing query $up_sql " . mysqli_error($link);
  }
} else {
  // fetch data and autofill prior to updating
  if (isset($_GET["id"]) and !empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM `hospital` WHERE id =$id";
    $result = mysqli_query($link, $sql);

    if ($result) {
      $data = mysqli_num_rows($result);

      if ($data == 1) {
        $row = mysqli_fetch_array($result);

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
      }
    } else {
      echo "Error executing query $sql" . mysqli_error($link);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Admission Form</title>
  <link rel="stylesheet" href="css/hospitalform-styles.css">
</head>

<body>

  <h1>Update Patient <?php echo $_GET["id"]; ?> Record</h1>

  <form action="update.php" method="post">
    <div class="hidden">
      <label>Patient</label>
      <input class="inputField" type="text" name="id" value="<?php echo $_GET["id"]; ?>">
    </div>

    <!-- Basic Info Section -->
    <div class="flex-container">
      <div class="flex-child">
        <label>Doctor's Name</label> <br>
        <input class="inputField" type="text" name="doctorName" value="<?php echo $doctorName; ?>">
      </div>

      <div class="flex-child">
        <label>Planned Procedure</label> <br>
        <input class="inputField" type="text" name="plannedProcedure" value="<?php echo $plannedProcedure; ?>"">
      </div>
    </div>

    <div>
      <label>Admission Date</label> <br>
      <input class=" inputField" type="date" name="admissionDate" value="<?php echo $admissionDate; ?>">
      </div>

      <!-- Patient Section -->
      <h3>Patient Information</h3>

      <div>
        <label>Patient Name</label> <br>
        <input class="inputField" type="text" name="patientName" value="<?php echo $patientName; ?>">
      </div>

      <div>
        <label>Date of Birth</label> <br>
        <input class="inputField" type="date" name="patientDOB" value="<?php echo $patientDOB; ?>">
      </div>

      <div>
        <label>Gender</label> <br>
        <input id="male" type="radio" name="gender" value="Male">
        <label for="male">Male</label>
        <input id="female" type="radio" name="gender" value="Female">
        <label for="female">Female</label>
      </div>

      <div class="flex-container">
        <div class="flex-child">
          <label>Email</label> <br>
          <input class="inputField" type="email" name="patientEmail" value="<?php echo $patientEmail; ?>">
        </div>

        <div class="flex-child">
          <label>Phone Number</label> <br>
          <input class="inputField" type="tel" name="patientPhoneNumber" value="<?php echo $patientPhoneNumber; ?>">
        </div>
      </div>

      <div>
        <label>Which one(s) do you prefer to be contacted by:</label> <br>
        <input id="phone" type="radio" name="preferredContactMethod" value="Phone">
        <label for="phone">Phone</label>
        <input id="sms" type="radio" name="preferredContactMethod" value="SMS">
        <label for="sms">SMS</label>
        <input id="email" type="radio" name="preferredContactMethod" value="Email">
        <label for="email">Email</label>
      </div>

      <!-- Kin Section -->
      <h3>Next of Kin/Contact Person Information</h3>

      <div class="flex-container">
        <div class="flex-child">
          <label>Name</label> <br>
          <input class="inputField" type="text" name="kinName" value="<?php echo $kinName; ?>">
        </div>

        <div class="flex-child">
          <label>Relationship to Patient</label> <br>
          <input class="inputField" type="text" name="kinRelationship" value="<?php echo $kinRelationship; ?>">
        </div>
      </div>

      <div class="flex-container">
        <div class="flex-child">
          <label>Email</label> <br>
          <input class="inputField" type="email" name="kinEmail" value="<?php echo $kinEmail ?>"">
      </div>

      <div class=" flex-child">
          <label>Phone Number</label> <br>
          <input class="inputField" type="tel" name="kinPhoneNumber" value="<?php echo $kinPhoneNumber; ?>"">
      </div>
    </div>


    <!-- Final Section -->
    <h3>Agreement</h3>

    <div>
      <label>Signature</label> <br>
      <textarea name=" signature" rows="3"><?php echo $signature; ?></textarea>
        </div>

        <div>
          <input id=" tsandcs" type="checkbox" name="tsandcs" value="agreed">
          <label for="tsandcs">I agree to Terms and Conditions</label>
        </div>

        <div>
          <input class="button centerbtn" type="submit" value="Update" name="submit">
        </div>
  </form>

</body>

</html>