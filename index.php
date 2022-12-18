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
            <div class="hospital-card-container">
                <div class="hospitalcard">hospital1</div>
            </div>
            <div class="hospital-form-container hide">
                <div class="blur"></div>
                <div class="hospital-form">
                    <button onclick="closehospitalform()" class="closeHform">close</button>
                    <form action="" method="post">
                        <div>
                            <label for="hospitalname">Hospital Name :</label>
                            <input type="text" name="hospitalname">
                        </div>
                        <div>
                            <label for="hospitaldescription">About Hospital :</label>
                            <input type="textbox" name="hospitaldescription">
                        </div>
                        <div>
                            <label for="hospitaladdress">Address :</label>
                            <input type="text" name="hospitaladdress">
                        </div>
                        <div>
                            <label for="Hospital image">Choose an image :</label>
                            <input type="file" name="hospitalimage">
                        </div>
                        <input type="submit" name="upload" id="">
                    </form>
                </div>
            </div>
            <button onclick="newhospital()" class="addhospital">Add</button>
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
    <script src="./healthcarefirm.js"></script>
</body>
</html>