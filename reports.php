<?php
session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports and assignments</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            background-color: lightgoldenrodyellow;
        }
        .report-container{
            width: 100%;
            height: 100%;
            display: flex;
            padding: 2rem;
            flex-wrap: wrap;
            gap: 2rem;
            overflow: auto;
            align-items: center;
            justify-content: center;
        }
        .report-card{
            width: 250px;
            height: 350px;
            background-color: plum;
            color: purple;
            font-size: 2.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <div class="report-card">Report 1</div>
        <div class="report-card">Report 2</div>
        <div class="report-card">Report 3</div>
        <div class="report-card">Report 4</div>
        <div class="report-card">Report 5</div>
        <div class="report-card">Report 6</div>
        <div class="report-card">Report 7</div>
        <div class="report-card">Report 8</div>
        <div class="report-card">Report 9</div>
        <div class="report-card">Report 10</div>
    </div>
</body>
</html>