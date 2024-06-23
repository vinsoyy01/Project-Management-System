
<?php
    include('dbconn.php');
        $taskId = $_GET['id'];
        if(mysqli_query($con,"DELETE FROM `tasks` WHERE `task_id` = '$taskId'"))
        {
        echo "<script>alert('Deleted.')</script>";
        ?>
        <meta http-equiv = "refresh" content = "0; url = https://localhost/pms/tasks.php" />
        <?php
    }
?>