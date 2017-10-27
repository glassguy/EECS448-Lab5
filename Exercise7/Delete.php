<?php
echo "<link rel='stylesheet' href='style.css'>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "jglass", 'P@$$word123', "jglass");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$count = 0;

/*learned how to do this from https://www.formget.com/php-checkbox/ */
foreach($_POST['deleteList'] as $selected) {
    $query = "SELECT author_id, content FROM Posts WHERE post_id = '$selected'";
    $result = $mysqli->query($query);

    $rows = $result->fetch_assoc();
    $deleteQuery = "DELETE FROM Posts WHERE post_id= '$selected'";

    if($mysqli->query($deleteQuery)){
      //$pid = $rows['post_id'];
      echo "The post with post_id = '$selected' was deleted!<br>";
      $count = $count + 1;
    }
}

if($count == 0) {
  echo "No posts were selected, therefore, none were deleted...<br>";
}

/* close connection */
$mysqli->close();
?>
