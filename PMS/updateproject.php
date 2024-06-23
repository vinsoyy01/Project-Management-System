<?php
    include('dbconn.php');
    $projectId = $_GET['id'];
    $sql = "SELECT * FROM `projects` WHERE `projectid`= $projectId LIMIT 1";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['update']))
    {
        $projectName = $_POST['projectName'];
        $startDate = $_POST['startDate'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];

        $sql = "UPDATE `projects` SET `projectid`='$projectId',`projectname`='$projectName',`startdate`='$startDate',`enddate`='$deadline',`status`='$status' WHERE `projectid`='$projectId'";

        $result = mysqli_query($con,$sql);


        if($result)
        {
            echo "<script>alert('A current project has been updated.')</script>";
            ?>
            <meta http-equiv = "refresh" content = "0; url = https://localhost/pms/projects.php" />
            <?php
        }
        else
        {
            echo "<script>alert('Error, try again.')</script>";
            ?>
            <meta http-equiv = "refresh" content = "0; url = https://localhost/pms/projects.php" />
            <?php
        }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style3.css">
    <link rel="shortcut icon" href="images/file-icon.png" type="image/png">
    <title>Updating Project</title>
</head>
<body>
    <div class="container">
        <div class="signup">
            <h1>Updating Project</h1>
            <p>Fill up of the following</p>
            <form method="POST">
                <label for="">Project Name:</label>
                <input type="text" name="projectName" required value="<?php echo $row['projectname'] ?>"><br>
                <label for="">Start Date: </label>
                <input type="date" name="startDate" value="<?php echo $row['startdate'] ?>">
                <label for="">Deadline: </label>
                <input type="date" name="deadline" value="<?php echo $row['enddate'] ?>">
                <label for="status">Status:</label>
                <input type="text" placeholder="Enter Status" name="status" required value="<?php echo $row['status'] ?>"><br>    
            

                <input type="submit" value="Update" name="update" class="op-btn" onclick="return confirmation()">
                <a href="projects.php" onclick="return cancel()">Cancel</a>
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

