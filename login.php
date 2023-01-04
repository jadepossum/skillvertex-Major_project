<?php
session_start();
if(isset($_SESSION['username'])){
  header("location: index.php");
  exit;
}
require_once "configure.php";
  $username=$password=$err="";
  if($_SERVER['REQUEST_METHOD'] ==  "POST"){
    if(empty(trim($_POST['username']))||empty(trim($_POST['password']))){
      $err="check your username or password";
    }
    if(empty($err)){
      $username=trim($_POST['username']);
      $password=trim($_POST['password']);
      //preparing sql query
      $sql="SELECT id,username,password from users WHERE username = ?";
      $stmt=mysqli_prepare($conn,$sql);
      if($stmt){

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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
        *{
            margin:0;
            padding:0;
            font-family: sans-serif;
            box-sizing:border-box;
        }
        h1{
          font-size:3rem;
          font-weight:600;
        }
        body{
            background-color:lightcoral;
            width:100vw;
            height:100vh;
            display:flex;
            flex-direction:column;
            gap :2rem;
            align-items:center;
            justify-content:center;
        }
        .form1{
          padding:2rem;
          background-color:lightblue;
          font-weight:600;
          font-size :1.3rem;
        }
        .form1 form{
          display:flex;
          flex-direction:column;
          gap:.5rem;
        }
        .form1 input{
          padding: .5rem 1rem;
          border-radius:1.5rem;
          border : 3px solid black;
        }
        .form-group{
          display:flex;
          justify-content:center;
        }
        .form-group > input{
          margin-left:2rem;
        }
        .submit-grp{
          justify-content:flex-end;
        }
    </style>
  </head>
  <body>
  <h1>Login page</h1>
    <div class="form1">
        <form action="?" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Uername :</label>
                <input type="test" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password :</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group submit-grp" style="margin-top:.5rem;">
              <input onclick="regpage()" type="button" value="new user, sign up?">
              <input type="submit" value="Login">
            </div>
        </form>
    </div>
    <script>
      function regpage(){
        location.href= "signup.php";
      }
    </script>
  </body>
</html>