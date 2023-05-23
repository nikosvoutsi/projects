<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description">
    <h1>Προσθέστε AM για τροποποίηση</h1>
    
</div>


<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors=[];
        if(!$am=filter_input(INPUT_POST,'id')){
            $errors[]='Παρακαλώ εισάγετε ΑΜ';
        }
        if(!$rank=filter_input(INPUT_POST,'rank', FILTER_SANITIZE_STRING)){
            $errors[]='Παρακαλώ εισάγετε βαθμό';
        }
        if(!$firstname=filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_STRING)){
            $errors[]='Παρακαλώ εισάγετε όνομα';
        }
        if(!$lastname=filter_input(INPUT_POST,'lastname', FILTER_SANITIZE_STRING)){
            $errors[]='Παρακαλώ εισάγετε επώνυμο';
        }
        if(!$series=filter_input(INPUT_POST,'series')){
            $errors[]='Παρακαλώ εισάγετε εκπαιδευτική σειρά';
        }
        include('includes/helper_functions.php');
        if(!empty($errors)){
            print"<p style='color:red'> Eντοπίστηκε πρόβλημα!!!<br> Παρακαλώ εισάγετε ΑΜ";
        }else{
          
       require_once('../sphy137-files/mysqli_connect3.php');
       $query="update students set rank=?, firstname=?, lastname=?, series=? where id=?";
       $stmt=mysqli_prepare($dbc, $query);
       mysqli_stmt_bind_param($stmt, 'sssii', $rank, $firstname, $lastname, $series, $am);
       $r=mysqli_execute($stmt);
       if($r){
          print"<p style='color:green'> Eπιτυχής τροποποίηση</p>";
      } else {
        print"<p style='color:red'>Σφάλμα συστήματος!</p>";
      }           

        }
    } 
    
  ?>
  <form action="update2.php" method="post">
<p>ΑΜ:<br>
<input type="number" name="id" min="1" value="1"><br>
<p><input type="submit" name="submit" value="ΕΠΙΛΟΓΗ"></p>
</form>

  </div>
</div>


</header>


<?php
include('templates/footer.inc.php');
?>