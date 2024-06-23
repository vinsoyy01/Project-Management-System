<?php
    include ('dbconn.php');

    $projectId = $_GET['id'];
    if(mysqli_query($con,"DELETE FROM `projects` WHERE `projectid` = '$projectId'"))
    {
        echo "<script>alert('Deleted.')</script>";
        ?>
            <meta http-equiv = "refresh" content = "0; url = https://localhost/pms/projects.php" />
            <?php
    }  
?>