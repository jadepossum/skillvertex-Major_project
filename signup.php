<?php
    require_once "configure.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $password = $confirm_pasword = "";
        $username_err = $password_err = $confirm_pasword_err ="";
        //  check if username is empty
        if(empty(trim($_POST['username']))){
            $username_err='username cannot be black';
        }
        else{
            $sql = "SELECT id FROM users WHERE username = ?";
            $stmt = mysqli_prepare($conn,$sql);
            if($stmt){
                mysqli_stmt_bind_param($stmt,"s",$param_username);

                //set the value of param username
                $param_username = trim($_POST['username']);

                //try to execute this statement
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err="This username is already taken";
                    }
                    else{
                        $username = trim($_POST['username']);
                    }
                }
                else{
                    echo "something went wrong";
                }
            }
            mysqli_stmt_close($stmt);
        }

        //check for password
    if(empty(trim($_POST['password']))){
      $password_err="password cannot be blank";
    }
    elseif(strlen(trim($_POST['password']))<5){
      $password_err="password cannot be less than 5 charachters";
    }
    else{
      $password = trim($_POST['password']);
    }

  //check for confirm password field
    if(trim($_POST['password'])!=trim($_POST['confirm_password'])){
      $confirm_pasword_err = "passwords should match";
    }

  //if there were no errors , go ahead and insert date into the database
    if(empty($username_err)&&empty($password_err)&&empty($confirm_pasword_err)){
      $sql ="INSERT into users (username, password) values (?,?)";
      $stmt = mysqli_prepare($conn,$sql);
      if($stmt){
          mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_password);

          //set these parameters
          $param_username = $username;
          $param_password = password_hash($password,PASSWORD_DEFAULT);
      }

      //tru to executer the query
      if(mysqli_stmt_execute($stmt)){
          header("location: login.php");
      }
      else{
          echo "something went wrong";
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
        
    }

    
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>signup</title>
    <style>
        *{
            margin:0;
            padding:0;
            font-family: sans-serif;
            box-sizing:border-box;
        }
        body{
            background-color:lightcoral;
            width:100vw;
            height:100vh;
            display:flex;
            flex-direction:column;
            gap:2rem;
            align-items:center;
            justify-content:center;
        }
        h1{
          font-size:3rem;
          font-weight:600;
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
          justify-content:space-between;
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
    <h1>Sign-up page</h1>
  <div class="form1">
    <form action="" method="post">
      <div class="form-group">
        <label for="inputEmail4">Username :</label>
        <input type="email" name="username" class="form-control" id="username4" placeholder="Enter Username">
      </div>
      <div class="form-group">
        <label for="inputPassword4">Password :</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="enter password">
      </div>
      <div class="form-group">
        <label for="inputAddress">Confirm Password :</label>
        <input type="password" name="confirm_password" class="form-control" id="confirm_password4" placeholder="confirm password">
      </div>
      <div class="form-group">
        <input onclick="logpage()" type="button" value="registered user, login?">
        <input type="submit" value="signup">
      </div>
    </form>
  </div>
  <script>
    function logpage(){
      location.href="login.php";
    }
  </script>
</body>
</html>