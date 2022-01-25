<?php 
$email = $_POST["email"];
$password = $_POST["password"];

if(isset($_POST["login"]))
{
    include "connection.php";
$sql = " select *
from users
where  email='{$email}' and password ='{$password}'
";

$result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row= mysqli_fetch_assoc($result))
        {
            session_start();
            $_SESSION["email"] = $row["email"];
            $_SESSION["user"] = $row["id"];

            header("location: http://localhost/php%20learn/voting%20project/insidefiles/dashboard.php");
        }
    }
    else{
        
        echo '
        <script>
         alert("email and password not match");
        window.location = "http://localhost/php%20learn/voting%20project/";
        </script>
        ';
    }
 
}
mysqli_close($conn);
?>