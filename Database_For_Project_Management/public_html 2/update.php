<?php
$servername = "localhost";
$username = "rchang7";
$password = "Ch990502**";
$databaseName = "rchang7_1";
$conn = new mysqli($servername, $username, $password, $databaseName);
$sql ="SELECT * FROM EMPLOYEE";
$result = $conn -> query($sql);

if(isset($_POST['update']))
{  
   $id = $_POST['ID'];
   $FName = $_POST['First_Name'];
   $LName = $_POST['Last_Name'];
   $Minit = $_POST['Minit'];
   $Office = $_POST['Office'];
   $Contact = $_POST['Contact'];
           
   $query = "UPDATE EMPLOYEE". "SET FName=$FName"."LName`=$LName".
   "ID=$id"."Minit=$Minit"."Office=$Office"."Contact=$Contact"."WHERE ID=$id";

   $result = mysqli_query($query,$conn);
   
   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($conn);
}

?>