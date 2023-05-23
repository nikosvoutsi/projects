<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description">
    <h1>Προσθέστε AM για τροποποίηση</h1><br>
    
</div><br><br>


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
        if(!empty($errors)){
            print_error_messages($errors);
        }else{
        require_once('../sphy137-files/mysqli_connect3.php');
        $query="select id, rank, firstname, lastname, series from students where id=$am and status<>'del'";
        $stmt=mysqli_prepare($dbc, $query);
        $r=mysqli_execute($stmt);
        if($r){
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $am, $rank, $firstname, $lastname, $series);
        if (my_mysqli_stmt_num_rows($stmt) == 1) {
        while(mysqli_stmt_fetch($stmt)){
        print"<form action='update2.php' method='post'>";
        print"<p>ΑΜ:<br>
        <input type='number' name='id' value='$am' maxsize='100' min='1' style='width:250px; text-align:center'><br>
        <p>Βαθμός:<br>
        <input type='text' name='rank' value='$rank' style='width:250px; text-align:center'><br>
        <p>Όνομα:<br>
        <input type='text' name='firstname' value='$firstname' maxsize='100' style='width:250px; text-align:center'><br>
        <p>Επώνυμο:<br>
        <input type='text' name='lastname' value='$lastname'  maxsize='100' style='width:250px; text-align:center'><br>
        <p>Σειρά:<br>
        <input type='number' name='series' size='5' min='128' max='141' value='$series' style='width:250px; text-align:center'></p>
        <input type='hidden' name='MAX_FILE_SIZE' value='3000000'>
        <p>Επιλογή φωτογραφίας:<br>
        <input type='hidden' name='MAX_FILE_SIZE' value='300000'>
        <p><input type='file' name='the_file'></p>
        <input type='submit' name='submit' value='TΡΟΠΟΠΟΙΗΣΗ'>
        </form></div>
        </div></header>";
        exit();
        }
        
      }else{
        print"<p style='color:red'>Δεν βρέθηκε μαθητής με ΑΜ $am</p>\n";
   
      }
      
    }else{
        print"<p>Σφάλμα συστήματος</p>\n";
    }
    
    }
} 
    
  ?>
  <form action="" method="post">
<p>ΑΜ:<br>
<input type="text" name="id" maxsize="100" style="width:250px;"><br>
<p><input type="submit" name="submit" value="ΕΠΙΛΟΓΗ"></p>
</form>

  </div>
</div>


</header>


<?php
include('templates/footer.inc.php');
?>