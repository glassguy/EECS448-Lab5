<?php
echo "<link rel='stylesheet' href='style.css'>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "jglass", 'P@$$word123', "jglass");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

echo "<table style='width:100%;'>";
echo "<tr><th>List of Users</th></tr>";
if($result = $mysqli->query($query)) {
  while($rows = $result->fetch_assoc()) {
    $user = $rows['user_id'];
    echo "<tr><td>$user</td></tr>";
  }
}
echo "</table>";
/* close connection */
$mysqli->close();
?>
