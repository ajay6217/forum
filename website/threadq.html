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
   $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_assoc($result)){
        
        $id=$row['thread_id'];
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
        $thread_user_id=$row['thread_user_id'];
        $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        $posted_by=$row2['user_email'];
    }
    ?>
    <?php
    $method=$_SERVER['REQUEST_METHOD'];
    $showalert=false;
    if($method=='POST'){
        $comment=$_POST['comment'];
        $comment=str_replace("<","&lt",$comment);
        $comment=str_replace(">","&gt",$comment);
        $sno=$_POST['sno'];
        
        $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
   $result=mysqli_query($conn,$sql);
   $showalert=true;
   if($showalert){
       echo '<div class="alert alert-success" role="alert">
       <h4 class="alert-heading">your comment has been added</h4>
       
     </div>';
   }
    }
    
    
    
    ?>
    
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">welcome to <?php echo $title;?></h1>
            <p class="lead"><?php echo $desc;?></p>
            <hr class="my-4">
            <p>posted by: <b> <?php echo $posted_by;?> </b></p>

        </div>


        <?php
        if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true)
        {

       echo '<div class="container">
       <form action="'.$_SERVER['REQUEST_URI'].'" method="post">

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">postcomment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
            </div>
            
            <button type="submit" class="btn btn-success">postcomment</button>
        </form>
        
        
        
        </div>';
        }
        else{
            echo '<div class="container">
            <h1>Post a comment
            </h1>

            <p class="lead">You are not loggedin .Please login to post comments</p>
            </div>';
        }
        ?>
        <div class="container">
            <h1>Disscussion
            </h1>
        


        <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `comments` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    $noresult=true;
    while($row=mysqli_fetch_assoc($result)){
        $noresult=false;
        $id=$row['comment_id'];
        $content=$row['comment_content'];
        $comment_time=$row['comment_time'];
        $thread_user_id=$row['comment_by'];

        $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);

   
        echo '<div class="media"><img class="mr-3" src="partials/user.png" width="50px" alt="Generic placeholder image"><div class="media-body">
        <p class="font-weight-bold my-0">'.$row2['user_email'].' :  at '.$comment_time.'    </>
        '.$content.'
    
    
   </div>
</div>';
    }
    ?>
   </div>
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
