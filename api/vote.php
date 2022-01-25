<?php 
session_start();
$voterid = $_SESSION["voterid"]; //getting an id for which voter is this.
$candidate_id = $_POST["candidateid"];
$votes = $_POST["votes"];
$total_votes = $votes+1;
echo $voterid."<br>";
echo $candidate_id."<br>";
echo $votes."<br>";
echo $total_votes."<br>";

include "connection.php";

$sql = "update users
set 
votes = {$total_votes}
where id = {$candidate_id} 
";  //here the votes will be updated now

$result = mysqli_query($conn,$sql);
if($result){
    echo "updated";
}
else
{
    echo "fail to vote";
}



//   now we want to update status is voted as 1 in the  voter id also 
$sql2 = " update users
set 
status = 1
where id = {$voterid} 
";  //here the status will be updated will be updated now

$result2 = mysqli_query($conn,$sql2);
if($result2){
    echo "status changed";
}
else {
    echo "faile to change status";
}

header("location: http://localhost/php%20learn/voting%20project/insidefiles/dashboard.php");
mysqli_close($conn);
?>