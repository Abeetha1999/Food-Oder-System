<?php 

include('../Config/constants.php');


?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>

        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset ($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <br><br>
            <!-- Loging form start hear -->

            <form action="" method="POST" class="text-center">
                Uername: <br>
                <input type="text" name="username" placeholder="Enter Username"> <br><br>

                Password: <br>
                <input type="password" name="password" placeholder="Enter password"> <br> <br>
                
                <input type="submit" name="submit" value="login" class="btm-primary">
                <br><br>
            </form>

            <!-- Loging form start hear -->

            <p class="text-center"> Created by - <a href="https://www.linkedin.com/in/abeetha-jayaweera-43267b240/"> Abeetha Kawshalya </a></p>
        </div>
        
    </body>
</html>

<?php 

//Chech whether the submit button clicked or not
if(isset($_POST['submit']))
{
    //Process for login
    // 1. Get the data from login form
     $username = $_POST['username'];
     $password = md5($_POST['password']);

    // 2. SQL to check whether the user with username & password exist or not
    $sql ="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'"; 

    // 3. Excute the query
    $count = mysqli_query($conn, $sql);

$result=mysqli_num_rows($count);
    if($result==1)
    {
        //user available & login succsess
        $_SESSION['login'] = "<div class ='success'> Login Succsessful. </div>";
        $_SESSION['user'] = $username; // Check whether the user is logged in or logout will unset it

        //Redirect to Home page/ Dashboard
        header('location:'.SITEURL.'admin/');
    }
    else
    {

    //User not available and login fail
    $_SESSION[ 'login'] = "<div class ='error text-center'> Username or password did mot match. </div>";

        //Redirect to Home page/ Dashboard
        header('location:'.SITEURL.'admin/login.php');
    }
}

?>