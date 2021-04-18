<?php
//$showerror="false";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconnect.php';
    $email=$_POST['loginemail'];
    $pass=$_POST['loginpass'];
    $sql="select * from users where user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($result);
    if($numrows==1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($pass,$row['user_pass']))
        {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['sno']=$row['sno'];
            $_SESSION['useremail']=$email;
            
            
        
        }
    header("Location:/website/index.php");
    }
header("Location:/website/index.php");
}
?>