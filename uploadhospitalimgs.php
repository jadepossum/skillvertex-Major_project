<?php
    require_once "configure.php";
    if(isset($_POST['upload'])){
        if(isset($_FILES['hospitalimgs'])){
            print_r($_FILES);
            echo "<br><br><br>";
            foreach($_FILES['hospitalimgs']['tmp_name'] as $val){
                $file = addslashes(file_get_contents($val));
                echo "sdkfsdf";
                $sql = "insert into hospitalimgs(hospitalid,hospitalpics) values('3','$file')";
                mysqli_query($conn,$sql);

            }
            header("location: index.php");
        }
    }
    // header("location: index.php");
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
        <form action="?" method="post" enctype="multipart/form-data">
                <label for="exampleInputEmail1">choose images :</label>
                <input type="file" name="hospitalimgs[]" accept="image/jpg,image/jpeg,image/png" multiple>
            <input type="submit" name="upload" value="upload">
        </form>
    </div>
  </body>
</html>