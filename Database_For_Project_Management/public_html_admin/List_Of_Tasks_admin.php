<?php include 'html_top_admin.php';?>
                <body>
                        <div class = "subpage_container">
                        <div class="subpage_index center">
                                <ul>
                                        <li class ="center"><a href="UI_admin.php"><p>Home Page</p></a></li>
                                        <li class ="center is_current"><a href="List_Of_Tasks_admin.php"><p>List of Tasks</p></a></li>
                                        <li class ="center"><a href="form_admin.php"><p>Personal Information</p></a></li>
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
$dbname = "rchang7_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT TNum, PNum, TEID, Content, Deadline, Hour, State FROM TASK";
$result = $conn->query($sql);

if(isset($_POST['delete'])){
      $TNum = $_POST['TNum'];
      //$query2 =  "DELETE FROM List_Of_Tasks WHERE TNum = '$_POST[TNum]' ";
      $query2 =  "DELETE FROM TASK WHERE TNum=$TNum ";
      $result = mysqli_query($conn, $query2);

      if($result)
   {
       echo 'Congrats Data Updated';
   }else{
       echo 'Sorry, Data Not Updated';
   }

    echo "<a href='List_Of_Tasks.php' ><p>Click here to see the result. </p></a>";

   //mysqli_close($conn);
}


//if ($result->num_rows > 0) {
    echo "<table>
            <tr>
            <th>Task#</th>
            <th>Project#</th>
            <th>EmployeeID</th>
            <th>Content</th>
            <th>Deadline</th>
            <th>Hour</th>
            <th>State</th>
            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>"."<form action='List_Of_Tasks.php' method='POST' >"."<input type=text name=TNum id=TNum value={$row['TNum']}>"."</td>
        <td>"."<input type=text name=PNum id=PNum value={$row['PNum']}>"."</td>
        <td>"."<input type=text name=TEID id=TEID value={$row['TEID']}>"."</td>
        <td>"."<input type=text  name=Content  id=Content  value={$row[Content]}>"."</td>
        <td>"."<input type=text  name=Deadline  id=Deadline  value={$row[Deadline]}>"."</td>
        <td>"."<input type=text  name=Hour  id=Hour  value={$row[Hour]}>"."</td>
        <td>"."<input type=text  name=State  id=State  value={$row[State]}>"."</td> <td><input type=submit name=delete value=delete id=delete></td>
        </tr>"."</form>";
    }
    echo "</table>";
/*} else {
    echo "0 results";
}*/
$conn->close();
?>
                               </div>
                </body>
</html>
