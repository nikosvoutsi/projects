<?php
include('functions/helper_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=cv, initial-scale=1.0">
    <title>CV with flex</title>
    <style>
        *{
    box-sizing: border-box;
    border:none;
    margin: 0px;
    padding:0px;
    text-decoration: none;
    outline: none;
 }
 div#body{
     font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     font-size: 16px;
     min-height:1400px;
     display: flex;
     flex-direction: row; /*row| row-reverse */
     justify-content: space-between;
     align-items:flex-start;
 }
 div#wrapper{
     width:100%;
     max-width: 800px;
     min-height:1085px;
     margin:auto;
     border:solid thin;
     border-style: none;
 }
 div#header{
     background-color: rgb(109, 155, 211);
     height:160px;
     padding-top:3px;
     padding-bottom:3px;
     display:flex;
     justify-content: space-between;
     align-items:flex-start;
 }
 div#header h1{
     color:rgb(190, 44, 12);
     text-align: center;
     padding-top: 10px;
     font-size:40px;
 }
 div#header h3{
     color:rgb(56, 44, 40);
     text-align: center;
     padding-top: 10px;
     font-size:22px;
 }
 div#header p{
     color:rgb(56, 44, 40);
     text-align: center;
     padding-top: 10px;
     padding-top: 20px;
     font-size:15px;
 }
 div#header img{
     width: 15px;
     height: 15px;
 }
 div#info{
     width:950px;
     flex-direction: row;
     justify-content: space-around; /* space-between| space-evenly */
     align-items:flex-end;
 }
 div#foto{
     width:300px;
     display:flex;
     flex-direction: row; /*row| row-reverse */
     justify-content: space-between; /* space-between| space-evenly */
     align-items:flex-start;
 }
 div#foto img{
     width: 150px;
     height:150px;
     padding-left: 25px;
     padding-top: 4px;
     /*border-radius: 10px 10px 10px 10px;*/
 }
 div#personal{
     width:280px;
     min-height:945px;
     background-color: bisque;
     padding-top: 6px;
     padding-bottom: 6px;
     display: flex;
     flex-direction: column;
     /*justify-content: space-around; /* space-between| space-evenly */
     align-items:flex-start;
 }
 div#personal ul{
    font-weight: normal;
    padding-left: 27px;
 }
 div#edu-skills{
     width:520px;
     min-height:945px;
     background-color: mintcream;
     padding-top: 6px;
     padding-bottom: 6px;
     display: flex;
     flex-direction: column;
     justify-content: space-between; /* space-between| space-evenly */
     align-items:flex-start;
 }
 div#edu-skills ul{
    font-weight: normal;
    padding-left: 27px;
 }
 div#headline {
     height:40px;
     width: 280px;
     background-color: rgb(173, 155, 134);
     padding-left: 17px;
     padding-top: 8px;
 }
 div#headline2 {
     height:40px;
     width: 520px;
     background-color: rgb(0, 144, 72);
     padding-left: 17px;
     padding-top: 8px;
 }
 #p01{
     font-size:20px;
     color:white;
 }
 #p02{
     font-size:18px;
 }
 #p03{
     font-size:18px;
     font-weight: normal;
 }
 #p04{
     font-size:15px;
     font-weight: normal;
 }
 div#personal li{
    font-size:18px;
    font-weight: normal;
    padding-bottom:2px;
 }
 div#edu-skills li{
    font-size:18px;
    font-weight: normal;
    padding-bottom:2px;
 }
 .questionNumberIcon {
     display:inline-block;
     width:15px;
     height:15px;
     border-radius:23px;
     font-size:18px;
     color:#000;
     line-height:45px;
     text-align:center;
     background:#fff;
     border:2px solid black;
 }
.questionNumberIcon1 {
    display:inline-block;
    width:15px;
    height:15px;
    border-radius:23px;
    font-size:18px;
    color:rgb(200, 87, 6);
    line-height:45px;
    text-align:center;
    background:rgb(195, 85, 6);
    border:2px solid black;
    padding-left: 2px;
 }
 span{
   font-weight: normal;
}
    </style>
