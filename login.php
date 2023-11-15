<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/favicon.png">
    <?php include 'include/database.inc.php';?>
    
</head>
<body>
<?php  //Start the Session
    session_start();
    require('include/database.inc.php');
    //3. If the form is submitted or not.
    //3.1 If the form is submitted
    if (isset($_POST['username']) and isset($_POST['password'])){
        //3.1.1 Assigning posted values to variables.
        $username = $_POST['username'];
        $password = $_POST['password'];
        //3.1.2 Checking the values are existing in the database or not
        $query = "SELECT * FROM `test` WHERE username='$username' AND password='$password'";

        $result = mysql_query($query) or die(mysql_error());
        $count = mysql_num_rows($result);
        //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
        if ($count == 1){
            $_SESSION['username'] = $username;
            header("Location: index.html"); //header to redirect, but doesnt work
            exit();
        }
        else{
            //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
            echo "Invalid Login Credentials.";
        }
    }

?>    


    <nav class="navbar navbar-expand-lg bg-rgb(102,45,145) px-0">
        <div class="container-fluid">
            <div class="dropdown">
                <a class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="w-50" src="assets/menu_icon.png">
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.html">Home</a></li>
                    <li><a class="dropdown-item" href="#">Login</a></li>
                    <li><a class="dropdown-item" href="#">Info</a></li>
                </ul>
            </div>
            <!-- Move the logo image to the end of the navbar -->
            <a href="index.html"><img id="logoimage" class="navbar-brand ml-auto" src="assets/logonavbar.png"></a>
        </div>
    </nav> 

<!--showdown-->
<form name="loginform" onsubmit="return validation()" action="login.php" method="post">
  <div class="container overflow-hidden text-center p-5 ">
    <div class="row gx-5">
      <div class="col p-5">
        <div id="box1" class="p-5  rounded text-start">
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="username" name="username" class="form-control" placeholder="username">
                <small id="userHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control" placeholder="password">
                <small id="userHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
            </div>
            <div class="text-center">
                <button type="submit" id="buttonLogin" class="rounded" href="info.html">
                    Login
                </button>
            </div>
            </div>
        </div>
    </div>
    </div>
</form>
<script>
    function validation() {
        var id = document.loginform.user.value;
        var ps = document.loginform.pass.value;

        if(id.length == "" && ps.length == "") {
            alert("Username and password fields are empty");

            return false;
        }

        else {
            if(id.length == "") {
                alert("Username field is empty");

                return false;
            }
            if(ps.length == "") {
                alert("Password field is empty");

                return false;
            }
        }
    }

    

</script>
<!--Footer-->
     <footer id="footer" class="p-5 text-white text-center position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                  <li><a class="linksfooter" href="index.html">Home</a></li>
                    <hr/>
                    <li><a class="linksfooter" href="#">Login</a></li>
                    <hr/>
                    <li><a class="linksfooter" href="#">Info</a></li>
                    <hr/>
                </div>
                <div class="col-md-4">
                  <li><a class="linksfooter" href="#">FAQ</a></li>
                    <hr/>
                    <li><a class="linksfooter" href="#">Hulp</a></li>
                    <hr/>
                    <li><a class="linksfooter" href="#">Contact</a></li>
                    <hr/>
                </div>
                <div class="col-md-4">
                  <li><a class="linksfooter" href="#">Rachelsmolen 1</a></li>
                    <hr/>
                    <li><a class="linksfooter" href="#">Eindhoven</a></li>
                    <hr/>
                    <li><a class="linksfooter" href="#">5612 MA</a></li>
                    <hr class="line"/>
                </div>
            </div>
        </div>
        <p class="lead py-5">Copyright &copy; 2023 WattWise</p>
    </footer>

</body>
</html>