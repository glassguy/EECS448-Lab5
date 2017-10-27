<?php
echo "<link rel='stylesheet' href='style.css'>";
$user = $_POST["user"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "jglass", 'P@$$word123', "jglass");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('$user')";

if($user == "") {
  echo "Username cannot be left empty...<br>";
  echo "Submission failed.";
}
elseif($result = $mysqli->query($query)) {
  echo "Username succesfully added to the database!<br>";
  echo "Submission successful.";
}
else {
  echo "Username failed to be added to the database...<br>";
  echo "Submission failed.";
}

$result->free();
/* close connection */
$mysqli->close();
?>
