<?php
    require_once "configure.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo $_POST['hospitalname']."<br>";
        echo $_POST['hospitaldescription']."<br>";
        echo $_POST['hospitaladdress'];
        echo $_SERVER['PHP_SELF'];
        $sql = "select * from hospitals";
        $stmt = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($stmt)){
            echo $row['id']."<br>";
            echo $row['name']."<br>";
            echo $row['description']."<br>";
            echo $row['Address']."<br>";
             echo   '<img width="300px" src="data:image;base64,'.base64_encode($row['image']).'" alt="">';
        }
        
    }
    else{
    echo "notfound";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        location.href="index.php";
    </script>
</body>
</html>
