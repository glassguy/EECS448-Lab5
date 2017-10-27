<?php
echo "<link rel='stylesheet' href='style.css'>";
$user = $_POST["user"];
$post = $_POST["post"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "jglass", 'P@$$word123', "jglass");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users WHERE user_id = '$user'";
$query2 = "INSERT INTO Posts (author_id, content) VALUES ('$user', '$post')";

if($user == "" || $post == "") {
  echo "Fields cannot be left empty...<br>";
  echo "Submission failed.";
}
else {
    if($result = $mysqli->query($query)->fetch_assoc()) {
      if($result2 = $mysqli->query($query2)) {
        echo "Post succesfully added to the database!<br>";
        echo "Submission successful.";
      }
      else {
        echo "Post unable to be added to the database...<br>";
        echo "Submission failed.";
      }
    }
    else {
      echo "User not found in the database...<br>";
      echo "Submission failed.";
    }
}

/* close connection */
$mysqli->close();
?>
