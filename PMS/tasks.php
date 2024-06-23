<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tasks</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="shortcut icon" href="images/file-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Navigation -->
        <nav>
            <img src="images/file-icon.png" alt="logo-icon">
            <label>Project Management System</label>
            <ul>
                <li><a href="signin.php" onclick="return logOut()"><i class="fa-solid fa-power-off"></i>Logout</a></li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Data Lists</h3>
            <a href="projects.php">Projects</a>
            <a class="active" href="tasks.php">Tasks</a>
        </div>

         <!-- Content -->
        <div class="main-content">
            <h1 class="title">Tasks</h1>

            <a href="addtask.php" class="addBtn">Add Task</a>
            <div>
            <table>
            <thead>
                    <tr>
                        <th>Task Id</th>
                        <th>Assigned To</th>
                        <th>Project Id</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include('dbconn.php');
                        $query=mysqli_query($con,"SELECT * FROM `tasks`");
                        while($row=mysqli_fetch_array($query))
                        {?>
                        <tr>
                            <td><?php echo $row['task_id']; ?></td>
                            <td><?php echo $row['assigned']; ?></td>
                            <td><?php echo $row['project_id']; ?></td>
                            <td><?php echo $row['position']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="updatetask.php?id=<?php echo $row['task_id']; ?>" class="btn-edit">Update</a>
                                <a href="deletetask.php?id=<?php echo $row['task_id']; ?>" onclick='return DelFunction()' class="btn-del">Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
            </table>
            </div>
        </div>

    </div>

    <footer class="footer">
                <p>&copy; 2024 Project Management System | All Rights Reserved. | Created by: Vince.</p>
    </footer>
</body>

                <script>
                    function logOut()
                    {
                        return confirm('Are you sure you want to logout?');
                    }
                    function DelFunction()
                    {
                        return confirm('Are you sure to delete this current project?');
                    }
                </script>

</html>