</head>
<body>
<?php
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
                $query0="select date(now())";
                $stmt0=mysqli_prepare($dbc, $query0);
                $r0=mysqli_execute($stmt0);
                if($r){
                    mysqli_stmt_store_result($stmt0);
                    mysqli_stmt_bind_result($stmt0, $now);
                    if (my_mysqli_stmt_num_rows($stmt0) == 1) {
                         while(mysqli_stmt_fetch($stmt0)){
                if(isset($_GET['q'])) {
                    $id=$_GET['q'];
                  }elseif(isset($_POST['id'])){
                    $id=$_POST['id'];}
                    //$id=36;
                    $query="select p.fname, p.lname, p.job, p.phone, p.birthday, p.birthplace, p.email, p.address, p.ln, s.status, g.gender, l.type, p.summary, p.files
                    from people p inner join gender g on p.gender=g.idgender inner join marital_status s on p.status=s.id 
                    inner join d_license l on p.dlisence=l.id where p.idpeople=$id";
                    $stmt=mysqli_prepare($dbc,$query);
                    $r=mysqli_stmt_execute($stmt);


    if($r){
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $fname, $lname, $job, $phone, $birthday, $birthplace, $email, $address, $ln, $status, $gender, $lisence, $summary, $files);

    while(mysqli_stmt_fetch($stmt)){
        $year=date('Y',strtotime($birthday));
        $month=date('m',strtotime($birthday));
        $day=date('d',strtotime($birthday));
        if($ln==null){$ln='-';};
        if($lisence==null){$lisence='-';};
    print"<div id='wrapper'>
        <div id='header'>
            <div id='foto'>";
            if($files!=null&&$files!='null')
                print"<img src='images/$files'>";
            print"</div>
            <div id='info'>
                <h1>";echo strtoupper("$fname $lname");print"</h1>
                <h3>$job</h3>
                <p><span><img src='images/address.png'> </span> $address  <span> <img src='images/phone.jpg'> </span>$phone<span> <img src='images/email.png'> </span>  $email<span> <br><img src='images/in.png'></span>$ln</p>
            </div>
        </div>
        <div id='body'>
            <div id='personal'>
                <div id='headline'><p id='p01'>PERSONAL</p></div><br>
                    
                    <ul>
                        <li><p id='p03'>DATE OF BIRTH</p></li><p id='p04'>$day/$month/$year</p>
                        <li><p id='p03'>PLACE OF BIRTH</p><p id='p04'>$birthplace</p></li>
                        <li><p id='p03'>MARITAL STATUS</p><p id='p04'>$status</p></li>
                        <li><p id='p03'>DRIVING LICENSE</p><p id='p04'>$lisence</p></li>
                    </ul><br>
                    <div id='headline'><p id='p01'>SPEAKING LANGUAGES</p></div><br>";
                    $query3="select l1.lang, l2.level from languages l1 inner join lang_level l2 on l1.level=l2.id_level where idpeople=$id
                    order by l2.id_level desc";
                    $stmt3=mysqli_prepare($dbc,$query3);
                    $r3=mysqli_stmt_execute($stmt3);
                    if($r3){
                    mysqli_stmt_store_result($stmt3);
                    mysqli_stmt_bind_result($stmt3, $lang, $level);
                    print'<ul>';
                    while(mysqli_stmt_fetch($stmt3)){   
                    print"<li>$lang ($level)</li>"; 
                    } 
                    print"</ul><br>";
                    } 
                    print"
                    <div id='headline'><p id='p01'>SKILLS</p></div><br>
                    <ul>";
                    $query2="select skill, rate from skills where idpeople=$id order by rate desc";
                    $stmt2=mysqli_prepare($dbc,$query2);
                    $r2=mysqli_stmt_execute($stmt2);
                    if($r2){
                    mysqli_stmt_store_result($stmt2);
                    mysqli_stmt_bind_result($stmt2, $skill, $rate);
                    while(mysqli_stmt_fetch($stmt2)){
                        if($rate==1){
                            print"<li>$skill<br><div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon'></div>
                            <div class='questionNumberIcon'></div>
                            <div class='questionNumberIcon'></div>
                            <div class='questionNumberIcon'></div></li>"; }
                        elseif($rate==2){
                            print"<li>$skill<br><div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon'></div>
                            <div class='questionNumberIcon'></div>
                            <div class='questionNumberIcon'></div></li>";}
                        elseif($rate==3){
                            print"<li>$skill<br><div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon'></div>
                            <div class='questionNumberIcon'></div></li>";}
                        elseif($rate==4){
                            print"<li>$skill<br><div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon'></div></li>";} 
                        else{
                            print"<li>$skill<br><div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div>
                            <div class='questionNumberIcon1'></div></li>";}   
                    }
                    print"</ul><br>";
                }
            print"</div>
            <div id='edu-skills'>
                    <div id='headline2'><p id='p01'>SUMMARY</p></div>
                    <p style='font-size:18px; padding-left:20px'>$summary</p>
                    <div id='headline2'><p id='p01'>WORK EXPERIENCE</p></div>
                    <ul>";
                    $query4="select work, company, start, end from work_experience where idpeople=$id order by start desc";
                    $stmt4=mysqli_prepare($dbc,$query4);
                    $r4=mysqli_stmt_execute($stmt4);
                    if($r4){
                    mysqli_stmt_store_result($stmt4);
                    mysqli_stmt_bind_result($stmt4, $work, $company, $start, $end);
                    while(mysqli_stmt_fetch($stmt4)){
                    $year1=date('Y',strtotime($start));
                    $month1=date('m',strtotime($start));
                    $month1=month_conversion($month1);    
                    $year2=date('Y',strtotime($end));
                    $month2=date('m',strtotime($end));
                    $month2=month_conversion($month2);
                    $day2=date('d',strtotime($end));
                        if($end==$now){
                        print"<li><p id='p03'>$work in $company</p></li>
                        <p>$month1 $year1-present</p><br>";
                        }else{
                        print"<li><p id='p03'>$work in $company</p></li>
                        <p>$month1 $year1-$month2 $year2</p><br>";
                        }
                    }
                    print"</ul>";
                }
                    print"<div id='headline2'><p id='p01'>EDUCATION</p></div>
                    <ul>";
                    $query5="select education, institute, start, end, info from education where idpeople=$id order by start desc";
                    $stmt5=mysqli_prepare($dbc,$query5);
                    $r5=mysqli_stmt_execute($stmt5);
                    if($r5){
                    mysqli_stmt_store_result($stmt5);
                    mysqli_stmt_bind_result($stmt5, $education, $institute, $start, $end, $info);
                    while(mysqli_stmt_fetch($stmt5)){
                        $year1=date('Y',strtotime($start));
                        $month1=date('m',strtotime($start));
                        $month1=month_conversion($month1);    
                        $year2=date('Y',strtotime($end));
                        $month2=date('m',strtotime($end));
                        $month2=month_conversion($month2);
                        $day2=date('d',strtotime($end));
                        if($end==$now){
                            print"<li><p id='p03'>$education ($institute) $info</p></li>
                            <p>$month1 $year1-present</p><br>";
                            }else{
                            print"<li><p id='p03'>$education ($institute) $info</p></li>
                            <p>$month1 $year1-$month2 $year2</p><br>";
                            }
                        }
                        print"</ul>";
                    }  
                    print"<div id='headline2'><p id='p01'>INTERESTS</p></div>
                    <ul>";
                    $query6="select interest from interests where idpeople=$id";
                    $stmt6=mysqli_prepare($dbc,$query6);
                    $r6=mysqli_stmt_execute($stmt6);
                    if($r6){
                    mysqli_stmt_store_result($stmt6);
                    mysqli_stmt_bind_result($stmt6, $interest);
                    while(mysqli_stmt_fetch($stmt6)){   
                        print"<li>$interest</li>"; 
                    } 
                    print"</ul><br>";
                }  
                    print"<div id='headline2'><p id='p01'>REFERENCES</p></div>
                    <p style='font-size:18px; padding-left:20px;'>Available upon request</p> 
     
    </div>";
}}}}}}}}
?>
</body>
</html>