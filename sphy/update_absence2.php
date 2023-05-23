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
      if(!$reason=filter_input(INPUT_POST,'aitia')){
        $errors[]='Παρακαλώ εισάγετε αιτία απουσίας';
    }
    if(!$date=filter_input(INPUT_POST,'date')){
        $errors[]='Παρακαλώ εισάγετε ημέρα';
    }
        if(!empty($errors)){
            print_error_messages($errors);
        }else{
            require_once('../sphy137-files/mysqli_connect3.php');
            $query = "UPDATE apousies set reason=?  WHERE idstudent=? and date=?";
        $stmt = my_mysqli_prepare($dbc, $query);

        my_mysqli_stmt_bind_param($stmt, 'sis', $reason, $am, $date);
        my_mysqli_stmt_execute($stmt);
        if (my_mysqli_stmt_affected_rows($stmt) == 1) {
            print "<p style='color:green'>Η απουσία άλλαξε επιτυχώς!</p>\n";
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

<div class="fixed-bottom">
    <app-root class="mb-auto"></app-root>
    <footer class="container-fluid text-light py-3">
      <div id="copyright">
        <span class="pull-right copyright">&copy; 2021 ΣΠΗΥ 137.</span>
      </div>
    </footer>
  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>