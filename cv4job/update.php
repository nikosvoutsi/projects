<?php
include('templates/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body{
            background-color: rgb(141, 243, 209);
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
          height:580px;
          margin-left: 20px;
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
    </style>
</head>
<body>
<div class="wrapper fadeInDown">
  

    <?php
     $db_host='localhost';
     $db_user='root';
     $db_password='';
     $d_database='cvmakerapp';
     $dbc= @mysqli_connect($db_host, $db_user, $db_password, $d_database);
    print "<p>Welcome to CV4Job App</p>\n";
    if(isset($_GET['q'])){
        $email=$_GET['q'];
    }else{
        $email='nickvoutsinas@yahoo.gr';
    };
    $query="select count(idpeople) from people where email='$email'";
    $stmt=mysqli_prepare($dbc, $query);
    $r=mysqli_execute($stmt);
    if($r){
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $cnt);
        if (my_mysqli_stmt_num_rows($stmt) == 1) {
             while(mysqli_stmt_fetch($stmt)){
                if($cnt==0){
                  print"<div id='form'><br><br><h3>You haven't created a CV yet.</h3><br><h3>To create your CV press <a href='create.php?q=$email'>here </a></h3><br></form><br><br><br><br><br>";
                  exit();
                }
                print"<div id='form'><br><br>
        
<h3>Choose your CV style</h3><br>
<form action='' method='post' enctype='multipart/form-data'>
<p><span><a class='zoom' href='cv3.php?q=$email'><img id='img2' src='images/cv1.png'></a></span> <span><a href='cv4.php?q=$email'><img id='img1' src='images/cv2.png'></a></span></p>
</form><br><br><br><br><br>";}}}
    //print"$email";
    
print"
";
?>
<br><div id='form'>
<h3>Please choose one of the following actions</h3><br><br>
    <a  href='create.php?q=$email'><input type='button' name='button' value='Create your CV' style='background-color:rgb(62, 153, 121); color:white;font-size: 17pt; height: 80px; width:480px; text-align:center;'></a><br><br><br>
    <a  href='update.php?q=$email'><input type='button' name='button' value='Update your CV' style='background-color:rgb(62, 153, 121); color:white; font-size: 17pt; height: 80px; width:480px; text-align:center;''></a><br><br><br><br>
</div>
</div><br><br>
<?php
include('templates/footer.php');
?>
</body>
</html>