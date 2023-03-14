<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoteApp</title>
    <link rel="stylesheet" href="style.css">
    <style>
        h3{
            text-align:center;
            font-size:22px;
        }
        p{
            text-align:left;
            margin-left:550px;
            font-size:17px;
        }
        body {
            font-family: "Poppins", sans-serif;
            height: 100vh;
            overflow:hidden;
        }
        div#container2{
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
        div#container2 ul,li{
            text-align:center;
            color:red;
        }
    </style>
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors=[];
        if(!$gender=filter_input(INPUT_POST,'gender')){
            $errors[]='Παρακαλώ εισάγετε φύλο';
        }
        if(!$age=filter_input(INPUT_POST,'age')){
          $errors[]='Παρακαλώ εισάγετε ηλικιακή ομάδα';
        }
        if(!$education=filter_input(INPUT_POST,'education', FILTER_SANITIZE_STRING)){
          $errors[]='Παρακαλώ εισάγετε επίπεδο μόρφωσης';
        }
        if(!$area=filter_input(INPUT_POST,'area', FILTER_SANITIZE_STRING)){
          $errors[]='Παρακαλώ εισάγετε περιοχή διαμονής';
        }
        if(!$vote=filter_input(INPUT_POST,'vote')){
          $errors[]='Παρακαλώ εισάγετε πόσο πιθανό είναι να ψηφίσετε';
        }
        
        if(!empty($errors)){
            print"<div id='container2'>";
            print "<p>Εντοπίστηκε πρόβλημα!\n";
            print "<ul>\n";
            foreach ($errors as $message) {
                print "<li> - $message!</li>\n";
            }
            print "</ul></p>\n";
            print"<form action='telos2.php?q=$id' method='post'>
                    <h3 style='margin-right:30px;'>Φύλο:</h3>
                    <p><input type='radio' name='gender' value=1>Άνδρας</p>
                    <p><input type='radio' name='gender' value=2>Γυναίκα</p>
                    <p><input type='radio' name='gender' value=3>Άλλο ή απροσδιόριστο</p>
                    <h3>Σε ποια ηλικιακή ομάδα ανήκετε;</h3>
                    <p><input type='radio' name='age' value=1>17-24</p>
                    <p><input type='radio' name='age' value=2>25-40</p>
                    <p><input type='radio' name='age' value=3>41-65</p>
                    <p><input type='radio' name='age' value=4>65+</p>
                    <h3>Ποιο το επίπεδο μόρφωσής σας;</h3>
                    <p><input type='radio' name='education' value=1>Απολυτήριο Δημοτικού ή Γυμνασίου</p>
                    <p><input type='radio' name='education' value=2>Απολυτήριο Λυκείου</p>
                    <p><input type='radio' name='education' value=3>Πτυχίο ΙΕΚ</p>
                    <p><input type='radio' name='education' value=4>Πτυχίο ΤΕΙ ή ΑΕΙ</p>
                    <p><input type='radio' name='education' value=5>Μεταπτυχιακό</p>
                    <p><input type='radio' name='education' value=6>Διδακτορικό</p>
                    <h3>Σε τί περιοχή διαμένετε;</h3>
                    <p><input type='radio' name='area' value=1>Αστική </p>
                    <p><input type='radio' name='area' value=2>Ημιαστική</p>
                    <p><input type='radio' name='area' value=3>Αγροτική</p>
                    <h3>Πόσο πιθανό είναι να ψηφίσετε σε αυτές τις εκλογές;</h3>
                    <p><input type='radio' name='vote' value=1>Πολύ πιθανό έως σίγουρο</p>
                    <p><input type='radio' name='vote' value=2>Αρκετά πιθανό</p>
                    <p><input type='radio' name='vote' value=3>Λίγο πιθανό</p>
                    <p><input type='radio' name='vote' value=4>Δεν θα ψηφίσω</p><br>
                    <p><input type='submit' name='submit' value='ΥΠΟΒΟΛΗ' style='width:120px; height:45px;'></p><br><br><br><br>
                   </form>";   
            print"</div>";
        }else{
    $db_host='localhost';
    $db_user='root';
    $db_password='';
    $d_database='voteapp';

    if($dbc= @mysqli_connect($db_host, $db_user, $db_password, $d_database)){
        //print"<p style='color:green;'>Έχετε συνδεθεί επιτυχώς με τη ΒΔ</p>\n";
    }else{
        print"<p style='color:red;'>Σφάλμα σύνδεσης με τη ΒΔ</p>\n";
    }
  
    $query = "UPDATE users SET gender=?, age=?, education=?, area=?, vote=? WHERE id=?";
    $stmt = my_mysqli_prepare($dbc, $query);
    my_mysqli_stmt_bind_param($stmt, 'iiiiii', $gender, $age, $education, $area, $vote, $id);
    my_mysqli_stmt_execute($stmt);
    if (mysqli_stmt_affected_rows($stmt)!=1){
        print"<p style='color:red; font-size:x-large'>Σφάλμα συστήματος</p>\n";
    }else{
        print"<p style='text-align:left; margin-left:5px;'><a href='index.html'><img id='home' src='images/home.png'></a></p>";
        print"<div id='container'>";
        print"<h2>Ευχαριστούμε πολύ για τη συμμετοχή σας!!!</h2>\n";
        print"<h2>Oι απαντήσεις σας καταχωρήθηκαν!!!</h2>\n";
        print"<h2>Για να δείτε τα αποτελέσματα, πατήστε <a style='color:blue' href='results.php?q=$id' id='a01'>εδώ</a></h2><br>\n";
        print"</div>";
    }
    }           
}         
        
             
       


    ?>

</body>
</html>