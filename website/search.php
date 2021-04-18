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

<body><?php include "partials/dbconnect.php"; ?>
    <?php
include "partials/header.php";
?>



<div class="container my-3">


<h1> Search result for <?php echo $_GET['search']?></h1>
<?php
$noresults=true;
$query=$_GET['search'];
$sql="select * from threads where match (thread_title,thread_desc) against('$query')";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
    
   
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];
    $treadid=$row['thread_id'];
    $noresults=false;
    echo '<div class="result">
    <h3><a href="threadq.php?threadid='.$treadid.'" class="text-dark">
    '.$title.'</a></h3>
    <p>
    
    '.$desc.'
    </p>';
    }
    if($noresults){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">NO RESULTS FOUND</h1>
          <p class="lead">
          Suggestions:

Make sure that all words are spelled correctly.
Try different keywords.
Try more general keywords.
</p>
        </div>
      </div>';
    }
?>






</div></div>















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