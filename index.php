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
                <div class="photo-container inner-service-container unhide">
                    <?php
                        $sql = "select hospitalpics from hospitalimgs";
                        $stmt = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($stmt)){
                            echo '<img class="hospitalpics" width="200px" alt="image not found" src="data:image;base64,'.base64_encode($row['hospitalpics']).'" >';
                        }
                    ?>
                </div>
                <div class="price-container inner-service-container unhide"></div>
                <div class="quote-container inner-service-container"></div>
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
                <div class="blur"></div>
                <div class="hospital-form">
                    <button onclick="closehospitalform()" class="closeHform">close</button>
                    <form action="uploadhospitalimgs.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="hospitalname">Hospital Name :</label>
                            <input type="text" name="hospitalname" >
                        </div>
                        <div>
                            <label for="hospitaldescription">About Hospital :</label>
                            <!-- <input type="textbox" name="hospitaldescription"> -->
                            <textarea name="hospitaldescription" id="" cols="30" rows="4" ></textarea>
                        </div>
                        <div>
                            <label for="hospitaladdress">Address :</label>
                            <input type="text" name="hospitaladdress" >
                        </div>
                        <div>
                            <label for="hospitalimage">Choose an image :</label>
                            <input type="file" name="hospitalimage" accept="image/jpg,image/jpeg,image/png" >
                        </div>
                        <div>
                            <label for="files[]">Upload other images :</label>
                            <input type="file" name="hospitalimgs[]" accept="image/jpg,image/jpeg,image/png" multiple>
                        </div>
                        <div>
                            <label for="pricelist">Upload the price list (pdf) :</label>
                            <input type="file" name="pricelist" accept="application/pdf">
                        </div>
                        <input type="submit" name="upload" id="">
                    </form>
                </div>
            </div>
            <div class="btn-container">
                <button onclick="newhospital()" class="addhospital">Add</button>
                <ul class="inner-btns">
                    <li class="photo btn-selected"><span>Photo Gallery</span></li>
                    <li class="price"><span>Price List</span></li>
                    <li class="quote"><span>Instant Quote</span></li>
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