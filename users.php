<?php include "dbcon.php";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
echo "<link  rel='stylesheet' href='styles.css'>";
echo "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">";

echo "<div class=nav display=block>
<a class=pic href=\"https://gripproject.000webhostapp.com/\"><i class=\"glyphicon glyphicon-home\" style=\"font-size:50px\"></i><d>HOME</d></a>
<a class=pic href=\"users.php\"><i class=\"glyphicon glyphicon-user\" style=\"font-size:50px\"></i><d>USERS</d></a>
<a class=pic href=\"history.php\"><i class=\"glyphicon glyphicon-file\" style=\"font-size:50px\"></i><d>HISTORY</d></a>
</div>";
echo "<p style='margin:auto'>USERS DATA</p>";
//include "styles.php";
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  //Test
  echo "<table style=margin:auto>";
  echo "<tr>";
  echo "<th>SL NO.</th>";
  echo "<th>USERS_NAMES</th>";
  echo "<th>MAIL</th>";
  echo "<th>AMOUNT</th>";
   echo "</tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo '<td>' .$row["SL NO."] ."</td>";
    echo '<td><a  class=link href=individual.php?name='.urlencode($row["USER_NAME"])."&amount=".$row['AMOUNT'] .">" .$row["USER_NAME"] ."</a></td>";
    echo '<td>' .$row["MAIL"] ."</td>";
    echo '<td>' .$row["AMOUNT"] ."</td>";
    echo "</tr>";
  }
  
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
