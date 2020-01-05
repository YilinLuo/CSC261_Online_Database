<?php include 'html_top_admin.php';?>
<body>
                <div class = "subpage_container">
                <div class="subpage_index center">
                                <ul>
                                        <li class ="center"><a href="UI_admin.php"><p>Home Page</p></a></li>
                                        <li class ="center "><a href="List_Of_Tasks_admin.php"><p>List of Tasks</p></a></li>
                                        <li class ="center"><a href="form_admin.php"><p>Personal Information</p></a></li>
                                        <li class ="center"><a href="Departments_admin.php"><p>Department</p></a></li>
                                        <li class ="center "><a href="Projects_admin.php"><p>Projects</p></a></li>
                                        <li class ="center is_current"><a href="Emergency_admin.php"><p>Emergency</p></a></li>
                                    </ul>
                               </div>
 <div class = "subpage_content">
 <?php
$servername = "localhost";
$username = "rchang7";
$password = "Ch990502**";
$databaseName = "rchang7_1";
$conn = new mysqli($servername, $username, $password, $databaseName);
$sql ="SELECT * FROM EMERGENCY";
$result = $conn -> query($sql);

if(isset($_POST['update']))
{  
   $EID = $_POST['EID'];
   $EmFName = $_POST['EmFName'];
   $EmMinit = $_POST['EmMinit'];
   $EmLName = $_POST['EmLName'];
   $Relationship = $_POST['Relationship'];
   $Phone = $_POST['Phone'];
   $Email = $_POST['Email'];
           
   $query2 = "UPDATE EMERGENCY SET  EID = '$_POST[EID]',
   EmFName = '$_POST[EmFName]',  EmMinit = '$_POST[EmMinit]',
   EmLName = '$_POST[EmLName]',  Relationship = '$_POST[Relationship]',  
   Phone = '$_POST[Phone]', Email = '$_POST[Email]'
    WHERE EID = '$_POST[EID]' ";
   
   $result = mysqli_query($conn, $query2);
   
   if($result)
   {
       echo 'Congrats Admin, Emergency Data Updated';
   }else{
       echo 'Sorry Admin, Emergency Data Not Updated';
   }

    echo "<a href='Emergency_admin.php' ><p>Click here to see the result. </p></a>";

   mysqli_close($conn);
}

if(isset($_POST['delete'])){
    $EID = $_POST['EID'];
    //$query2 =  "DELETE FROM List_Of_Tasks WHERE TNum = '$_POST[TNum]' ";
    $query2 =  "DELETE FROM EMERGENCY WHERE EID=$EID ";
    $result = mysqli_query($conn, $query2);

    if($result)
 {
     echo 'Congrats Admin, Data Deleted';
 }else{
     echo 'Sorry Admin, Data Not Deleted';
 }

  echo "<a href='Emergency_admin.php' ><p>Click here to see the result. </p></a>";

 //mysqli_close($conn);
}

echo "<table>
<tr>
        <th>EID</th>
        <th>EmFName</th>
        <th>EmMinit</th>
        <th>EmLName</th>
        <th>Relationship</th>
        <th>Phone</th>
        <th>Email</th>
 </tr>";

 while ($row = $result->fetch_assoc())
 {       echo "<tr> 
         <td>"."<form action='Emergency_admin.php' method='POST' >".
         "<input type=text name=EID id=EID value= {$row['EID']}>"."</td>
         <td>"."<input type=text name=EmFName id=EmFName value= {$row['EmFName']}>"."</td>
         <td>"."<input type=text name=EmMinit id=EmMinit value= {$row['EmMinit']}>"."</td>
         <td>"."<input type=text name=EmLName id=EmLName value= {$row['EmLName']}>"."</td>
         <td>"."<input type=text name=Relationship id=Relationship value= {$row['Relationship']}>"."</td>
        <td>"."<input type=text name=Phone id=Phone value= {$row['Phone']}>"."</td>"."<td>".
        "<input type=text name=Email id=Email value= {$row['Email']}>"."</td> <td>".
        "<input type=submit name=update id=update value=update>"."</td><td>"."<input type=submit name=delete id=delete value=delete>"."</form>"."</td></tr>";
 }

 echo "</table>";
 ?>
</div>
</div>
</body>
</html>