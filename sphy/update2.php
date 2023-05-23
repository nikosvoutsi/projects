<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>


<header class="page-header header container-fluid">
<div class="overlay"></div>

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
        if(!empty($errors)){
            print_error_messages($errors);
        }else{
            $name="null";
            if (!empty($_FILES)) { // Το $_FILES μπορεί να είναι κενό λόγω μεγέθους. (Content-Length)


                $filename1="{$_FILES['the_file']['name']}";
    
                    $name = basename($_FILES['the_file']['name']);
    
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
    
                    $tmp_name = $_FILES["the_file"]["tmp_name"];
                    if($name!=""){  
                        move_uploaded_file($tmp_name, "../uploads/$name");
                    }else{$name="null";}
                }
            require_once('../sphy137-files/mysqli_connect3.php');
            $query = "UPDATE students SET rank=?, firstname=?, lastname=?, series=?, files=? WHERE id=?";
        $stmt = my_mysqli_prepare($dbc, $query);
        my_mysqli_stmt_bind_param($stmt, 'sssisi', $rank, $firstname, $lastname, $series, $name, $am);
        my_mysqli_stmt_execute($stmt);
        if (my_mysqli_stmt_affected_rows($stmt) == 1) {
            print "<p style='color:green'>Η εγγραφή άλλαξε επιτυχώς!</p>\n";
        } else {
            print "<p class='error'>Η εγγραφή δεν ενημερώθηκε!</p>\n";
        }
        mysqli_stmt_close($stmt);
        }
} 
    
  ?>





</div>
</div>


</header>


<?php
include('templates/footer.inc.php');
?>