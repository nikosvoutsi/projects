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
          height:820px;
          margin-left: 50px;
          font-size:150%; 
        }
        div#form p{
            font-size:25px;
            color:black;
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
  

    <?php
    print "<p>Create your professional CV in just a few minutes</p>\n";
    ?>
    <div id="form">
        <?php 
        if(isset($_GET['q'])){
            $email=$_GET['q'];
        };
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors=[];
            $interest1=filter_input(INPUT_POST,'interest1');
            $interest2=filter_input(INPUT_POST,'interest2');
            $interest3=filter_input(INPUT_POST,'interest3');
            if(!($interest1=filter_input(INPUT_POST,'interest1', FILTER_SANITIZE_STRING))&&!($interest2=filter_input(INPUT_POST,'interest2', FILTER_SANITIZE_STRING))&&!($interest3=filter_input(INPUT_POST,'interest3', FILTER_SANITIZE_STRING))){
                print"<p style='color:red'>Please insert at least one interest!!!</p>";
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
                    $query="select max(idpeople) from people";
                    $stmt=mysqli_prepare($dbc, $query);
                    $r=mysqli_execute($stmt);
                    if($r){
                    mysqli_stmt_store_result($stmt);
                    mysqli_stmt_bind_result($stmt, $id);
                    if (my_mysqli_stmt_num_rows($stmt) == 1) {
                    while(mysqli_stmt_fetch($stmt)){
                        $mistakes=0;
                    if($interest1=filter_input(INPUT_POST,'interest1', FILTER_SANITIZE_STRING)){ 
                    
                    //print"$id";
                    $query1='insert into interests (idpeople, interest)
                    values (?,?)';
                    $stmt1=mysqli_prepare($dbc, $query1);
                    mysqli_stmt_bind_param($stmt1, 'is', $id, $interest1);
                    mysqli_stmt_execute($stmt1);
                    if (mysqli_stmt_affected_rows($stmt1)!=1){
                       print"<p style='color:red; font-size:x-large'>Σφάλμα συστήματος</p>\n";
                       $mistakes++;
                    }
                    }
                    if($interest2=filter_input(INPUT_POST,'interest2', FILTER_SANITIZE_STRING)){ 
                    
                        //print"$id";
                        $query2='insert into interests (idpeople, interest)
                        values (?,?)';
                        $stmt2=mysqli_prepare($dbc, $query2);
                        mysqli_stmt_bind_param($stmt2, 'is', $id, $interest2);
                        mysqli_stmt_execute($stmt2);
                        if (mysqli_stmt_affected_rows($stmt2)!=1){
                           print"<p style='color:red; font-size:x-large'>Σφάλμα συστήματος</p>\n";
                           $mistakes++;
                        }
                        }
                        if($interest3=filter_input(INPUT_POST,'interest3', FILTER_SANITIZE_STRING)){ 
                    
                            //print"$id";
                            $query3='insert into interests (idpeople, interest)
                            values (?,?)';
                            $stmt3=mysqli_prepare($dbc, $query3);
                            mysqli_stmt_bind_param($stmt3, 'is', $id, $interest3);
                            mysqli_stmt_execute($stmt3);
                            if (mysqli_stmt_affected_rows($stmt3)!=1){
                               print"<p style='color:red; font-size:x-large'>Σφάλμα συστήματος</p>\n";
                               $mistakes++;
                            }
                            if($mistakes==0){
                                print "<p style='color:green; font-size:x-large'>Successful import</p>\n";
                                print'<p><span> <a  href="languages.php"><input type="button" name="button1" value="Previous step" style="background-color:4682B4;font-size: 18pt; height: 80px; width:180px; text-align:center;"></a> </span> <span> <a  href="summary.php"><input type="button" name="button2" value="Next step" style="background-color:4682B4;font-size: 18pt; height: 80px; width:180px; text-align:center;"></a> </span> ';
                                exit();
                            }
                        }
                }
                }}
            }}
            print"<h3>Please add up to 3 interests</h3><br>
<form action='' method='post' enctype='multipart/form-data'>
<p><input type='text' name='interest1' maxsize='100' placeholder='Interest 1' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br></p>
<p><input type='text' name='interest2' maxsize='100' placeholder='Interest 2' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br></p>
<p><input type='text' name='interest3' maxsize='100' placeholder='Interest 3' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br><br></p>
<p><input type='submit' name='submit' value='Submit' style='font-size:18px; height: 70px; width:160px; text-align:center;'></p><br><br><br>
<p style='text-align:left'><span id='span1'> <a  href='languages.php?q=$email'><input type='button' name='button1' value='Previous step' style='background-color:4682B4;font-size: 18pt; height: 80px; width:180px; text-align:center;'></a> </span> <span> <a  href='summary.php?q=$email'><input type='button' name='button2' value='Next step' style='background-color:4682B4;font-size: 18pt; height: 80px; width:180px; text-align:center;'></a> </span> 
</form>
</div>
</div><br>";
            ?>



<?php
include('templates/footer.php');
?>
</body>
</html>