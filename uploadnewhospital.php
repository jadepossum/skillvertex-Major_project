<?php
    require_once "configure.php";
    if(isset($_POST['upload'])){
            // echo "<pre>";
            // print_r($_FILES['hospitalimage']);
            // echo "</pre>";

            $file = addslashes(file_get_contents($_FILES['hospitalimage']['tmp_name']));
        $hname = $_POST['hospitalname'];
        $hdesc = $_POST['hospitaldescription'];
        $hadd = $_POST['hospitaladdress'];
        // echo $hname;
        // echo $hdesc;
        $sql = "insert into hospitals(name,description,Address,image) values('$hname','$hdesc','$hadd','$file')";
        mysqli_query($conn,$sql);
        // mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>healthcare firm</title>
    <link rel="stylesheet" href="healthcarefirm.css">
</head>
<body>
    <div class="hospitals outercontainer">
        <div class="container-one">
            <a onclick="test()" href="#">Our Hospitals</a>
        <img src="./img/hospital.png" alt="image not found">
        </div>
    </div>
    <div class="reports outercontainer">
        <div class="container-one">
            <a onclick="test()" href="#">Reports & Assessments</a>
            <img src="./img/reports.png" width="400px" alt="not found">
        </div>
        <div class="container-two">
            <div class="hospitalcard">hospital1</div>
        </div>
    </div>
    <script >
        location.href = "index.php";
    </script>
</body>
</html>
