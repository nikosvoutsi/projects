<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoteApp</title>
    <link rel="stylesheet" href="style.css">
    <style>
        html {
            background-color: url(images/background.jpg);
        }

        body {
            font-family: "Poppins", sans-serif;
            height: 100vh;
            overflow:hidden;
        }
    
        div#container{
           margin-top: 45px;
           margin-bottom:20px;
           padding-bottom:30px;
           margin-left:120px;
           margin-right:120px;
           height:97vh;
           background-color: rgb(230, 236, 129);
           opacity: 0.86;
           justify-content:center;
           align-items:center;
           position:relative;
           overflow:scroll;
           
        }      
        
    </style>
</head>
<body>
<?php
include('functions/helper_functions.php');
?>
    
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

if(isset($_GET['q'])){
 $id=$_GET['q'];
};



$idkomma=filter_input(INPUT_POST,'komma');
//print"$idkomma";

$db_host='localhost';
$db_user='root';
$db_password='';
$d_database='voteapp';

    if($dbc= @mysqli_connect($db_host, $db_user, $db_password, $d_database)){
        //print"<p style='color:green;'>Έχετε συνδεθεί επιτυχώς με τη ΒΔ</p>\n";
    }else{
        print"<p style='color:red;'>Σφάλμα σύνδεσης με τη ΒΔ</p>\n";
    }
    
    print"<p><a href='index.html'><img id='home' src='images/home.png'></a></p>";
    $query0="select e.id, e.erwtisi, ep.epilogh, k.komma from erwtiseis e inner join apanthseis a on e.id=a.iderwtisi inner join epiloges ep on ep.id=a.idepilogh
    inner join kommata k on a.idkomma=k.id
    where a.idkomma = $idkomma order by e.id";
    $stmt0=mysqli_prepare($dbc, $query0);
    $r0=mysqli_execute($stmt0);
    if($r0){
        mysqli_stmt_store_result($stmt0);
        mysqli_stmt_bind_result($stmt0, $iderwtisi, $erwtisi, $epilogh, $komma);
        print"<div id='container' style='margin-bottom:20vh; margin-top: 0px;'>";
        while(mysqli_stmt_fetch($stmt0)){
            print"<div id='question'><h2 style='color:red'>EΡΩΤΗΣΗ $iderwtisi</h2>
            <h2 style='padding-top:0px;'>$erwtisi</h2>";
            print"<h2 style='color:red'>ΑΠΑΝΤΗΣΗ</h2>
            <h2>$komma: $epilogh</h2>";
            $query1="select ep.epilogh from erwtiseis e inner join apanthseis a on e.id=a.iderwtisi inner join epiloges ep on ep.id=a.idepilogh
            where a.idkomma=$id and e.id=$iderwtisi";
            $stmt1=mysqli_prepare($dbc, $query1);
            $r1=mysqli_execute($stmt1);
            if($r1){
                mysqli_stmt_store_result($stmt1);
                mysqli_stmt_bind_result($stmt1, $egw);
                while(mysqli_stmt_fetch($stmt1)){
                    print"<h2>EΓΩ: $egw</h2></div>";
                    if($iderwtisi!=24)
                        print"<br><br>";
                }
        }   }
        print"<p style='text-align:center; font-size:28px;'>Eπιλέξτε κόμμα για να δείτε τις απαντήσεις του</p>
        <form action='' method='post'>
            <select name='komma' style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'>
                <option value=1 >NEA ΔΗΜΟΚΡΑΤΙΑ</option>
                <option value=2 >ΣΥΡΙΖΑ</option>
                <option value=3 >ΠΑΣΟΚ</option>
                <option value=4 >ΚΚΕ</option>
                <option value=5 >ΜΕΡΑ 25</option>
                <option value=6 >ΕΛΛΗΝΙΚΗ ΛΥΣΗ</option>
                <option value=7 >ΕΛΛΗΝΕΣ</option>
                <option value=8 >ΑΝΤΑΡΣΥΑ</option>
                <option value=9 >ΕΘΝΙΚΗ ΔΗΜΙΟΥΡΓΙΑ</option>
            </select>
            <p><input type='submit' name='submit' value='ΕΠΙΛΟΓΗ' style='font-size:18px; width:150px; height:40px;'></p><br><br>
        </form></div>
        <span><p style='color:white; font-size:13px; text-align:left;'>©NikosVoutsi</span><span style='padding-left:1270px;'>Ekloges2023</p></span>";
        exit();
    } 
}

?>


<p><a href='index.html'><img id='home' src='images/home.png' style='margin-bottom:90px;'></a></p>
<div id=container style="height:250px; overflow:hidden;" >
    <p style="text-align:center; font-size:28px;">Eπιλέξτε κόμμα για να δείτε τις απαντήσεις του</p>
<form action="" method="post">
    <select name='komma' value="2" style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234)'>
        <option value=1 >NEA ΔΗΜΟΚΡΑΤΙΑ</option>
        <option value=2 >ΣΥΡΙΖΑ</option>
        <option value=3 >ΠΑΣΟΚ</option>
        <option value=4 >ΚΚΕ</option>
        <option value=5 >ΜΕΡΑ 25</option>
        <option value=6 >ΕΛΛΗΝΙΚΗ ΛΥΣΗ</option>
        <option value=7 >ΕΛΛΗΝΕΣ</option>
        <option value=8 >ΑΝΤΑΡΣΥΑ</option>
        <option value=9 >ΕΘΝΙΚΗ ΔΗΜΙΟΥΡΓΙΑ</option>
    </select>
    <p><input type='submit' name='submit' value='ΕΠΙΛΟΓΗ' style='font-size:18px; width:150px; height:40px; margin-bottom:8px;'></p>
</form>
</div>
<span><p style='color:white; font-size:13px; text-align:left;margin-top:50vh;'>©NikosVoutsi</span><span style='padding-left:90vw;'>Ekloges2023</p></span>


</body>
</html>