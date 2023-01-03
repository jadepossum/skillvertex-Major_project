<?php
session_start();
    require_once "configure.php";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // echo $_POST['hospitalname']."<br>";
        // echo $_POST['hospitaldescription']."<br>";
        // echo $_POST['hospitaladdress'];
        // echo $_SERVER['PHP_SELF'];
        if($_POST['hello']){
            echo $_POST['hello'];
        }
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
        <div class="container-two">
        <div class="hospital-services-container">
                <div class="photo inner-service-container unhide">
                    <?php
                        $sql = "select hospitalpics from hospitalimgs";
                        $stmt = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($stmt)){
                            echo '<img class="hospitalpics" width="200px" alt="image not found" src="data:image;base64,'.base64_encode($row['hospitalpics']).'" >';
                        }
                    ?>
                </div>
                <div class="price inner-service-container"></div>
                <div class="quote inner-service-container">
                    <div class="quote-card-container">
                        <!-- <div class="quote-card">
                            <input type="checkbox">
                            <div class="service-name">service 1</div>
                            <div class="service-price">500</div>
                        </div>
                        <div class="quote-card">
                            <input type="checkbox">
                            <div class="service-name">service 2</div>
                            <div class="service-price">400</div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="hospital-card-container">
                <?php
                    $sql = "select * from hospitals";
                    $stmt = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($stmt)){
                        echo '<div class="hospitalcard">
                                <img alt="image not found" width="300px" src="data:image;base64,'.base64_encode($row['image']).'" alt="">
                                <button class="hospital-services-btn">show services</button>
                                <div class="hdetails">
                                    <p class="hname">'.$row['name'].'</p>
                                    <p class="haddress">'.$row['Address'].'</p>
                                    <p class="hdescription">'.$row['description'].'</p>
                                </div>
                                <p class="hid">'.$row['id'].'</p>
                            </div>';
                        // echo $row['id']."<br>";
                        // echo $row['name']."<br>";
                        // echo $row['description']."<br>";
                        // echo $row['Address']."<br>";
                        //  echo   '<img width="300px" src="data:image;base64,'.base64_encode($row['image']).'" alt="">';
                    }
                ?>  
            </div>
            <div class="hospital-form-container hide">
                <div class="hospital-form">
                    <button onclick="closehospitalform()" class="closeHform">close</button>
                    <form action="uploadhospitalimgs.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="hospitalname">Hospital Name :</label>
                            <input type="text" name="hospitalname"  required>
                        </div>
                        <div>
                            <label for="hospitaldescription">About Hospital :</label>
                            <!-- <input type="textbox" name="hospitaldescription"> -->
                            <textarea name="hospitaldescription" id="" cols="30" rows="4"  required></textarea>
                        </div>
                        <div>
                            <label for="hospitaladdress">Address :</label>
                            <input type="text" name="hospitaladdress"  required>
                        </div>
                        <div>
                            <label for="hospitalimage">Choose an image :</label>
                            <input type="file" name="hospitalimage" accept="image/jpg,image/jpeg,image/png"  required>
                        </div>
                        <input type="submit" name="upload" id="">
                    </form>
                </div>
            </div>
            <div class="btn-container">
                <button onclick="newhospital()" class="addhospital">Add</button>
                <ul class="inner-btns">
                    <li class="photo btn-selected">Photo Gallery</li>
                    <li class="price">Pricelist</li>
                    <li class="quote">Instant Quote</li>
                </ul>
                <button onclick="prevpage()" class="backtohome">Back</button>
            </div>
        </div>
    </div>
    <div class="reports outercontainer">
        <div class="container-one">
            <a onclick="test()" href="#">Reports & Assessments</a>
            <img src="./img/reports.png" width="400px" alt="not found">
        </div>
        
    </div>
    <script src="./healthcarefirm.js"></script>
</body>
</html>