<?php
echo "<link rel='stylesheet' href='style.css'>";
$user = $_POST["user"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "jglass", 'P@$$word123', "jglass");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT post_id, content FROM Posts WHERE author_id = '$user'";
$count = 0;

echo "<table style='width:100%;'>";
echo "<tr><th>List of Posts</th></tr>";
if($result = $mysqli->query($query)) {
  while($rows = $result->fetch_assoc()) {
    $post = $rows['content'];
    echo "<tr><td>'$post'</td></tr>";
    $count = $count + 1;
  }
}
echo "</table><br>";
if($count == 0) {
  echo "This user hasn't made any posts yet...";
}
/* close connection */
$mysqli->close();
?>
