<?php 
// when ever the user is logout and he knows the insider page
// then he can easily login into the page 
// so to secure those pages we need to use the sessions 
// if the sessions are in not active mode then we redirect the user into the same page 
// so he cannot inter insider page without login the email and password

// sooo now let start the sessions here
session_start();

if(!isset($_SESSION["email"])) #if not(!). if the session is not set then redirect to the page same page
{
    header("location: http://localhost/php%20learn/voting%20project/");
}


?>