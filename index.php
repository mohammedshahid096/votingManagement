<?php 
session_start();
if(isset($_SESSION["email"])) #if not(!). if the session is not set then redirect to the page same page
{
    header("location: http://localhost/php%20learn/voting%20project/insidefiles/dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cssfile.css" type="text/css">
    <style>

    </style>
</head>

<body>
<?php include("insidefiles/display.php"); ?>
       <center> <hr> <h1>Voting Management System</h1> <hr> </center>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                class="tab">Login</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

            <div class="login-form">

                <!-- login div------------------------- -->
                <div class="sign-in-htm">
                    <form action="api/login.php" method="post">
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="email" class="input" name="email">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" name="password">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In" name="login">
                        </div>
                    </form>


                    <div class="hr"></div>

                </div>

                <!-- ------------------now sign up page------------------------------- -->
                <div class="sign-up-htm">
                    <form action="api/signup.php" method="post" enctype="multipart/form-data">
                        <div class="group">
                            <label for="user" class="label">Name</label>
                            <input id="user" type="text" class="input" name="username">
                        </div>
                        <div class="group">
                            <label for="user" class="label">phone</label>
                            <input id="user" type="phone" class="input" name="phone">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email </label>
                            <input id="pass" type="email" class="input" name="email">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Adress </label>
                            <input id="pass" type="text" class="input" name="address">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="text" class="input" name="password">
                            <label for="pass" class="label">confirm Password</label>
                            <input id="pass" type="password" class="input" name="confirmpassword">
                        </div>

                        <div class="group">
                            <label for="pass" class="label">Choose profile
                                <span class="choosefile"> <input class="input" type="file" name="image">
                                </span>
                            </label>
                        </div>

                        <div class="group">
                            <label for="pass" class="label">Select Role

                                <span class="choosefile">

                                    <select class="input" class="select" name="role">
                                        <option value="0" selected>Voter</option>
                                        <option value="1">Candidate</option>
                                    </select>
                                </span>
                            </label>
                        </div>

                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                    </form>
                    <div id="psdisplay">
                        <center>passwords not match</center>
                    </div>
                    <div class="hr"></div>


                </div>
            </div>
        </div>
    </div>


</body>

</html>