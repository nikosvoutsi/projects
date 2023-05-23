<?php
include('templates/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV4Job App</title>
    <style>
        body{
            background-color: #0077B6;
            background-size: 100%;
            margin-left:0;
        }
        p{
            font-size:70px; 
            color:rgb(236, 224, 201);
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
          height:810px;
          margin-left: 50px;
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
  #img1{
    width:220px;
    height:280px;
    
  }
  #img1:hover{
    transform: scale(2);
  }
  #img2{
    width:250px;
    height:280px;
    
  }
  #img2:hover{
    transform: scale(2);
  }
  
span{
    padding:40px;
}
    </style>
</head>
<body>

<div class="wrapper fadeInDown">
  

    <?php
    if(isset($_GET['q'])){
      $email=$_GET['q'];
  };
    print "<p>Create your professional CV in just a few minutes</p>\n 
    <div id='form'>    
    <h3>Choose your CV style</h3><br>
    <form action='' method='post' enctype='multipart/form-data'>
    <p><span><a class='zoom' href='cv.php'><img id='img2' src='images/cv1.png'></a></span> <span><a href='cv2.php'><img id='img1' src='images/cv2.png'></a></span></p>
    </form><br><br><br><br><br>
    <p style='text-align:left'><span> <a  href='summary.php?q=$email' target='_blank'><input type='button' name='button1' value='Previous step' style='background-color:4682B4;font-size: 18pt; height: 80px; width:180px; text-align:center;' target='_blank' ></a> </span>
    </div>
    </div><br>";
    ?>
    


<?php
include('templates/footer.php');
?>
</body>
</html>