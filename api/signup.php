<?php 
 $name = $_POST["username"];
 $phone = $_POST["phone"];
 $email = $_POST["email"];
 $address = $_POST["address"];
 $password = $_POST["password"];
 $confirmpassword = $_POST["confirmpassword"];
 $image = $_FILES["image"]["name"];
 $temp_img = $_FILES["image"]["tmp_name"];
 $role = $_POST["role"];


 
 if($password==$confirmpassword) //if the password is correct then only we have to upload a data in the DB
 { 
   if(isset($_FILES["image"]))  //here we check the condition is image is uploaded or not
   {
      move_uploaded_file($temp_img, "../uploads/$image"); //to upload in the upload file here is the syntax move_uploaded_file(tempimgnae, destination);
      include "connection.php";
      $sql = "insert into users(name,phone,email,address,password,photo,role,status,votes)
      values
      ('{$name}','{$phone}','{$email}','{$address}','{$password}','{$image}','{$role}',0,0)
      ";

      $result = mysqli_query($conn,$sql);
    
       echo '
       <script>
       alert("registration successful!");
       window.location = "http://localhost/php%20learn/voting%20project/";
       </script>
       ';
   }
   else{
       echo " image not found";
   }

}
 else
 {
    echo '
    <script>
    alert("passwords or not matched");
    window.location = "http://localhost/php%20learn/voting%20project/";
    </script>
    ';
 }

mysqli_close($conn);
 

?>
<!-- echo $name." ";
 echo $phone." ";
 echo $email." ";
 echo $address." ";
 echo $password." ";
 echo $confirmpassword." ";
 echo $image." ";
 echo $temp_img." ";
 echo $role." "; -->