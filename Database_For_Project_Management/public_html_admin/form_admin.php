<?php include 'html_top_admin.php';?>

    <body>
                <div class = "subpage_container">
                <div class="subpage_index center">
                                <ul>
                                        <li class ="center"><a href="UI_admin.php"><p>Home Page</p></a></li>
                                        <li class ="center "><a href="List_Of_Tasks_admin.php"><p>List of Tasks</p></a></li>
                                        <li class ="center is_current"><a href="form_admin.php"><p>Personal Information</p></a></li>
                                        <li class ="center"><a href="Departments_admin.php"><p>Department</p></a></li>
                                        <li class ="center "><a href="Projects_admin.php"><p>Projects</p></a></li>
                                        <li class ="center"><a href="Emergency_admin.php"><p>Emergency</p></a></li>
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

if(isset($_POST['update']))
{  
   $id = $_POST['ID'];
   $FName = $_POST['First_Name'];
   $LName = $_POST['Last_Name'];
   $Minit = $_POST['Minit'];
   $Office = $_POST['Office'];
   $Contact = $_POST['Contact'];
           
   $query2 = "UPDATE EMPLOYEE SET  Office = '$_POST[Office]',Contact = '$_POST[Contact]' WHERE ID = '$_POST[ID]' ";
   
   $result = mysqli_query($conn, $query2);
   
   if($result)
   {
       echo 'Congrats Data Updated';
   }else{
       echo 'Sorry, Data Not Updated';
   }

    echo "<a href='form_admin.php' ><p>Click here to see the result. </p></a>";

   mysqli_close($conn);
}

if(isset($_POST['delete'])){
    $ID = $_POST['ID'];
    //$query2 =  "DELETE FROM List_Of_Tasks WHERE TNum = '$_POST[TNum]' ";
    $query3 =  "DELETE FROM EMPLOYEE WHERE ID=$ID";
    $result3 = mysqli_query($conn, $query3);

    if($result3)
 {
     echo 'Congrats Admin, Employee Deleted';
 }else{
     echo 'Sorry Admin, Employee Not Deleted';
 }

  echo "<a href='form_admin.php' ><p>Click here to see the result. </p></a>";

 //mysqli_close($conn);
}

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
 {       echo "<tr> 
         <td>"."<form action='form_admin.php' method='POST' >"."<input type=text name=first_name id=First_Name value= {$row['FName']}>"."</td>
         <td>"."<input type=text name=Minit id=Minit value= {$row['Minit']}>"."</td>
         <td>"."<input type=text name=Last_name id=Last_Name value= {$row['LName']}>"."</td>
         <td>"."<input type=text name=ID id=ID value= {$row['ID']}>"."</td>
         <td>"."<input type=text name=Office id=Office value= {$row['Office']}>"."</td>
        <td>"."<input type=text name=Contact id=Contact value= {$row['Contact']}>"."</td><td>".
        "<input type=submit name=update id=update value=update>"."</td><td>"."<input type=submit name=delete id=delete value=delete>"."</td></tr>"."</form>";
 }

 echo "</table>";
 ?>
</div>
</div>
</body>

    </html>