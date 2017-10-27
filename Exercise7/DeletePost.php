<?php
echo "<link rel='stylesheet' href='style.css'>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "jglass", 'P@$$word123', "jglass");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT post_id, content, author_id FROM Posts";
$count = 0;

echo "<form action='Delete.php' method='post'>";
echo "<table style='width:100%;'>";
echo "<tr><th>Delete?</th><th>post_id</th><th>author_id</th><th>content</th></tr>";
if($result = $mysqli->query($query)) {
  while($rows = $result->fetch_assoc()) {
    $pid = $rows['post_id'];
    $con = $rows['content'];
    $aid = $rows['author_id'];
    echo "<tr><td><input type='checkbox' name='deleteList[]' value ='$pid'><td>$pid</td><td>$aid</td><td>$con</td></tr>";
    $count = $count + 1;
  }
}
echo "</table>";
if($count == 0) {
  echo "There are currently no posts...<br>";
}
else {
  echo "<input type='submit' value='Submit'>";
}
/* close connection */
$mysqli->close();
?>
