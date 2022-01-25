<html>

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        .row{
            background-color: rgba(11, 12, 12, 0.712);

        }

        .container {
            border: 5px solid black;
            border-radius: 10px;
            color:white;
            width:94%;
            margin: auto;
            
        }

        #displayimg {
            width: 6rem;
            height: 6rem;
            margin-left: 6rem;
            margin-top: 1rem;
            border-radius: 30%;
        }

        b {
            margin-left: 1.2rem;
            line-height: 1.2px;
            color: white;
            font-size: 15px;

        }

        .pagination {
  display: inline-block;
  font-size:22px;
  margin-top:20px;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: white;
  border-radius: 5px;
}  

    </style>
</head>

<body>
    <h3>
        <center style="padding-top: 1.7rem;">Candidate  votes</center>
    </h3>
    <div class="container">
        
        <div class="row">

            <?php 

            include "api\connection.php";
            $limit = 4;

            

            if(isset($_GET["page"]))
            {
                $pageno = $_GET["page"];
                // echo $pageno;
            }
            else{
                $pageno=1;
            }
            $offset = ($pageno-1)*$limit;
            $sql = "select *
            from users
            where role=1
            limit {$offset},{$limit}
            ";
            $result = mysqli_query($conn,$sql) or die("sql fail to run");

            if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {  

            ?>
            <div class="col">
                <img src="uploads/<?php echo $row["photo"]; ?>" alt="party profile" id="displayimg"> <br><br>
                <b>Party-Name :</b> &nbsp; &nbsp;<?php echo $row["name"]; ?><br><br>
                <b>votes :</b> &nbsp; &nbsp;<?php echo $row["votes"]; ?>
            </div>
          <?php 
               
                    }
                }
            ?>
            
        </div>
        
    </div>
    <center>
        <!-- ---------------------pagination formulas-----------  -->
        <div class="pagination">
            
            
            <?php 
        $sql2 = "select *
        from users
        where role=1
         ";
        $result2 = mysqli_query($conn,$sql2);
        if(mysqli_num_rows($result2)>0)
        {
            $total_records = mysqli_num_rows($result2); //here total records value will be placed
            // echo $total_records." ";
            // echo $limit." ";
            $total_pages = ceil($total_records/$limit); // finding the total pages 
            // echo $total_pages;
            $previouspg = $pageno-1;
            if($previouspg==0){
                $previouspg=1;
            }
            echo "<a href='index.php?page=$previouspg'>&laquo;</a>";

            for($i=1;$i<=$total_pages;$i++)
            {
                if($i==$pageno){
                    $active = "active";
                }
                else{
                    $active = "";
                }
                
              
                echo "<a href='index.php?page=$i' class='$active'>$i </a>";
            }
            $nextpg = $pageno+1;
            if($nextpg>=$total_pages)
            {
                $nextpg=$total_pages;
            }
            echo "<a href='index.php?page=$nextpg'>&raquo;</a>";
        }
            ?>


</div>
    </center>
        
    
</body>

</html>
