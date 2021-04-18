<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/website">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Top Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql="SELECT category_name, category_id FROM `categories`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
         
                echo  '<li><a class="dropdown-item" href="threads.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>
          ';
        }
        echo '</ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contacts.php" tabindex="-1">Contact</a>
      </li>
    </ul>
    <div class="mx-2">';
    if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
      echo '<form class="d-flex" action="search.php" method ="get">
      <input class="form-control me-2" type="search" name ="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
     <p class="text-light my-0 mx-2"> Welcome '.$_SESSION['useremail'].'</p>
     <a href="partials/logout.php" class="btn btn-outline-success" type="submit">logout</a>
     </form>';
  

    }
    else{

    echo '<div class="btn-group">
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
    
    <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
    <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signmodal">Signup</button>';
    }
    echo '</div>
    
  </div>
</div>
</nav>';

include 'partials/loginmodal.php';
include 'partials/signmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can login now
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>