<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="uploadhospitalimgs.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="files[]">Upload other images :</label>
        <input type="file" name="hospitalimgs[]" accept="image/jpg,image/jpeg,image/png" multiple>
    </div>
    <input type="submit" name="upload">
    </form>
    <?php
        require_once "configure.php";
        $sql = "select hospitalpics from hospitalimgs";
        $stmt = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($stmt)){
            echo '<img width="200px" alt="image not found" src="data:image;base64,'.base64_encode($row['hospitalpics']).'" >';
        }
    ?>
</body>
</html>