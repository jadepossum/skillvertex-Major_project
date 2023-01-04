<?php
    require_once "config.php";

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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">about</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">contact us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    <div class="container mt-4">
        <h1>please register here :</h1>
        <hr>
    <form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="email" name="username" class="form-control" id="username4" placeholder="Enter Username">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="enter password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Confirm Password</label>
    <input type="password" name="confirm_password" class="form-control" id="confirm_password4" placeholder="confirm password">
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>