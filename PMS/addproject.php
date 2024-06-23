<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style3.css">
    <link rel="shortcut icon" href="images/file-icon.png" type="image/png">
    <title>Add Project</title>
</head>
<body>
    <div class="container">
        <div class="signup">
            <h1>Add Project</h1>
            <p>Fill up of the following</p>
            <form method="post">
                <label for="">Project Name:</label>
                <input type="text" placeholder="Enter Project Name" name="projectName" required><br>
                <label for="">Start Date: </label>
                <input type="date" name="startDate">
                <label for="">Deadline: </label>
                <input type="date" name="deadline">
                <label for="status">Status:</label>
                <input type="text" placeholder="Enter Status" name="status" required><br>


                <input type="submit" value="Confirm" name="submit" class="op-btn" onclick="return confirmation()">
                <a href="projects.php" onclick="return cancel()">Cancel</a>
            </form>
        </div>
    </div>
    
    <!-- $date = date('m-d-y') -->

    <footer class="footer">
        <p>&copy; 2024 Project Management System | All Rights Reserved. | Created by: Vince.</p>
    </footer>

    <script>
        function confirmation()
        {
            return confirm('Are you sure this field is correct?');
        }
        function cancel()
        {
            return confirm('Are you sure want to cancel this operation?');
        }
    </script>
</body>


<?php
    include('dbconn.php');

    if(isset($_POST['submit']))
    {
        $projectName = $_POST['projectName'];
        $startDate = ($_POST['startDate']);
        $deadline = ($_POST['deadline']);
        $status  = $_POST['status'];

        $query = mysqli_query($con,"SELECT * FROM `projects` WHERE `projectid` = '$projectId' or `projectname` = '$projectName'");
            if(mysqli_num_rows($query)>0)
            {
                echo "<script>alert('The project has already taken')</script>";
            }
            else
            {
                $query = "INSERT into `projects` (projectname,startdate,enddate,status)
                VALUES ('$projectName','$startDate','$deadline','$status')";
                {
                    if(mysqli_query($con,$query))
                    {
                        echo "<script>alert('A new project has been posted.')</script>";
                        ?>
                        <meta http-equiv = "refresh" content = "0; url = http://localhost/pms/projects.php" />
                        <?php
                    }
                    else
                    {
                        echo "<script>alert('Error! Please try again.')</script>";
                        ?>
                        <meta http-equiv = "refresh" content = "0; url = http://localhost/pms/projects.php" />
                        <?php
                    }
                }
            }
    }
?>