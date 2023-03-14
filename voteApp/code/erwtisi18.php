<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoteApp</title>
    <link rel="stylesheet" href="style.css">
    <style>
        div#epilogi{
    width:220px;
    height:60px;
    text-align: center;
    margin-left:43%;
    border-radius: 10%;
    background-color: rgb(219, 219, 214);
    cursor: pointer;
    opacity: 1;
    position:relative;
    transition: 0.8s; 
}
@media screen and (max-width:1520px){
    div#epilogi{
        margin-left:42%; 
    }
}
@media screen and (max-width:1350px){
    div#epilogi{
        margin-left:40%; 
    }
}
@media screen and (max-width:1200px){
    div#epilogi{
        margin-left:39%; 
    }
}
@media screen and (max-width:1080px){
    div#epilogi{
        margin-left:37%; 
    }
}
@media screen and (max-width:900px){
    div#epilogi{
        margin-left:35%; 
    }
}
@media screen and (max-width:800px){
    div#epilogi{
        margin-left:30%; 
    }
}
@media screen and (max-width:700px){
    div#epilogi{
        margin-left:27%; 
    }
}
@media screen and (max-width:600px){
    div#epilogi{
        margin-left:23%; 
    }
}
@media screen and (max-width:520px){
    div#epilogi{
        margin-left:18%; 
        width:180px;
        height:50px;
        
    }
    p#ep{
        font-size:18px;
    }
}
@media screen and (max-width:480px){
    div#container{
        margin-left:50px;
       margin-right:50px;
    }
    div#epilogi{
        margin-left:30%; 
        width:160px;
        height:50px;
        
    }
    p#ep{
        font-size:17px;
    }
    p#ep2{
        font-size:18px;
    }
}
@media screen and (max-width:460px){
    div#epilogi{
        margin-left:25%; 
    }
}
@media screen and (max-width:410px){
    div#epilogi{
        margin-left:20%; 
    }
}
@media screen and (max-width:350px){
    div#epilogi{
        width:135px;
        height:45px;
    }
    p#ep{
        font-size:14px;
    }
    p#ep2{
        font-size:16px;
    }
}
@media screen and (max-width:350px){
    div#epilogi{
        margin-left:14%; 
    }
}
    </style>
</head>
<body>
<?php
include('functions/helper_functions.php');
?>
    <?php

    if(isset($_GET['q'])){
        $answer=$_GET['q'];
    };
    //print"$answer";
    $question=17;

    $db_host='localhost';
    $db_user='root';
    $db_password='';
    $d_database='voteapp';

    if($dbc= @mysqli_connect($db_host, $db_user, $db_password, $d_database)){
        //print"<p style='color:green;'>Έχετε συνδεθεί επιτυχώς με τη ΒΔ</p>\n";
    }else{
        print"<p style='color:red;'>Σφάλμα σύνδεσης με τη ΒΔ</p>\n";
    }
    $query0='select max(id) from users';
    $stmt0=mysqli_prepare($dbc, $query0);
    $r0=mysqli_execute($stmt0);
    if($r0){
        mysqli_stmt_store_result($stmt0);
        mysqli_stmt_bind_result($stmt0, $id);
        if (my_mysqli_stmt_num_rows($stmt0) == 1) {
             while(mysqli_stmt_fetch($stmt0)){
                $query='insert into apanthseis(idkomma, iderwtisi,idepilogh) 
                values (?,?,?)';
                $stmt=mysqli_prepare($dbc, $query);
                mysqli_stmt_bind_param($stmt, 'iii', $id, $question, $answer);
                mysqli_stmt_execute($stmt);
                if (mysqli_stmt_affected_rows($stmt)!=1){
                   print"<p style='color:red; font-size:x-large'>Σφάλμα συστήματος</p>\n";
                }else{
                    $query0="select erwtisi from erwtiseis where id=18";
                    $stmt0=mysqli_prepare($dbc, $query0);
                    $r0=mysqli_execute($stmt0);
                    if($r0){
                        mysqli_stmt_store_result($stmt0);
                        mysqli_stmt_bind_result($stmt0, $erwtisi);
                        if (my_mysqli_stmt_num_rows($stmt0) == 1) {
                           while(mysqli_stmt_fetch($stmt0)){
                                print"<p><a href='index.html'><img id='home' src='images/home.png'></a></p>
                                <div id='container'>
                                <div id='header'><h2 style='color:red'>Eρώτηση 18η</h2></div>
                               <h2>$erwtisi</h2>
                               <a  href='erwtisi19.php?q=1' style='color:green;'><div id='epilogi'><p id='ep2'>Συμφωνω</p></div></a>
                               <a  href='erwtisi19.php?q=2' style='color:rgb(66, 61, 61);'><div id='epilogi'><p id='ep'>Ουτε συμφωνω ουτε διαφωνω</p></div></a>
                               <a  href='erwtisi19.php?q=3' style='color:red;'><div id='epilogi'><p id='ep2'>Διαφωνω</p></div></a><br>
                               </div>
                               <span><p style=color:white;font-size:15px;text-align:left;top:95vh;position:fixed;>©NikosVoutsi</span><span style='padding-left:90vw;'>Ekloges2023</p></span>";
                           }
                        }
               }    }
            }
             
    
    
        
             }
        }


    ?>

</body>
</html>