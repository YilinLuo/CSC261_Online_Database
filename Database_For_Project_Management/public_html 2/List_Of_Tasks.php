<?php include 'html_top.php';?>
                <body>
                        <div class = "subpage_container">
                        <div class="subpage_index center">
                                <ul>
                                        <li class ="center"><a href="UI.php"><p>Home Page</p></a></li>
                                        <li class ="center is_current"><a href="List_Of_Tasks.php"><p>List of Tasks</p></a></li>
                                        <li class ="center"><a href="form.php"><p>Personal Information</p></a></li>
                                        <li class ="center"><a href="Departments.php"><p>Department</p></a></li>
                                        <li class ="center "><a href="Projects.php"><p>Projects</p></a></li>
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

if ($result->num_rows > 0) {
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
        <td>".$row["TNum"]."</td>
        <td>".$row["PNum"]."</td>
        <td>".$row["TEID"]."</td>
        <td>".$row["Content"]."</td>
        <td>".$row["Deadline"]."</td>
        <td>".$row["Hour"]."</td>
        <td>".$row["State"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
                               </div>
                </body>
</html>
