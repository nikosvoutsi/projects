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
          height:1300px;
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
    </style>
</head>
<body>
<div class="wrapper fadeInDown">
  

    <?php
    if(isset($_GET['q'])){
        $email=$_GET['q'];
    };
    print "<p id='p01'>Create your professional CV in just a few minutes</p>\n";
    print"<div id='form'>
    <h3>Please complete the form below</h3><br>
    <form action='work.php?q=$email' method='post'>
    <p style='color:blue'><input type='text' name='firstname' maxsize='100' placeholder='Name' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br></p>
    <p><input type='text' name='lastname' maxsize='100' placeholder='Surname' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
    <p><input type='text' name='phone' placeholder='Phone' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
    <p><input type='email' name='email' placeholder='$email' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)' readonly><br>
    <p><input type='tex' name='address' placeholder='Address' maxsize='100' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'><br>
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
    <p><input type='submit' name='submit' value='Next step' style='font-size:18px; width:180px; height:70px;'></p>
    </form>
    </div>
    </div>";
    ?>


<?php
include('templates/footer.php');
?>
</body>
</html>