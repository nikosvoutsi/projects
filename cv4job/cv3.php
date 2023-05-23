<?php
include('functions/helper_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
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
     font-family:Arial, Helvetica, sans-serif;
     font-size: 16px;
     height:1700px;
     display: flex;
     flex-direction: row; /*row| row-reverse */
     justify-content: space-between;
     align-items:flex-start;
    }
    div#wrapper{
     width:100%;
     max-width: 800px;
     max-height:1800px;
     margin:auto;
     display:flex;
     border:solid thin;
     position:relative;
    }
    div#personal{
     font-family:Arial, Helvetica, sans-serif;
     text-align: center;
     width:280px;
     max-height:1800px;
     max-width: 800px;
     background-color: #003D73;
     padding-bottom:1.5px;
     position:relative;
    }
    div#summary{
     width:520px;
     max-width: 800px;
     max-height:1800px;
     min-height:1200px;
     display:flex;
     flex-direction: column;
     position:relative; 
    }
    div#personal h2{
     color:white;
     font-size: 32px;
     padding-top: 1px;
     padding-bottom: 2px;
    }
    div#personal p{
     color:rgb(244, 237, 237);
     font-size: 16px;
     padding-top: 1.5px;
    }
    div#headline{
     text-align:left;
     height:24px;
     color:white;
     background-color:#00315C;
     font-size: 16px;
     margin-top: 18px;
     padding: 3px;
     padding-left: 17px;
    }
    div#content{
     text-align:left;
     max-height:445px;
     color:white;
     font-size: 16px;
     margin-top: 4px;
     margin-bottom: 4px;
     padding-top: 8px;
     padding-bottom: 10px;
     margin-left: 17px;
    }
    div#content01{
     text-align:left;
     max-height:620px;
     min-height:100px;
     color:white;
     font-size: 16px;
     margin-top: 4px;
     padding-top: 8px;
     margin-left: 17px;
    }
    div#content0{
     text-align:left;
     height:340px;
     color:white;
     font-size: 16px;
     margin-top: 4px;
     margin-bottom: 22px;
     margin-right: 2px;
     padding-top: 3px;
     padding-bottom: 10px;
     margin-left: 37px;
    }
    div#content0 a{
     color:white;
     text-decoration: underline;
    }
    div#content0 a:hover{
     color:yellow;
     text-decoration: underline;
    }
    div#content li{
     margin-left: 37px;
     padding-bottom: 10px;
    }
    div#content01 li{
     margin-left: 37px;
     padding-bottom: 10px;
    }
    div#content2 li{
     font-size: 14px;
     margin-left: 37px;
     padding-bottom: 10px;
    }
    div#content3 li{
     font-size: 16px;
     margin-left: 37px;
     padding-bottom: 10px;
    }
    div#summary p{
     font-size: 15px;
     font-family: Arial, Helvetica, sans-serif;
     padding-left:4px;
     padding-top:10px;
     padding-bottom:10px;
     text-decoration:none;
    }
    div#headline2 {
     font-family: Arial, Helvetica, sans-serif;
     font-size:18px;
     border-top:gray solid 1.5px;
     padding-top: 3px;
     padding-left: 6px;
     height:30px;
     border-bottom: gray solid 1px;
     color:#2F5496;
    }
    div#content2{
     text-align:left;
     height:320px;
     font-size: 14px;
     margin-top: 7px;
     margin-bottom: 5px;
     padding-top: 10px;
     margin-left: 6px;
     display: flex;
     flex-direction: row;
     justify-content: space-between; /* space-between| space-evenly */
     align-items:flex-start;
    }
    div#content3{
     min-height:120px;
     font-size: 14px;
     margin-top: 2px;
     margin-left: 140px;

    }
    div#content4{
     text-align:left;
     height:260px;
     font-size: 14px;
     margin-top: 5px;
     margin-bottom: 3px;
     padding-top: 7px;
     margin-left: 6px;
     display: flex;
     flex-direction: row;
     justify-content: space-between; /* space-between| space-evenly */
     align-items:flex-start;
    }
    div#content7{
     max-height:700px;
     min-height:70px;
     font-size: 16px;
     margin-top: 7px;
     margin-left: 30px;
     display: flex;
     flex-direction:column;
     justify-content: space-between; /* space-between| space-evenly */
     align-items:left;
    }
    div#content8{
     max-height:700px;
     min-height:200px;
     font-size: 14px;
     margin-top: 7px;
     margin-left: 30px;
     display: flex;
     flex-direction: column;
     justify-content: space-between; /* space-between| space-evenly */
    }
    div#content2 p{
     font-family: Arial, Helvetica, sans-serif;
     font-size: 14px;  
    }
    div#p2{
     text-align: left;
     font-family: Arial, Helvetica, sans-serif;
     font-size: 12px;  
    }
    div#left{
     text-align:left;
     font-size: 14px;
     width:240px;
     height:270px;
     margin-bottom: 8px;
     padding-bottom: 5px;
    }
    div#left2{
     height:0px;
     font-size: 16px;
     margin-top: 5px;
     padding-right: 5px;
     padding-bottom:0px;
     margin-bottom:0px;
     display: flex;
     flex-direction:column;
     justify-content: space-between; /* space-between| space-evenly */
     align-items:left;
    }
    div#right2{
     height:40px;
     font-size: 16px;
     margin-bottom: 8px;
     padding-bottom: 5px;
     display: flex;
     flex-direction:column;
     justify-content: space-between; /* space-between| space-evenly */
     align-items:center;
    }
    div#left p{
     font-size: 14px;
    }
    div#right p{
     font-size: 14px;  

    }
    p#u{
        text-decoration: underline;
        font-size: 24px;
        padding-top:4px;
    }
    #p03{
        padding-top:1px;
        margin-top: 4px;
        text-decoration:underline;
    }
    img{
        border-radius:50%;
        width: 120px;
        height: 100px;
    }
    .stars {
    margin-top:1px;
   }
    .clip-star1 {
    background: gold;
    clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
    display: inline-block;
    height: 20px;
    width: 20px;
   }
   .clip-star0 {
    background: white;
    clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
    display: inline-block;
    height: 20px;
    width: 20px;
}
a{
    text-decoration:none;
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
    if(isset($_GET['q'])) {
        $id=$_GET['q'];
      }elseif(isset($_POST['id'])){
        $id=$_POST['id'];}
    $query="select count(idpeople) from people where email='$id'";
    $stmt=mysqli_prepare($dbc, $query);
    $r=mysqli_execute($stmt);
    if($r){
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $cnt);
        if (my_mysqli_stmt_num_rows($stmt) == 1) {
             while(mysqli_stmt_fetch($stmt)){
                if($cnt==0){
                    header(Location:"create2.php?q=$id");
                    exit();
                }

                
    $query0="select date(now())";
    $stmt0=mysqli_prepare($dbc, $query0);
    $r0=mysqli_execute($stmt0);
    if($r){
        mysqli_stmt_store_result($stmt0);
        mysqli_stmt_bind_result($stmt0, $now);
        if (my_mysqli_stmt_num_rows($stmt0) == 1) {
             while(mysqli_stmt_fetch($stmt0)){
                
  
        //$id=1;
        //print"$id";
    $query="select p.idpeople, p.fname, p.lname, p.job, p.phone, p.birthday, p.birthplace, p.email, p.address, p.ln, s.status, g.gender, l.type, p.summary, p.files
    from people p inner join gender g on p.gender=g.idgender inner join marital_status s on p.status=s.id 
    inner join d_license l on p.dlisence=l.id where p.idpeople=(select max(idpeople) from people where email='$id')";
    $stmt=mysqli_prepare($dbc,$query);
    $r=mysqli_stmt_execute($stmt);


    if($r){
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $pid, $fname, $lname, $job, $phone, $birthday, $birthplace, $email, $address, $ln, $status, $gender, $lisence, $summary, $files);

    while(mysqli_stmt_fetch($stmt)){
        
        $year=date('Y',strtotime($birthday));
        $month=date('m',strtotime($birthday));
        $day=date('d',strtotime($birthday));
    print"<div id='wrapper'>
    <div id='personal'>
       <h2>$fname</h2>
       <h2>$lname</h2>";
       if($files!='null'){
       print"<img src='images/$files' id='icon' alt='User Icon' />";}
       print"<p> $job</p>
       <div id='headline'>Personal</div>
       <div id='content0'><p id='p03'><b>Phone</b></p>$phone<br><p id='p03'><b>Email</b></p><i>$email</i><br><p id='p03'><b>Date of birth</b></p>$day/$month/$year<br>
       <p id='p03'><b>Place of birth</b></p>$birthplace<br><p id='p03'><b>Address</b></p>$address<br><p id='p03'><b>Gender</b></p>$gender<br><p id='p03'><b>Marital Status</b></p>$status<br><p id='p03'><b>Driving License</b></p> $lisence<br>
       <p id='p03'><b>LinkedIn</b></p><p><i>$ln</i></div></p><br>
       <div id='headline'>Skills</div>
       <div id='content01'>
        <ul>";
        $query2="select skill, rate from skills where idpeople=$pid order by rate desc";
        $stmt2=mysqli_prepare($dbc,$query2);
        $r2=mysqli_stmt_execute($stmt2);
        if($r2){
        mysqli_stmt_store_result($stmt2);
        mysqli_stmt_bind_result($stmt2, $skill, $rate);
        while(mysqli_stmt_fetch($stmt2)){
            if($rate==1){print"<li>$skill<div class='stars'><div class='clip-star1'></div>
                <div class='clip-star0'></div>
                <div class='clip-star0'></div>
                <div class='clip-star0'></div>
                <div class='clip-star0'></div></div></li>"; }
            elseif($rate==2){print"<li>$skill<div class='stars'><div class='clip-star1'></div>
                <div class='clip-star1'></div>
                <div class='clip-star0'></div>
                <div class='clip-star0'></div>
                <div class='clip-star0'></div></div></li>";}
            elseif($rate==3){print"<li>$skill<div class='stars'><div class='clip-star1'></div>
                <div class='clip-star1'></div>
                <div class='clip-star1'></div>
                <div class='clip-star0'></div>
                <div class='clip-star0'></div></div></li>";}
            elseif($rate==4){print"<li>$skill<div class='stars'><div class='clip-star1'></div>
                <div class='clip-star1'></div>
                <div class='clip-star1'></div>
                <div class='clip-star1'></div>
                <div class='clip-star0'></div></div></li>";} 
            else{print"<li>$skill<div class='stars'><div class='clip-star1'></div>
                <div class='clip-star1'></div>
                <div class='clip-star1'></div>
                <div class='clip-star1'></div>
                <div class='clip-star1'></div></div></li>";}   
        } 
        print"
       </ul></div>";
    }
       print"<div id='headline'>Speaking Languages</div>
       <div id='content'>";
       $query3="select l1.lang, l2.level from languages l1 inner join lang_level l2 on l1.level=l2.id_level where idpeople=$pid
       order by l2.id_level desc";
       $stmt3=mysqli_prepare($dbc,$query3);
       $r3=mysqli_stmt_execute($stmt3);
       if($r3){
        mysqli_stmt_store_result($stmt3);
        mysqli_stmt_bind_result($stmt3, $lang, $level);
        print"<ul>";
        while(mysqli_stmt_fetch($stmt3)){   
            print"<li>$lang ($level)</li>"; 
        } 
       print"</ul></div>";
       } 
      print"</div>
    <div id='summary'>
    <div id='headline2'><b>Summary</b></div>
        <p>$summary</p>
        <div id='headline2'><b>Work Experience</b></div>
        <div id='content7'>";
        $query4="select work, company, start, end from work_experience where idpeople=$pid order by start desc";
        $stmt4=mysqli_prepare($dbc,$query4);
        $r4=mysqli_stmt_execute($stmt4);
        if($r4){
        mysqli_stmt_store_result($stmt4);
        mysqli_stmt_bind_result($stmt4, $work, $company, $start, $end);
        while(mysqli_stmt_fetch($stmt4)){
        $year1=date('Y',strtotime($start));
        $month1=date('m',strtotime($start));    
        $year2=date('Y',strtotime($end));
        $month2=date('m',strtotime($end));
        $day2=date('d',strtotime($end));
        if($end==$now){
            print"
            <div id='left2'> $month1/$year1 - present </div>        
            
           <div id='right2'><b>$work
           </b>
           <p style='text-align:center'><i>$company</i> </p></div><br>
             ";
        }else{
            print"
             <div id='left2'> $month1/$year1 - $month2/$year2 </div>        
             
            <div id='right2'><b>$work
            </b>
            <p><i>$company</i> </p></div><br>
              ";
            }
        }}
            print"
            </div>
        <div id='headline2'><b>Education</b></div>
        <div id='content8'>";
        $query5="select education, institute, start, end, info from education where idpeople=$pid order by start desc";
        $stmt5=mysqli_prepare($dbc,$query5);
        $r5=mysqli_stmt_execute($stmt5);
        if($r5){
        mysqli_stmt_store_result($stmt5);
        mysqli_stmt_bind_result($stmt5, $education, $institute, $start, $end, $info);
        while(mysqli_stmt_fetch($stmt5)){
        $year1=date('Y',strtotime($start));
        $month1=date('m',strtotime($start));
        $year2=date('Y',strtotime($end));
        $month2=date('m',strtotime($end));
            print"
             <div id='left2'> $month1/$year1 - $month2/$year2 </div>        
             
            <div id='right2'><b>$education
            </b>
            <p><i>$institute
              $info</i> </p></div><br>
              ";
        }}
            print"
            </div>
        <div id='headline2'><b>Interests and Hobbies</b></div><br>
        <div id='content3'>
        <ul>";
        $query6="select interest from interests where idpeople=$pid";
        $stmt6=mysqli_prepare($dbc,$query6);
        $r6=mysqli_stmt_execute($stmt6);
        if($r6){
        mysqli_stmt_store_result($stmt6);
        mysqli_stmt_bind_result($stmt6, $interest);
        while(mysqli_stmt_fetch($stmt6)){   
            print"<li>$interest</li>"; 
        } 
        print"</ul></div><br>";
    } 
            print"
            <div id='headline2'><b>References</b></div>
            <div id='content3'>
                <p id='p2'> Available upon request<br></p>
            </div>
        </div><br><br><br><br>
        
        </div><br><br><br><br>
    </div>
</div>";



   }}}}}}
}else{
    print"ll";
}
}
    ?>
</body>
</html>