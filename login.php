<?php
session_start();
if(isset($_SESSION['username'])){
  header("location: index.php");
  exit;
}
echo "sdfsdkf";
require_once "configure.php";
  $username=$password=$err="";
  if($_SERVER['REQUEST_METHOD'] ==  "POST"){
    echo "insere";
    if(empty(trim($_POST['username']))||empty(trim($_POST['password']))){
      $err="check your username or password";
    }
    if(empty($err)){
      $username=trim($_POST['username']);
      $password=trim($_POST['password']);
      echo "insere2323";
      //preparing sql query
      $sql="SELECT id,username,password from users WHERE username = ?";
      $stmt=mysqli_prepare($conn,$sql);
      if($stmt){
        echo "stmtttttt";

        //binding parameters
        mysqli_stmt_bind_param($stmt,"s",$param_user);
        $param_user=$username;
        //executing query
        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) == 1){
            //binding result
            mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password);
            if(mysqli_stmt_fetch($stmt)){
              if(password_verify($password,$hashed_password)){
                session_start();
                $_SERVER['username']=$username;
                $_SERVER['id']=$id;
                $_SERVER['loggedin']=true;
                $_SESSION['username'] = $username;
                header("location: index.php");
                echo "dsfsdf";
              }
            }
            
          }
        }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
  }

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <title>Hello, world!</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            background-color:lightcoral;
            width:100vw;
            height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }
    </style>
  </head>
  <body>
    <div class="form1">
        <form action="?" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Uername</label>
                <input type="test" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <input type="submit" value="submit">
        </form>
    </div>
    <!-- <div class="form2">
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Uername</label>
                <input type="test" name="username" class="form-control" id="inputemail" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="inputpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> -->
    
  </body>
</html>