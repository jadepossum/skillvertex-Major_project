<?php
    require_once "configure.php";
    if(isset($_POST['upload'])){
        if(isset($_FILES['hospitalimgs'])){
            print_r($_FILES);
            echo "<br><br><br>";
            foreach($_FILES['hospitalimgs']['tmp_name'] as $val){
                $file = addslashes(file_get_contents($val));
                $sql = "insert into hospitalimgs(hospitalid,hospitalpics) values('2','$file')";
                mysqli_query($conn,$sql);
                echo $file."<br>";
            }
        }
    }
?>