<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description"><br><br><br><br><br><br>
    <h1>Kαταχωρήστε τα παρακάτω στοιχεία</h1><br><br><br><br>
    
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
        if(!$rank=filter_input(INPUT_POST,'rank', FILTER_SANITIZE_STRING)){
            $errors[]='Παρακαλώ εισάγετε βαθμό';
        }
        if(!$firstname=filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING)){
            $errors[]='Παρακαλώ εισάγετε όνομα';
        }
        if(!$lastname=filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_STRING)){
            $errors[]='Παρακαλώ εισάγετε επώνυμο';
        }
        if(!$series=filter_input(INPUT_POST,'series')){
            $errors[]='Παρακαλώ εισάγετε σειρά';
        }
        if(!$aitia=filter_input(INPUT_POST,'aitia')){
            $errors[]='Παρακαλώ εισάγετε αιτία απουσίας';
        }
        if(!empty($errors)){
            print_error_messages($errors);
        }else{
        //$date=date($year-$month-$day);
        $date=filter_input(INPUT_POST, 'date');
        //$date=date_format($date,"Y-m-d");
        require_once('../sphy137-files/mysqli_connect3.php');
        $query='insert into apousies (idstudent, rank, firstname, lastname, series, date, reason, files)
            values (?,?,?,?,?,?,?, "null")';
            $stmt=mysqli_prepare($dbc, $query);
            mysqli_stmt_bind_param($stmt, 'isssiss', $am, $rank, $firstname, $lastname, $series, $date, $aitia);
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt)!=1){
                print"<p style='color:red;'>Σφάλμα συστήματος</p>\n";
            }else{
                print "<p style='color:green;'> Η απουσία καταχωρήθηκε!!!</p>\n";
            }
        }
    }  
  ?>



  <form action="" method="post">
<p>ΑΜ:<br>
<input type="text" name="am" maxsize="100" style="width:250px; text-align:center">
<p>Βαθμός:<br>
<input type="text" name="rank" maxsize="100" style="width:250px; text-align:center">
<p>Όνομα:<br>
<input type="text" name="firstname" maxsize="100" style="width:250px; text-align:center"><br>
<p>Επώνυμο:<br>
<input type="text" name="lastname" maxsize="100" style="width:250px; text-align:center"><br>
<p>Σειρά:<br>
<input type="number" name="series" size="5" min="128" max="141" value="137" style="width:250px; text-align:center"></p>
<p>Aιτία απουσίας:<br>
<select name='aitia' style="width:250px; text-align:center" required>
            <option value=''>Επιλέξτε ένα</option>
            <option value='ασθένεια'>ΑΣΘΕΝΕΙΑ</option>
            <option value='απαλλαγή'>ΑΠΑΛΛΑΓΗ</option>>
            <option value='άδεια'>ΑΔΕΙΑ</option>
            <option value='άλλο'>ΑΛΛΟ</option>
            </select>
<p>Ημέρα απουσίας: <br><input type='date' name='date' size='5' min='1' max='31' value='1' style='width:250px; text-align:center'></p>
<p><input type="submit" name="submit" value="ΚΑΤΑΧΩΡΗΣΗ"></p>
</form>

  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>