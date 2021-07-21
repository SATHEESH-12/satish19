<?php
include "dbcon.php";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
echo "<link rel=stylesheet type='text/css' href='indv.css'> ";
echo "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">";
echo "<script src=\"//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js\"></script>";
echo "<script  src=\"script.js\"></script>";
echo "<div class=nav display=block>
<a class=pic href=\"https://gripproject.000webhostapp.com/\"><i class=\"glyphicon glyphicon-home\" style=\"font-size:50px\"></i><d>HOME</d></a>
<a class=pic href=\"users.php\"><i class=\"glyphicon glyphicon-user\" style=\"font-size:50px\"></i><d>USERS</d></a>
<a class=pic href=\"history.php\"><i class=\"glyphicon glyphicon-file\" style=\"font-size:50px\"></i><d>HISTORY</d></a>
</div>";
$x=$_GET["name"];
$y=$_GET["amount"];
$sql="SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<form id=form  action='valid.php' method='post' target='_top' >";
  echo "<label class=lab for='from'>Transfered From:</label><br>";
  echo "<div class=from> <input type='text' id='from' name='from'  value='$x' readonly>";
  echo "<p class=amou>Balance:$y</p></div>";
  echo "<label class=lab for='to'>Transfered To:</label><br>";
  echo "<select id='to' name='to' required>";
  echo "<option  hidden value=''> </option>";
  while($row = $result->fetch_assoc()) {
   if($row['USER_NAME']==$x) continue;
  echo "<option value='" .$row["USER_NAME"]. "'>" .$row["USER_NAME"] ."</option>";
  }
  echo "</select><br>";
  echo " <label class=lab for='amount'>Amount:<span class='required3'>*</span></label><br>";
  echo " <input type='number' id='amount' name='amount' required><br>";
  echo "<input  id=button type='submit' name='submit'>";
  echo "</form>";

} else {
  echo "0 results";
}

$conn->close();

?>