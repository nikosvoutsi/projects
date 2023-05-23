<?php
include('templates/header2.php');
if (is_loggedin()) {
    $_SESSION = [];
    setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0);
    session_destroy();
  }
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
          -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
          box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
          text-align: center;
          width:800px;
          height:580px;
          margin-left: 50px;
          margin-top:60px;
          margin-bottom:10px;
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
  


    <div id="form">
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors=[];
            if(!$email=filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL)){
                $errors[]='Please insert email!!!';
            }
            if(!empty($errors)){
                print_error_messages($errors);
            }else{
        
                $db_host='localhost';
                $db_user='root';
                $db_password='';
                $d_database='cvmakerapp';
        
                if($dbc= @mysqli_connect($db_host, $db_user, $db_password, $d_database)){
                    //print"<p style='color:green;'>Έχετε συνδεθεί επιτυχώς με τη ΒΔ</p>\n";
                }else{
                    print"<p style='color:red;'>Σφάλμα σύνδεσης με τη ΒΔ</p>\n";
                }
                    $query="select email, password from users where email='$email'";
                    $stmt=mysqli_prepare($dbc, $query);
                    $r=mysqli_execute($stmt);
                    if($r){
                    mysqli_stmt_store_result($stmt);
                    mysqli_stmt_bind_result($stmt, $uname, $key);
                    if (my_mysqli_stmt_num_rows($stmt) >= 1) {
                    while(mysqli_stmt_fetch($stmt)){
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);
                            header("Location: forgot2.php?q=$email");
                            exit();
                    
               
                }
            }else{print "<br><br><p style='color:red; font-size:large';>Νo user $email found!!!<br><br></p>\n";}}}}
    
            ?>
<h3>Please enter your email</h3><br>
<form action="" method="post" enctype="multipart/form-data">
<p><input type="email" name="email" maxsize="100" placeholder="Email" style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br><br></p>
<p><input type="submit" name="submit" value="Submit" style="font-size:18px; height: 70px; width:160px; text-align:center;"></p><br>
<p style="color:black">Are you a new user? <a href="signup.php" style="color:blue">Sign up</a> now</p><br>
</form>
</div>
</div><br><br><br><br>


<?php
include('templates/footer.php');
?>
</body>
</html>