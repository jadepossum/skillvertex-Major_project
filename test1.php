<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            width:100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <form action="uploadhospitalimgs.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="files[]">Upload other images :</label>
        <input id="hospitalimg" type="file" name="hospitalimgs[]" accept="image/jpg,image/jpeg,image/png" multiple>
    </div>
    <input type="submit" name="upload">
    </form>
    <script>
       const pic =  document.querySelector('#hospitalimg');
       console.log(pic);
    </script>
</body>
</html>