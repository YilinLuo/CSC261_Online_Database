<?php include 'html_top_admin.php';?>
<body>
            <div class ="main_page">
 <div class="main_page_index center">
 <ul>
    <li class ="center is_current"><a href="UI_admin.php"><p>Home Page</p></a></li>
     <li class ="center"><a href="List_Of_Tasks_admin.php"><p>List of Tasks</p></a></li>
     <li class ="center"><a href="form_admin.php"><p>Personal Information</p></a></li>
     <li class ="center"><a href="Departments_admin.php"><p>Department</p></a></li>
     <li class ="center"><a href="Projects_admin.php"><p>Projects</p></a></li>
     </ul>
</div>

<div class ="message_container center">
<div class ="All_Tasks" >
    //This is UI admin
    //This section is a work in progress: 
    //use PHP form to fetch tasks 
    //and order them into a list
    </div>

<div class ="upto_date_tasks">
    //This section is a work in progress: use PHP to fetch tasks 
    //that has same due date as access date,
    //and display in format: Task number, 
    //due date, department name.
        </div>
<div class= "due_soon">
    //This section is a work in progress: 
    //use PHP to fetch tasks 
    //that are due in 5 days from now -
    //current access date plus 5 days. 
        </div>
</div>
   

</div>
</body>

</html>