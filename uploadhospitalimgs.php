<?php
    session_start();
    require_once "configure.php";
    if(isset($_POST['upload'])){
        if(isset($_FILES['hospitalimgs'])){
            print_r($_FILES);
            echo "<br><br><br>";
            foreach($_FILES['hospitalimgs']['tmp_name'] as $val){
                $file = addslashes(file_get_contents($val));
                $hid = $_SESSION['hid'];
                echo $hid;
                echo "sdkfsdf";
                $sql = "insert into hospitalimgs(hospitalid,hospitalpics) values('$hid','$file')";
                mysqli_query($conn,$sql);
            }
            header("location: index.php");
        }
    }
?>
