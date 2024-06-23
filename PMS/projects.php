<!DOCTYPE html>
<html lang="en">
<head>
    <title>Projects</title>
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
            <a class="active" href="projects.php">Projects</a>
            <a href="tasks.php">Tasks</a>
        </div>

         <!-- Content -->
        <div class="main-content">
            <h1 class="title">Projects</h1>
            <div>
                <a href="addproject.php" class="addBtn">Add Project</a>   
            <table>
                <thead>
                    <tr>
                        <th>Project Id</th>
                        <th>Project Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include('dbconn.php');
                        $query=mysqli_query($con,"SELECT * FROM `projects`");
                        while($row=mysqli_fetch_array($query))
                        {?>
                        <tr>
                            <td><?php echo $row['projectid']; ?></td>
                            <td><?php echo $row['projectname']; ?></td>
                            <td><?php echo $row['startdate']; ?></td>
                            <td><?php echo $row['enddate']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="updateproject.php?id=<?php echo $row['projectid']; ?>" class="btn-edit">Update</a>
                                <a href="deleteproject.php?id=<?php echo $row['projectid']; ?>" onclick='return DelFunction()' class="btn-del">Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
                </tbody>
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