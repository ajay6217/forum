<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>idiscuss!</title>
</head>

<body>
<?php include "partials/dbconnect.php"; ?>
    <?php
include "partials/header.php";
?>
    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `categories` WHERE category_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $catname=$row['category_name'];
        $catdesc=$row['category_description']; 
    }
    ?>
    <?php
    $method=$_SERVER['REQUEST_METHOD'];
    $showalert=false;
    if($method=='POST'){
        $th_title=$_POST['title'];
        $th_title=str_replace("<","&lt",$th_title);
        $th_title=str_replace(">","&gt",$th_title);
        $th_desc=$_POST['desc'];
        $th_desc=str_replace("<","&lt",$th_desc);
        $th_desc=str_replace(">","&gt",$th_desc);
        $sno=$_POST['sno'];
        $sql="INSERT INTO `threads` (`thread_title`, `thread_cat_id`, `thread_user_id`, `timestamp`, `thread_desc`) VALUES ('$th_title', '$id', '$sno', current_timestamp(), '$th_desc')";
   $result=mysqli_query($conn,$sql);
   $showalert=true;
   if($showalert){
       echo '<div class="alert alert-success" role="alert">
       <h4 class="alert-heading">Well done!</h4>
       
     </div>';
   }
    }
    
    
    
    ?>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">welcome to <?php echo $catname;?></h1>
            <p class="lead"><?php echo $catdesc;?></p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
           
        </div>
        <?php
        if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true)
        {

       echo' <div class="container">
        <h1>Browse Questions
            </h1>

        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
                <div class="mb-3">
                
                    <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Ask here</div>
                    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">textarea</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        
        
        
        </div>';
        }
        else{
            echo '<div class="container">
            <h1>Browse Questions
            </h1>

            <p class="lead">You are not loggedin .Please login to start a discussion</p>
            </div>';
        }
        ?>
        <div class="container">
           
            <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
    $result=mysqli_query($conn,$sql);
    $noresult=true;
    while($row=mysqli_fetch_assoc($result)){
        $noresult=false;
        $id=$row['thread_id'];
        $title=$row['thread_title'];
        $desc=$row['thread_desc']; 
        $thread_user_id=$row['thread_user_id'];
        $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);

   
echo '<div class="media" my-3>
  <img class="mr-3" src="partials/user.png" width="54px" alt="....">
  <div class="media-body">'.
    '<h5 class="mt-0"><a href="threadq.php?threadid='.$id.'">'.$title.'</a></h5>
    '.$desc.'

   </div>'.'
   <p>Asked By</p>
   <p class="font-weight-bold my-0">'.$row2['user_email'].'</p>'.'
</div>';
    }
    if($noresult)
    {
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No Question</h1>
          <p class="lead">Be first to ask</p>
        </div>
      </div>';
    }
    ?>

           

        </div>

        <!--for loop  -->




    </div>

















    <?php
include "partials/footer.php";

  ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>