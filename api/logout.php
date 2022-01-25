<?php 
session_start();

session_unset();

session_destroy();

header("location: http://localhost/php%20learn/voting%20project/");
?>