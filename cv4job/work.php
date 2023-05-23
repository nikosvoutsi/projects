<?php
include('templates/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/concise.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CV4Job App</title>
    <style>
        body{
            background-color: #0077B6;
            background-size: 100%;
            margin-left:0;
        }
        #p01{
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
          max-height:1500px;
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
    if(isset($_GET['q'])){
        $email=$_GET['q'];
    };
    print "<p id='p01'>Create your professional CV in just a few minutes</p>\n";
    ?>
    <div id="form">
        <?php 
        if(isset($_GET['q'])){
            $email=$_GET['q'];
        };
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors=[];
            if(!$firstname=filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_STRING)){
                $errors[]='Please insert firstname';
            }
            if(!$lastname=filter_input(INPUT_POST,'lastname', FILTER_SANITIZE_STRING)){
                $errors[]='Please insert lastname';
            }
            if(!$job=filter_input(INPUT_POST,'job')){
                $errors[]='Please insert job';
            } 
            $phone=filter_input(INPUT_POST,'phone');
            //$email=filter_input(INPUT_POST,'email');
            $address=filter_input(INPUT_POST,'address');
            $tk=filter_input(INPUT_POST,'tk');
            $ln=filter_input(INPUT_POST,'ln');
            $status=filter_input(INPUT_POST,'status');
            $gender=filter_input(INPUT_POST,'gender');
            $license=filter_input(INPUT_POST,'license');
            $birthplace=filter_input(INPUT_POST,'birthplace'); 
            $birthdate=filter_input(INPUT_POST,'date');           
            if(!empty($errors)){
                print_error_messages($errors);
                print"<h3>Please complete the form below</h3><br>
                <form action='work.php?q=$email' method='post' enctype='multipart/form-data'>
                <p><input type='text' name='firstname' maxsize='100' placeholder='Name' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br></p>
                <p><input type='text' name='lastname' maxsize='100' placeholder='Surname' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
                <p><input type='text' name='phone' placeholder='Phone' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
                <p><input type='email' name='email' placeholder='$email' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
                <p><input type='text' name='address' placeholder='Address' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
                <p><input type='text' name='tk' placeholder='ZIP Code' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
                <p><input type='text' name='ln' placeholder='LinkedIn' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
                <p><input type='text' name='job' placeholder='Job' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
                <p style='color:blue'>Date of birth:<br>
                <input type='date' name='date' maxsize='100' oninput='this.form.submit();' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
                <p><input type='text' name='birthplace' placeholder='Place of birth' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
                <p style='color:blue'>Gender:<br>
                <select name='gender' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'>
                                <option value=1 >Male</option>
                                <option value=2 >Female</option>
                                <option value=3 >Intersex</option>
                                <option value=4 >Trans</option>
                                <option value=5 >Non-Conforming</option>
                                <option value=6 >Personal</option>
                                <option value=7 >Eunuch</option>
                </select>
                <p style='color:blue'>Marital Status:<br>
                <select name='status' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'>
                                <option value=1 >Single</option>
                                <option value=2 >Married</option>
                                <option value=3 >Divorced</option>
                                <option value=4 >Separated</option>
                                <option value=5 >Engaged</option>
                                <option value=6 >Complicated</option>
                </select>
                <p style='color:blue'>Driving License:<br>
                <select name='license' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'>
                    <option value=1 >A</option>
                    <option value=2 >A1</option>
                    <option value=3 >B</option>
                    <option value=4 >BE</option>
                    <option value=5 >C1</option>
                    <option value=6 >C1E</option>
                    <option value=7 >C</option>
                    <option value=8 >CE</option>
                    <option value=9 >D1</option>
                    <option value=10 >D1E</option>
                    <option value=11 >DE</option>
                    <option value=12 >No license</option>
                </select>
                
                
                <p style='color:blue'>Upload a photo:<br>
                <input type='hidden' name='MAX_FILE_SIZE' value='300000'>
                <p style='color:blue'><input type='file' name='the_file'></p>
                <p><input type='submit' name='submit' value='Next step' style='font-size:18px'></p>
                </form>";
                exit();
            }else{
    
                if (!empty($_FILES)) { // Το $_FILES μπορεί να είναι κενό λόγω μεγέθους. (Content-Length)
    
                $filename1="{$_FILES['the_file']['name']}";
    
                    $name = basename($_FILES['the_file']['name']);
    
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
    
                    $tmp_name = $_FILES["the_file"]["tmp_name"];
                    if($name!=""){
                    if ($ext == 'jpg'||$ext == 'png'||$ext == 'jpeg') {
                        
                        move_uploaded_file($tmp_name, "../uploads/$name");
    
                        }else {print "<p style='color: red;'>Το αρχείο πρέπει να είναι της μορφής *.jpg ή *.png\n";}
                    }else{$name="null";}
                }
                $db_host='localhost';
                $db_user='root';
                $db_password='';
                $d_database='cvmakerapp';
    
                if($dbc= @mysqli_connect($db_host, $db_user, $db_password, $d_database)){
                    //print"<p style='color:green;'>Έχετε συνδεθεί επιτυχώς με τη ΒΔ</p>\n";
                }else{
                    print"<p style='color:red;'>Σφάλμα σύνδεσης με τη ΒΔ</p>\n";
                }
                //print"$firstname, $lastname, $birthdate,  $email, $address, $job, $phone, $gender, $status, $license, $tk, $ln, $birthplace, $name";
                $query='insert into people (fname, lname, birthday, email, address, job, phone, gender, status, dlisence, tk, ln, birthplace, files)
                values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
                $stmt=mysqli_prepare($dbc, $query);
                mysqli_stmt_bind_param($stmt, 'sssssssiiiisss', $firstname, $lastname, $birthdate,  $email, $address, $job, $phone, $gender, $status, $license, $tk, $ln, $birthplace, $name);
                mysqli_stmt_execute($stmt);
                if (mysqli_stmt_affected_rows($stmt)!=1){
                   print"<p style='color:red; font-size:x-large'>Σφάλμα συστήματος</p>\n";
                }else{
                print "<p style='color:green; font-size:x-large'> Successful import</p>\n";
            }
            }


        }
        print"<h3>Please complete your work experience</h3><br>
        <form action='work2.php?q=$email' method='post' enctype='multipart/form-data'>
        <p><input type='text' name='work' maxsize='100' placeholder='Work' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br></p>
        <p><input type='text' name='company' maxsize='100' placeholder='Company' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
        <p style='color:blue'>From</p>
        <p><input type='date' name='date1' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
        <p style='color:blue'>To</p>
        <p><input type='date' name='date2' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br><br>
        <p><input type='submit' name='submit' value='Submit' style='font-size:18px; height: 60px; width:160px; text-align:center;'></p><br><br><br>
        <p style='text-align:left'><span id='span1'> <a  href='create.php?q=$email'><input type='button' name='button1' value='Previous step' style='background-color:4682B4;font-size: 18pt; height: 80px; width:180px; text-align:center;'></a> </span> <span> <a  href='education.php?q=$email'><input type='button' name='button2' value='Next step' style='background-color:4682B4;font-size: 18pt; height: 80px; width:180px; text-align:center;'></a> </span> 
        </form>
        </div>
        </div>"
        ?>



<?php
include('templates/footer.php');
?>
</body>
</html>