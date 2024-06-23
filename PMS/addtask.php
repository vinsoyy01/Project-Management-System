<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style3.css">
    <link rel="shortcut icon" href="images/file-icon.png" type="image/png">
    <title>Add Task</title>
</head>
<body>
    <div class="container">
        <div class="signup">
            <h1>Add Task</h1>
            <p>Fill up of the following</p>
            <form method="POST">
                <label for="">Assigned To:</label>
                <input type="text" placeholder="Enter Name" name="assigned" required><br>
                <label for="">Project Id: </label>
                <input type="text" placeholder="Enter Current Project Id" name="project-id" required><br>
                <label for="">Position: </label>
                <input type="text" placeholder="What's position?" name="position" required><br>
                <label for="status">Status:</label>
                <input type="text" placeholder="Enter Status" name="status" required><br>


                <input type="submit" value="Confirm" name="submit" class="op-btn" onclick="return confirmation()">
                <a href="tasks.php" onclick="return cancel()">Cancel</a>
            </form>
        </div>
    </div>
    

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
        $assignedTo = $_POST['assigned'];
        $projectId = $_POST['project-id'];
        $position = $_POST['position'];
        $status  = $_POST['status'];

        // $query = mysqli_query($con,"SELECT * FROM `tasks` WHERE `task_id` = '$taskId' or `assinged` = '$assignedTo'");
        //     if(mysqli_num_rows($query)>0)

        $check = "SELECT * FROM `tasks` WHERE assigned='$assignedTo'";
        $res = mysqli_query($con,$check);
        $count = mysqli_num_rows($res);

            if($count>0)
            {
                echo "<script>alert('A person has already have position.')</script>";
            }
            else
            {
                $query = "INSERT INTO `tasks` (`assigned`,`project_id`,`position`,`status`)
                VALUES ('$assignedTo','$projectId','$position','$status');";
                {
                    if(mysqli_query($con,$query))
                    {
                        echo "<script>alert('A new task has been posted.')</script>";
                        ?>
                        <meta http-equiv = "refresh" content = "0; url = http://localhost/pms/tasks.php" />
                        <?php
                    }
                    else
                    {
                        echo "<script>alert('Error! Please try again.')</script>";
                        ?>
                        <meta http-equiv = "refresh" content = "0; url = http://localhost/pms/tasks.php" />
                        <?php
                    }
                }
            }
    }
?>