<?php
include('templates/header2.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #0077B6;
            background-size: 100%;
            margin-left:0;
        }
        p{
            font-size:70px; 
            color:#0080FF;
            text-align:center;
            padding-left:40px;
            padding-right:70px;
            padding-top:0px;
            margin-top:0;
        }
        div#form{
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 10px 10px 10px 10px;
            background: #fff;
            padding: 10px; 
            position: relative;
           padding-top: 50px;
          -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
          box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
          text-align: center;
          width:800px;
          height:530px;
          margin-left: 50px;
          margin-top:100px;
          margin-bottom:130px;
          font-size:150%; 
        }
        div#form p{
            font-size:25px;
        }
        .fadeInDown {
    -webkit-animation-name: fadeInDown;
    animation-name: fadeInDown;
    -webkit-animation-duration: 2s;
    animation-duration: 2s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
  }
  #span1{
    padding-right:300px;
  }
    </style>
</head>
<body>

<div class="wrapper fadeInDown">
  


    <div id="form"><br><br><br>
<h3>You' ve just signed out!!!</h3><br>
<p style="color:black">If you want to sign in again, press <a href="index.php">here</a></p>
<br>

</div>
</div>


<?php
include('templates/footer.php');
?>
</body>
</html>