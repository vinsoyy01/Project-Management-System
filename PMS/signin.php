<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/file-icon.png" type="image/png">
    <link rel="stylesheet" href="style1.css">
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Project Management System</h1>
            <img src="images/file-icon.png" alt="logo">

            <p>Welcome! Please Sign In first</p>
            <form action="signin.php" method="POST">
                <input type="email" name="Email" placeholder="Enter Email" required><br>
                <input type="password" name="Password" id="password" placeholder="Enter Password" required><br>
                <input type="checkbox" id="showPassword" onclick="showPass()"><label for="showPassword">Show Password</label><br>
                <input type="submit" value="Sign in" name="submit" class="btn">
            </form>
            <p>You don't have a member?<br><a href="create-acc.php">Create Account Now</a></p>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Project Management System | All Rights Reserved. | Created by: Vince.</p>
    </footer>

    <script>
        function showPass()
        {
            const password = document.getElementById('password');
            const showPassword = document.getElementById('showPassword');

            if(showPassword.checked)
            {
                password.type = 'text';
            }
            else
            {
                password.type = 'password';
            }
        }
    </script>
</body>
</html>

    <?php
        session_start();
        include('dbconn.php');

        if(isset($_POST['submit']))
        {
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
        
            $select = mysqli_query($con, "SELECT * FROM account WHERE email = '$Email'");
            $row = mysqli_fetch_assoc($select);
            if(mysqli_num_rows($select)>0)
            {
                if ($Password == $row["confirmpassword"])
                {
                    $_SESSION['submit'] = true;
                    $_SESSION['userid'] = $row['userid'];
                    header("Location: projects.php");
                    die();
                }
                else
                {
                    echo "<script>alert('Invalid Password');</script>";
                }
            }
            else
            {
                echo "<script>alert('Invalid credentials, Try again.');</script>";
            }
        }
    ?>