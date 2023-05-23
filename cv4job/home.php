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
    
    if(isset($_GET['q'])){
        $email=$_GET['q'];
    };
    $db_host='localhost';
    $db_user='root';
    $db_password='';
    $d_database='cvmakerapp';
    
    if($dbc= @mysqli_connect($db_host, $db_user, $db_password, $d_database)){
        //print"<p style='color:green;'>Έχετε συνδεθεί επιτυχώς με τη ΒΔ</p>\n";
    }else{
        print"<p style='color:red;'>Σφάλμα σύνδεσης με τη ΒΔ</p>\n";
    }
    $query="select fname from people where idpeople=(select max(idpeople) from people where email='$email')";
    $stmt=mysqli_prepare($dbc, $query);
    $r=mysqli_execute($stmt);
    if($r){
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $fname);
        if (my_mysqli_stmt_num_rows($stmt) == 1) {
             while(mysqli_stmt_fetch($stmt)){
                print "<p>Welcome to CV4Job App $fname</p>\n";
             }}};
    //print"$email";
    
print"
<br><div id='form'>
<h3>Please choose one of the following actions</h3><br><br>
    <a  href='create.php?q=$email'><input type='button' name='button' value='Create a new CV' style='background-color:#0077B6; color:white;font-size: 17pt; height: 80px; width:480px; text-align:center;'></a><br><br><br>
    <a  href='see.php?q=$email'><input type='button' name='button' value='See your CV' style='background-color:#0077B6; color:white; font-size: 17pt; height: 80px; width:480px; text-align:center;''></a><br><br><br>
    </div>
</div><br>";
?>
<?php
include('templates/footer.php');
?>
</body>
</html>