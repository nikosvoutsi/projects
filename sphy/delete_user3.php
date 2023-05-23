<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>


<header class="page-header header container-fluid"><br>
<div class="overlay"></div>

<div class="description"><br>
    <h1>Προσθέστε τα παρακάτω στοιχεία</h1>
    
</div><br><br>


<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors=[];
        if(!$id=filter_input(INPUT_POST,'id')){
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
        if(!$uname=filter_input(INPUT_POST,'uname')){
            $errors[]='Παρακαλώ εισάγετε uname';
        }
        if(!empty($errors)){
            print_error_messages($errors);
        }else{

            require_once('../sphy137-files/mysqli_connect3.php');
      $query='delete from sphy.users where am=?';
	  $stmt=mysqli_prepare($dbc,$query);
	  //mysqli_stmt_bind_param($stmt,'sssi',$vathmos1,$fname1,$lname1,$tmima1);
	  mysqli_stmt_bind_param($stmt,'i',$id);
	  mysqli_stmt_execute($stmt);
	  if(mysqli_stmt_affected_rows($stmt) !=1) {
		  print "<p style='color:red'>Σφάλμα Συστήματος...</p>\n";
	  } else {
		  print "<p style='color:green'> O χρήστης με ΑΜ $id διαγράφηκε</p>\n";exit();
	  }
	  mysqli_stmt_close($stmt);
	  mysqli_close($dbc);
        }
    }
    print" <form action='' method='post'>
    <p>ΑΜ:<br>
    <input type='text' name='id' value='$id' maxsize='100' min='1' style='width:250px; text-align:center' readonly><br>
    <p>Βαθμός:<br>
    <input type='text' name='rank' value='$rank'style='width:250px; text-align:center' readonly><br>
    <p>Όνομα:<br>
    <input type='text' name='firstname' value='$firstname' maxsize='100' style='width:250px; text-align:center' readonly><br>
    <p>Επώνυμο:<br>
    <input type='text' name='lastname' value='$lastname'  maxsize='100' style='width:250px; text-align:center' readonly><br>
    <p>Σειρά:<br>
    <input type='text' name='series' size='5' min='128' max='141' value='$series' style='width:250px; text-align:center' readonly></p>
  <p>Username:<br>
  <input type='text' name='uname' size='5' min='128' max='141' style='width:250px; text-align:center'></p>
  <p>Password:<br>
  <input type='password' name='password1' size='5' min='128' max='141' style='width:250px; text-align:center'></p>
  <p>Επιβεβαίωση Password:<br>
  <input type='password' name='password2' size='5' min='128' max='141' style='width:250px; text-align:center'></p>
  <input type='submit' name='submit' value='ΚΑΤΑΧΩΡΗΣΗ'>
  </form>";
  ?>
 

  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>