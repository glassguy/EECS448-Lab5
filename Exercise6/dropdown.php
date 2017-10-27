<?php
echo "<link rel='stylesheet' href='style.css'>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "jglass", 'P@$$word123', "jglass");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

echo "<h1>View every single post from a user!</h1>";
echo "<h3>Please select the user who's posts you want to view...</h3>";
echo "<form action='ViewUserPosts.php' method='post'>";

echo "<select name='user'>";
if($result = $mysqli->query($query)) {
  while($rows = $result->fetch_assoc()) {
    $user = $rows['user_id'];
    echo "<option value='$user'>'$user'</option>";
  }
}
echo "</select><br>";
echo "<input type='submit' value='Submit'>";
/* close connection */
$mysqli->close();
?>
