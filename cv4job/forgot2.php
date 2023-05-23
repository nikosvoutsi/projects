<?php
include('templates/header2.php');
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
           padding-top: 50px;
          -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
          box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
          text-align: center;
          width:800px;
          height:600px;
          margin-left: 50px;
          margin-top:100px;
          margin-bottom:50px;
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
        if(isset($_GET['q'])){
            $email=$_GET['q'];
        };
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors=[];
            if(!$password1=filter_input(INPUT_POST,'password1', FILTER_SANITIZE_STRING)){
                $errors[]='Please insert password!!!';
            }
            $password2=filter_input(INPUT_POST,'password2', FILTER_SANITIZE_STRING);
            if($password1!=$password2){
                $errors[]='The confirmed password must be the same!!!';
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
                    
                $query = "UPDATE users SET  password=? WHERE email=?";
                $stmt = my_mysqli_prepare($dbc, $query);
                my_mysqli_stmt_bind_param($stmt, 'ss', $password1, $email);
                my_mysqli_stmt_execute($stmt);
                if (my_mysqli_stmt_affected_rows($stmt) == 1) {
                    if($password1==$password1){
                    print "<br><br><p style='color:green; font-size:xx-large'>The password changed successfully!!!</p>\n";
                    print"<p>Press <a href='index.php'>here</a> to sign in to your account</p>";
                    exit();
                    }else{
                    print "<br><br><p style='color:red; font-size:xx-large'>The new password must NOT be the same!!!</p>\n";
                    print"<form action='' method='post' enctype='multipart/form-data'>
                    <p><input type='password' name='password1' id='password' maxsize='100' placeholder='Password' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br></p>
                    <p><input type='password' name='password2' id='password' maxsize='100' placeholder='Confirm Password' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br><br></p>
                    <p><input type='submit' name='submit' value='Submit' style='font-size:18px; height: 70px; width:160px; text-align:center;'></p>
                    </form>
                    </div>
                    </div><br><br><br>";
                    
                }
                } else {
                    print "<br><br><p style='color:red; font-size:xx-large'>The new password must NOT be the same!!!</p>\n";
                    print"<form action='' method='post' enctype='multipart/form-data'>
                    <p><input type='password' name='password1' id='password' maxsize='100' placeholder='Password' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br></p>
                    <p><input type='password' name='password2' id='password' maxsize='100' placeholder='Confirm Password' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br><br></p>
                    <p><input type='submit' name='submit' value='Submit' style='font-size:18px; height: 70px; width:160px; text-align:center;'></p>
                    </form>
                    </div>
                    </div><br><br>";
                }
                mysqli_stmt_close($stmt);
                }
                }
                
            
    
            ?>
<h3>Please enter a new password</h3><br>
<form action="" method="post" enctype="multipart/form-data">
<p><input type="password" name="password1" id="password" maxsize="100" placeholder="Password" style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br></p>
<p><input type="password" name="password2" id="password" maxsize="100" placeholder="Confirm Password" style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br><br></p>
<p><input type="submit" name="submit" value="Submit" style="font-size:18px; height: 70px; width:160px; text-align:center;"></p>
</form>
</div>
</div><br><br>


<?php
include('templates/footer.php');
?>
</body>
</html>