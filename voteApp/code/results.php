<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoteApp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('functions/helper_functions.php');
?>
    <?php

    if(isset($_GET['q'])){
        $id=$_GET['q'];
    };
    //print"$id";


    $db_host='localhost';
    $db_user='root';
    $db_password='';
    $d_database='voteapp';

    if($dbc= @mysqli_connect($db_host, $db_user, $db_password, $d_database)){
        //print"<p style='color:green;'>Έχετε συνδεθεί επιτυχώς με τη ΒΔ</p>\n";
    }else{
        //print"<p style='color:red;'>Σφάλμα σύνδεσης με τη ΒΔ</p>\n";
    }
    $answers=array();
    $query0="select idepilogh from apanthseis where idkomma='$id'";
    $stmt0=mysqli_prepare($dbc, $query0);
    $r0=mysqli_execute($stmt0);
    if($r0){
        mysqli_stmt_store_result($stmt0);
        mysqli_stmt_bind_result($stmt0, $epilogh);
        while(mysqli_stmt_fetch($stmt0)){
            array_push($answers, $epilogh);
        }
    }
    
    

    foreach($answers as $apantisi){
        //print"$apantisi";
    }
    //print"<br>";
    
    $nd=array();
    $query0="select idepilogh from apanthseis where idkomma=1";
    $stmt0=mysqli_prepare($dbc, $query0);
    $r0=mysqli_execute($stmt0);
    if($r0){
        mysqli_stmt_store_result($stmt0);
        mysqli_stmt_bind_result($stmt0, $epilogh);
        while(mysqli_stmt_fetch($stmt0)){
            array_push($nd, $epilogh);
        }
    }

    $sumND=0;
    $posND=0;
    $plithosErwtisewn=24;

    for($i=0;$i<$plithosErwtisewn;$i++){
        if($answers[$i]==$nd[$i]){$sumND++;}
        /* else if() */
        
    }

    $posND=$sumND*100/$plithosErwtisewn;
    $posND=number_format($posND, 2, '.', "");

    //print"ΝΔ $posND% ";

    $syriza=array();
    $query1="select idepilogh from apanthseis where idkomma=2";
    $stmt1=mysqli_prepare($dbc, $query1);
    $r1=mysqli_execute($stmt1);
    if($r1){
        mysqli_stmt_store_result($stmt1);
        mysqli_stmt_bind_result($stmt1, $epilogh);
        while(mysqli_stmt_fetch($stmt1)){
            array_push($syriza, $epilogh);
        }
    }

    $sumSyriza=0;
    $posSyriza=0;

    for($i=0;$i<$plithosErwtisewn;$i++){
        if($answers[$i]==$syriza[$i]){$sumSyriza++;}
        /* else if() */
        
    }

    $posSyriza=$sumSyriza*100/$plithosErwtisewn;
    $posSyriza=number_format($posSyriza, 2, '.', "");

    //print"$sumSyriza\n";
    //print"ΣΥΡΙΖΑ $posSyriza% ";
    
    $pasok=array();
    $query2="select idepilogh from apanthseis where idkomma=3";
    $stmt2=mysqli_prepare($dbc, $query2);
    $r2=mysqli_execute($stmt2);
    if($r2){
        mysqli_stmt_store_result($stmt2);
        mysqli_stmt_bind_result($stmt2, $epilogh);
        while(mysqli_stmt_fetch($stmt2)){
            array_push($pasok, $epilogh);
        }
    }

    $sumPasok=0;
    $posPasok=0;

    for($i=0;$i<$plithosErwtisewn;$i++){
        if($answers[$i]==$pasok[$i]){$sumPasok++;}      
    }

    $posPasok=$sumPasok*100/$plithosErwtisewn;
    $posPasok=number_format($posPasok,"2", ".", "");

    //print"$sumSyriza\n";
    //print"ΠΑΣΟΚ $posPasok% ";

    $kke=array();
    $query3="select idepilogh from apanthseis where idkomma=4";
    $stmt3=mysqli_prepare($dbc, $query3);
    $r3=mysqli_execute($stmt3);
    if($r3){
        mysqli_stmt_store_result($stmt3);
        mysqli_stmt_bind_result($stmt3, $epilogh);
        while(mysqli_stmt_fetch($stmt3)){
            array_push($kke, $epilogh);
        }
    }

    $sumKKE=0;
    $posKKE=0;

    for($i=0;$i<$plithosErwtisewn;$i++){
        if($answers[$i]==$kke[$i]){$sumKKE++;}
        /* else if() */
        
    }

    $posKKE=$sumKKE*100/$plithosErwtisewn;
    $posKKE=number_format($posKKE, "2", ".", "");
    //print"$sumSyriza\n";
    //print"ΚΚΕ $posKKE% ";

    $mera25=array();
    $query4="select idepilogh from apanthseis where idkomma=5";
    $stmt4=mysqli_prepare($dbc, $query4);
    $r4=mysqli_execute($stmt4);
    if($r4){
        mysqli_stmt_store_result($stmt4);
        mysqli_stmt_bind_result($stmt4, $epilogh);
        while(mysqli_stmt_fetch($stmt4)){
            array_push($mera25, $epilogh);
        }
    }


    $sumMera25=0;
    $posMera25=0;
    

    for($i=0;$i<$plithosErwtisewn;$i++){
        if($answers[$i]==$mera25[$i]){$sumMera25++;}
        /* else if() */
        
    }

    $posMera25=$sumMera25*100/$plithosErwtisewn;
    $posMera25=number_format($posMera25,"2",".","");

    //print"$sumSyriza\n";
    //print"ΜΕΡΑ 25 $posMera25% ";

    $el_lush=array();
    $query4="select idepilogh from apanthseis where idkomma=6";
    $stmt4=mysqli_prepare($dbc, $query4);
    $r4=mysqli_execute($stmt4);
    if($r4){
        mysqli_stmt_store_result($stmt4);
        mysqli_stmt_bind_result($stmt4, $epilogh);
        while(mysqli_stmt_fetch($stmt4)){
            array_push($el_lush, $epilogh);
        }
    }


    $sumEl_lush=0;
    $posEl_lush=0;

    for($i=0;$i<$plithosErwtisewn;$i++){
        if($answers[$i]==$el_lush[$i]){$sumEl_lush++;}        
    }

    $posEl_lush=$sumEl_lush*100/$plithosErwtisewn;
    $posEl_lush=number_format($posEl_lush,"2",".","");

    //print"ΕΛΛΗΝΙΚΗ ΛΥΣΗ $posEl_lush% ";

    $ellhnes=array();
    $query4="select idepilogh from apanthseis where idkomma=7";
    $stmt4=mysqli_prepare($dbc, $query4);
    $r4=mysqli_execute($stmt4);
    if($r4){
        mysqli_stmt_store_result($stmt4);
        mysqli_stmt_bind_result($stmt4, $epilogh);
        while(mysqli_stmt_fetch($stmt4)){
            array_push($ellhnes, $epilogh);
        }
    }


    $sumEllhnes=0;
    $posEllhnes=0;

    for($i=0;$i<$plithosErwtisewn;$i++){
        if($answers[$i]==$ellhnes[$i]){$sumEllhnes++;}        
    }

    $posEllhnes=$sumEllhnes*100/$plithosErwtisewn;
    $posEllhnes=number_format($posEllhnes,"2",".","");

    //print"ΕΛΛΗΝΕΣ $posEllhnes% ";

    $antarsya=array();
    $query4="select idepilogh from apanthseis where idkomma=8";
    $stmt4=mysqli_prepare($dbc, $query4);
    $r4=mysqli_execute($stmt4);
    if($r4){
        mysqli_stmt_store_result($stmt4);
        mysqli_stmt_bind_result($stmt4, $epilogh);
        while(mysqli_stmt_fetch($stmt4)){
            array_push($antarsya, $epilogh);
        }
    }

    $sumAntarsya=0;
    $posAntarsya=0;

    for($i=0;$i<$plithosErwtisewn;$i++){
        if($answers[$i]==$antarsya[$i]){$sumAntarsya++;}        
    }

    $posAntarsya=$sumAntarsya*100/$plithosErwtisewn;
    $posAntarsya=number_format($posAntarsya,"2",".","");

    //print"ANTΑΡΣΥΑ $posAntarsya% ";

    $dimiourgia=array();
    $query8="select idepilogh from apanthseis where idkomma=9";
    $stmt8=mysqli_prepare($dbc, $query8);
    $r8=mysqli_execute($stmt8);
    if($r8){
        mysqli_stmt_store_result($stmt8);
        mysqli_stmt_bind_result($stmt8, $epilogh);
        while(mysqli_stmt_fetch($stmt8)){
            array_push($dimiourgia, $epilogh);
        }
    }

    $sumDimiourgia=0;
    $posDimiourgia=0;

    for($i=0;$i<$plithosErwtisewn;$i++){
        if($answers[$i]==$dimiourgia[$i]){$sumDimiourgia++;}        
    }

    $posDimiourgia=$sumDimiourgia*100/$plithosErwtisewn;
    $posDimiourgia=number_format($posDimiourgia,"2",".","");

    print"<p><a href='index.html'><img id='home' src='images/home.png'></a></p>
    <div id='container' style='margin-top:26px'>
    <div id='komma'><div id='sima'><img src='images/nea_dimokratia.png' id='komma'></div><div id='name' style='color:blue'>NEA ΔΗΜΟΚΡΑΤΙΑ</div> <div id='pososto'style='color:blue'>$posND%</div></div>
    <div id='komma'><div id='sima'><img src='images/syriza.jpg' id='komma'></div><div id='name' style='color:rgb(228, 18, 147)'>ΣΥΡΙΖΑ</div> <div id='pososto'style='color:rgb(228, 18, 147)'>$posSyriza%</div></div>
    <div id='komma'><div id='sima'><img src='images/pasok.png' id='komma'></div><div id='name' style='color:green'>ΠΑΣΟΚ</div> <div id='pososto'style='color:green'>$posPasok%</div></div>
    <div id='komma'><div id='sima'><img src='images/kke.jpg' id='komma'></div><div id='name' style='color:red'>KKE</div> <div id='pososto'style='color:red'>$posKKE%</div></div>
    <div id='komma'><div id='sima'><img src='images/el_lush.jpg' id='komma'></div><div id='name' style='color:rgb(22, 22, 146)'>EΛΛΗΝΙΚΗ ΛΥΣΗ</div> <div id='pososto'style='color:rgb(22, 22, 146)'>$posEl_lush%</div></div>
    <div id='komma'><div id='sima'><img src='images/mera25.jpg' id='komma'></div><div id='name' style='color:rgb(234, 6, 90)'>ΜΕΡΑ 25</div> <div id='pososto'style='color:rgb(234, 6, 90)'>$posMera25%</div></div>
    <div id='komma'><div id='sima'><img src='images/ellhnes.png' id='komma'></div><div id='name' style='color:rgb(20, 20, 100)'>ΕΘΝΙΚΟ ΚΟΜΜΑ ΕΛΛΗΝΕΣ</div> <div id='pososto'style='color:rgb(20, 20, 100)'>$posEllhnes%</div></div>
    <div id='komma'><div id='sima'><img src='images/antarsya.jpg' id='komma'></div><div id='name' style='color:rgb(255, 0, 0)'>ΑΝΤΑΡΣΥΑ</div> <div id='pososto'style='color:rgb(255, 0, 0)'>$posAntarsya%</div></div>
    <div id='komma'><div id='sima'><img src='images/eth_dimiourgia.jfif' id='komma'></div><div id='name' style='color:rgb(13, 196, 233)'>ΕΘΝΙΚΗ ΔΗΜΙΟΥΡΓΙΑ</div> <div id='pososto'style='color:rgb(13, 196, 233)'>$posDimiourgia%</div></div>
    ";
    print"<h3 style='text-align:center'>Για να δείτε τις απαντήσεις των κομμάτων, πατήστε <a style='color:blue' href='apanthseis.php?q=$id' id='a01'>εδώ</a></h3></div>\n";

    ?>

</body>
</html>