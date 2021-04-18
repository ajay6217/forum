<?php
$showerror="false";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconnect.php';
    $user_email=$_POST['signupemail'];
    $pass=$_POST['signuppassword'];
    $cpass=$_POST['signupcpassword'];


    $existsql="select * from `users` where user_email='$user_email'";
    $result=mysqli_query($conn,$existsql);
    $numrow=mysqli_num_rows($result);
    if($numrow>0){
        $showerror="email already in use";
    }
    else{
        if($pass==$cpass){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showalert=true;
                header("Location:/website/index.php?signupsuccess=true");
                exit;
            }

        }
        else{
            $showerror="passwords do not match";
           
        }
    }
    header("Location:/website/index.php?signupsuccess=false&error=$showerror");
}
?>