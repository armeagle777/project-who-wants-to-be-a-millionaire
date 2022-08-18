<?php
session_start();
require_once('simpleImage.php');

//change page to signup
 if(isset($_GET['page']) && file_exists($_GET['page'].'.php')){
     header('Location: signup.php');
     
 }


//signin function
if(isset($_POST['login'])){
    include_once 'connect.php';
    $uid = mysqli_real_escape_string($con, $_POST['uid']);
    $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
    
    //Error handlers
    //Check if inputs are empty
    if(empty($uid) || empty($pwd)){
        header("Location: ../index.php?login=empty");
        session_unset();
        exit();
    }else{
        $sql="SELECT * FROM user WHERE user_uid='$uid' OR user_email='$uid'";
        $result=mysqli_query($con,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            header("Location: ../index.php?login=error");
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                //De hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if($hashedPwdCheck == false){
                    header("Location: ../index.php?login=error");
                    exit();
                }elseif($hashedPwdCheck == true){
                    // Loging the user
                    $_SESSION['u_id'] = $row['user_uid'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                     if($row['img']== ''){
                         $_SESSION['image']='no.jpg';
                     }else{
                         $_SESSION['image']=$row['img'];
                     }
     
                    header("Location: ../personal.php");
                    exit();
                }
            }
        }
    }
}



//logout
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}

//enter while session isset
if(isset($_POST['enter'])){
    header("Location: ../personal.php");
    exit();
}
// Add picture
if(isset($_POST['add_img'])){
    require_once('connect.php');
$img='';

    //Get id
    $id=$_SESSION['u_id'];
    //img
    if($_FILES['img']['size'] > 0){
        $img=$id.'.jpg';
        $image= new SimpleImage();
        $image->load($_FILES['img']['tmp_name']);
        $image->crop(100,100);
        $image->save('../photo/'.$img.'jpg');
    //Update sql
        $update=mysqli_query($con,"UPDATE user SET img = '$img' WHERE user_id ='$uid'");
        if($update){
            header("Location: ../personal.php?photo=success");
            exit();
        }
    }
}



//signup function
if(isset($_POST['signup'])){
    include_once 'connect.php';
    $first = mysqli_real_escape_string($con,$_POST['first']);
    $last = mysqli_real_escape_string($con,$_POST['last']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $uid = mysqli_real_escape_string($con,$_POST['uid']);
    $pwd = mysqli_real_escape_string($con,$_POST['pwd']);
    $conf_pwd = mysqli_real_escape_string($con,$_POST['conf_pwd']);
    
    // Errors
    // Check for  empty  fields
    if(empty($first) || empty($last) || empty($email) || empty($pwd) || empty($conf_pwd)){
        header('Location: ../signup.php?signup=empty');
        exit();
    }else{
        // Check if input charackters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
            header('Location: ../signup.php?signup=invalid');
            exit();
        }else{
            //Check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               header('Location: ../signup.php?signup=email');
                exit(); 
            }else{
                $sql= "SELECT * FROM user WHERE user_uid = '$uid'";
                $result=mysqli_query($con,$sql);
                $resultCheck=mysqli_num_rows($result);
                
                if($resultCheck > 0){
                    header('Location:../signup.php?signup=usertaken');
                    exit();
                }else{
                    if($pwd != $conf_pwd){
                        header('Location: ../signup.php?signup = confirmPassword');
                        exit();
                    }else{
                       // hashing password
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 
                        //Inserting the user into the datebase
                        $sql = "INSERT INTO user (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
                        mysqli_query($con,$sql);
                        header('Location: ../index.php?signup=success');
                        exit();
                        
                    }
                    
                    
                }
            }
        }
    }

}else{
//    header('Location: signup.php');

}


?>
