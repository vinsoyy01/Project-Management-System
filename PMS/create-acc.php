<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style1.css">
    <link rel="shortcut icon" href="images/file-icon.png" type="image/png">
    <title>Sign Up Now as Administrator</title>
</head>
<body>
    <div class="container">
        <div class="signup">
            <h1>Registration Form</h1>
            <p>Please fill up the information.</p>
            <form method="post">
                <input type="text" placeholder="Enter Username" name="username"required><br>
                <input type="email" name="email" id="email" placeholder="Enter Email" required><br>
                <input type="password" name="password" id="password" placeholder="Enter Password" required><br>
                <input type="password" name="confirmpassword" id="cpassword" placeholder="Enter Confirm Password" required><br>
                <input type="checkbox" id="showPassword" onclick="showPass()"><label for="showPassword">Show Password</label><br>
                <input type="submit" value="Sign Up" name="submit" class="btn" onclick="return confirmation()">
            </form>
            <p>Already have an account??<br><a href="signin.php">Sign In Now</a></p>
        </div>
    </div>
    

    <footer class="footer">
        <p>&copy; 2024 Project Management System | All Rights Reserved. | Created by: Vince.</p>
    </footer>
</body>
</html>

    <script>
        function confirmation()
        {
            return confirm('Are you sure your information is correct?');
        }

        function showPass()
        {
            const password = document.getElementById('password');
            const confirmpass = document.getElementById('cpassword');
            const showPassword = document.getElementById('showPassword');

            if(showPassword.checked)
            {
                password.type = 'text';
                confirmpass.type = 'text'; 
            }
            else
            {
                password.type = 'password';
                confirmpass.type = 'password';
            }
        }
    </script>

    <?php
        include('dbconn.php');

        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword= $_POST['confirmpassword'];
            
            $query = mysqli_query($con,"SELECT * FROM `account` WHERE `username` = '$username' or `email` = '$email'");
            if(mysqli_num_rows($query)>0)
            {
                echo "<script>alert('Your Full Name or Email has already taken')</script>";
            }
            else
            {
                if($password == $confirmpassword)
                {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    $query = "INSERT INTO `account`(`username`,`email`, `password`, `confirmpassword`)
                    VALUES ('$username','$email','$hashedPassword','$confirmpassword')";
                    mysqli_query($con,$query);
                    echo "<script> alert('Registration Successfully.');</script>";
                    ?>
                    <meta http-equiv = "refresh" content = "0; url = http://localhost/pms/signin.php" />
                    <?php
                }
                else{
                    echo "<script>alert('Password does not match, try again');</script>";
                }
            }
        }
    ?>