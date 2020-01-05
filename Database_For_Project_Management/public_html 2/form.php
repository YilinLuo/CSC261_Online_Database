<?php include 'html_top.php';?>

    <body>
                <div class = "subpage_container">
                <div class="subpage_index center">
                                <ul>
                                        <li class ="center"><a href="UI.php"><p>Home Page</p></a></li>
                                        <li class ="center "><a href="List_Of_Tasks.php"><p>List of Tasks</p></a></li>
                                        <li class ="center is_current"><a href="form.php"><p>Personal Information</p></a></li>
                                        <li class ="center"><a href="Departments.php"><p>Department</p></a></li>
                                        <li class ="center "><a href="Projects.php"><p>Projects</p></a></li>
                                    </ul>
                               </div>
 <div class = "subpage_content">
 <?php
$servername = "localhost";
$username = "rchang7";
$password = "Ch990502**";
$databaseName = "rchang7_1";
$conn = new mysqli($servername, $username, $password, $databaseName);
$sql ="SELECT * FROM EMPLOYEE";
$result = $conn -> query($sql);
/*
if(isset($_POST['update']))
{  
   $id = $_POST['ID'];
   $FName = $_POST['First_Name'];
   $LName = $_POST['Last_Name'];
   $Minit = $_POST['Minit'];
   $Office = $_POST['Office'];
   $Contact = $_POST['Contact'];
           
   // mysql query to Update data
   $query = "UPDATE `EMPLOYEE` SET `FName`='".$FName."',`LName`='".$LName."',
   `ID`= '".$id."',`Minit`= '".$Minit."',`Office`= '".$Office."', `Contact`= '".$Contact."',  WHERE `ID` = $id";
   
   $result = mysqli_query($conn, $query);
   
   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($conn);
}
*/
echo "<table>
<tr>
        <th>First_Name</th>
        <th>Minit</th>
        <th>Last_Name</th>
        <th>Employee_ID</th>
        <th>Employee_Office</th>
        <th>Contact</th>
 </tr>";

 while ($row = $result->fetch_assoc())
 {       /* echo "<tr> 
         <td>".$row['FName']."</td>
         <td>".$row['Minit']."</td>
         <td>".$row['LName']."</td>
         <td>".$row['ID']."</td>
         <td>".$row['Office']."</td>
        <td>".$row['Contact']."</td>
         </tr>";*/

         echo "<tr> 
         <td>"."<form action=update.php method=POST >"."<input type=text name=first_name id=First_Name value= {$row['FName']}>"."</td>
         <td>"."<input type=text name=Minit id=Minit value= {$row['Minit']}>"."</td>
         <td>"."<input type=text name=Last_name id=Last_Name value= {$row['LName']}>"."</td>
         <td>"."<input type=text name=ID id=ID value= {$row['ID']}>"."</td>
         <td>"."<input type=text name=Office id=Office value= {$row['Office']}>"."</td>
        <td>"."<input type=text name=Contact id=Contact value= {$row['Contact']}>".
        "<input type=submit name=update id=update value=update>"."</form>"."</td></tr>";
 }

 echo "</table>";

 ?>
</div>
</div>
</body>

    </html>