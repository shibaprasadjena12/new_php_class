<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        session_start();
        $con = mysqli_connect("localhost","chiku","new_password","login") or die("connection was not created");
        if (isset($_REQUEST['submit']))
        {
            //echo "Username and Password submited";

            $username=mysqli_real_escape_string($con,$_REQUEST['username']);
            $password=mysqli_real_escape_string($con,$_REQUEST['pwd']);
            $myqry=$con->query("SELECT * FROM users WHERE username='$username' and password='$password'");
            if($res=mysqli_fetch_assoc($myqry))
            {
                ?>
                <script>
                    alert("Login successful");
                </script>
                <?php
                	header('Location:home.php');
            }
            else{
                echo "invalid username/password";
            }
        }
    ?>
    <center>
        <h1>Chiku Login Page</h1>
        <form action = "" method = "post">
            <input type = "text" name = "username" placeholder = "Enter Username"> <br> <br>
            <input type = "password" name = "pwd" placeholder = "Enter Password"> <br> <br>
            <input type = "submit" value = "Login" name = "submit">
        </form>
    </center>
</body>
</html>
