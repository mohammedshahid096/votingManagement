<?php 
include ("../api/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard.css" type="text/css">
  
</head>

<body>
    <div id="voteheadingblock">
        <span id="voteheading">
            <center> Welcome to Voting Pannel</center>
                
        </span>
    </div>


    <hr size="5px">




    <div class="container">
        <div class="row">

            <div class="col-md-4 m-3">
                <!-- showing info div -->
                <?php 
                  $user = $_SESSION["user"];

                include ("../api/connection.php");
                $sql = "select *
                from users
                where id={$user}
                ";
    
                $result = mysqli_query($conn,$sql);

                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {                
                        if($row["status"]==0){
                            $voted =  '<span class="text-danger" style="font-weight:bold;"> Not Voted </span>';
                        }
                        else{
                            $voted =  '
                            <div class="spinner-grow text-success" role="status">
                            </div>
                            <span class="text-success" style="font-weight:bold;">  Voted </span>';
                        }
                        $_SESSION["voterid"] = $row["id"]; 
                        $_SESSION["status"] = $row["status"]; 
                ?>
                <div >
                    <h3>
                        <center style="padding-top: 1.7rem;">User Profile</center>
                    </h3>
                    <img src="../uploads/<?php echo $row["photo"]; ?>" alt="profile" >  <br><br>
                    <b>Name :</b> &nbsp; &nbsp;<?php echo $row["name"]; ?> <br><br>
                    <b>Moblile :</b> &nbsp; &nbsp; <?php echo $row["phone"]; ?> <br><br>
                    <b>Address :</b> &nbsp; &nbsp;<?php echo $row["address"]; ?><br><br>
                    <b>Email :</b>&nbsp; &nbsp; <?php echo $row["email"]; ?><br><br>
                    <b>Status :</b>&nbsp; &nbsp; <?php echo $voted; ?><br><br>
                    <a href="../api/logout.php" ><center><button id="logoutbutton" class="btn btn-primary">Logout</button></center> </a> 
                    <br><br>
                </div>
                <?php 
                  }
              }
                ?>
            </div>

<!-- voting displany panel------------------------------ -->

            <div class="col-md-7 m-4 ">
                <!-- voting block -->
                <h3>    <center style="padding-top: 1.7rem;">Voting List</center> </h3>
                <hr size="7px" style="color:gray;">
                <br>
                <?php 
                $sql2= "select *
                from users
                where role=1
                ";
                $result2 = mysqli_query($conn,$sql2);
                if(mysqli_num_rows($result2)>0)
                {
                    while($row2 = mysqli_fetch_assoc($result2))
                    { 

                ?>
                <img src="../uploads/<?php echo $row2["photo"];?>" alt="" id="groupimg">
                 <b>Party name :</b> <?php echo $row2["name"];?> <br><br>
                 <b>Votes :</b> <?php echo $row2["votes"];?> <br><br> 

                 <form action="../api/vote.php" method="post">
                     <input type="hidden" value= "<?php echo $row2["id"];  ?>" name="candidateid" >
                     <input type="hidden" value= "<?php echo $row2["votes"];  ?>" name="votes" >
                     <?php 
                     if($_SESSION["status"]==0)
                     {

                        echo ' <b><input type="submit"   value="vote" class="btn btn-info "> &nbsp; &nbsp;</b> ';
                    }
                    else{
                         echo ' <b><button disabled class="btn btn-success">voted success </button></b> ';
                     }
                     ?>
                 </form>
                 <br>
                 <hr size="5px" >

                 <?php 
                }
            }
                 ?>
            </div>
        </div>
    </div>
</body>

</html>