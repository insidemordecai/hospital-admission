<?php

include "connect.php";

if (isset($_POST["submit"])) {

  $id = $_POST["id"];

  $sql = "DELETE FROM `hospital` WHERE id = '$id' ";
  $result = mysqli_query($link, $sql);

  if ($result) {
    echo "Record deleted";
    header("location: displaydata.php");
  } else {
    echo "Error executing deletion query $sql" . mysqli_error($link);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="css/hospitalform-styles.css">
</head>

<body>

  <form action="delete.php" method="post">
    <h3>Are you sure you want to delete record for Patient <?php echo $_GET["id"]; ?>?</h3>

    <div class="hidden">
      <input type="text" name="id" value="<?php echo $_GET["id"]; ?>">
    </div>
    <div style="display: flex; justify-content: center;">
      <button class="button" type="submit" name="submit">YES</button>
      <a class="button" href="displaydata.php">NO</a>
    </div>
  </form>
</body>

</html>