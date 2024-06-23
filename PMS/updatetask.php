<?php
    include('dbconn.php');
    $taskId = $_GET['id'];
    $sql = "SELECT * FROM `tasks` WHERE `task_id`= $taskId LIMIT 1";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['update']))
    {
        $assignedTo = $_POST['assigned'];
        $projectId = $_POST['projectId'];
        $position = $_POST['position'];
        $status  = $_POST['status'];

        $sql = "UPDATE `tasks` SET `task_id`= '$taskId', `assigned` = '$assignedTo', `project_id` ='$projectId', `position`='$position', `status` = '$status' WHERE `task_id` = '$taskId'";

        $result = mysqli_query($con,$sql);

        if($result)
        {
            echo "<script>alert('Updated.')</script>";
            ?>
            <meta http-equiv = "refresh" content = "0; url = https://localhost/pms/tasks.php" />
            <?php
        }
        else
        {
            echo "<script>alert('Error, try again.')</script>";
            ?>
            <meta http-equiv = "refresh" content = "0; url = https://localhost/pms/tasks.php" />
            <?php
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="style3.css">
        <link rel="shortcut icon" href="images/file-icon.png" type="image/png">
        <title>Updating Task</title>
    </head>
    <body>
        <div class="container">
            <div class="signup">
                <h1>Updating Project</h1>
                <p>Fill up of the following</p>
                <form method="POST">
                <label for="">Assigned To:</label>
                <input type="text" placeholder="Enter Name" name="assigned" required value="<?php echo $row['assigned'] ?>"><br>
                <label for="">Project Id: </label>
                <input type="text" placeholder="Enter Current Project Id" name="projectId" required value="<?php echo $row['project_id'] ?>"><br>
                <label for="">Position: </label>
                <input type="text" placeholder="What's position?" name="position" required value="<?php echo $row['position'] ?>"><br>
                <label for="status">Status:</label>
                <input type="text" placeholder="Enter Status" name="status" required value="<?php echo $row['status'] ?>"><br>


                <input type="submit" value="Confirm" name="update" class="op-btn" onclick="return confirmation()">
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

