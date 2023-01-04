<?php
        session_start();
        require_once "configure.php";
        $hid = $_REQUEST['q'];
        $_SESSION['hid'] = $hid;
        $sql = "select hospitalpics from hospitalimgs where hospitalid = $hid";
        $stmt = mysqli_query($conn,$sql);
        echo  '<div class="photo-form">
                    <form action="uploadhospitalimgs.php" method="post" enctype="multipart/form-data">
                        <input class="picfile" type="file" name="hospitalimgs[]" accept="image/jpg,image/jpeg,image/png" multiple required>
                        <input class="picupload" type="submit" name="upload" value="upload">
                    </form>
                </div>';
        while($row = mysqli_fetch_assoc($stmt)){
            echo '<img class="hospitalpics" width="200px" alt="image not found" src="data:image;base64,'.base64_encode($row['hospitalpics']).'" >';
        }
    ?>