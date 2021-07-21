

<?php
include "dbcon.php";
//$data[];
//echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
$x=$_POST["from"];           
$y=$_POST["to"];
$z=$_POST["amount"];
$sql="SELECT * FROM users WHERE USER_NAME='$x'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if($row["AMOUNT"]<$_POST["amount"])
    
    {   
        $data['succes']=false;
        $data['message']="insufficient";

    } 
     else
      {
        $upd1="UPDATE users SET AMOUNT=AMOUNT-$z WHERE USER_NAME='$x'";
        $upd2="UPDATE users SET AMOUNT=AMOUNT+$z WHERE USER_NAME='$y'";
        
        if($conn->query($upd1)===TRUE && $conn->query($upd2)===TRUE)
        {
           
           $quey="INSERT INTO history VALUES(\"$x\",\"$y\",$z,current_timestamp())";
          
           if($conn->query($quey)===TRUE)
             {
                   $data['succes']=true;
                   $data['message']="success";
        
                // $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
                // echo json_encode($age);
             }
            
        }

      }

      echo json_encode($data);
}

$conn->close();

             
?>