<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description"><br><br>
    <h1>Προσθέστε AM για καταχώσηση απουσίας</h1>
    
</div><br><br><br><br>


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
        $query="select id, rank, firstname, lastname, series from students where id=$am";
        $stmt=mysqli_prepare($dbc, $query);
        $r=mysqli_execute($stmt);
        if($r){
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $am, $rank, $firstname,$lastname, $series);
        if (my_mysqli_stmt_num_rows($stmt) == 1) {
        while(mysqli_stmt_fetch($stmt)){
        print"<form action='insert_absence2.php' method='post'>";
        print"<p>ΑΜ:<br>
        <input type='number' name='id' value='$am' maxsize='100' min='1' style='width:250px; text-align:center'><br>
        <p>Βαθμός:<br>
        <input type='text' name='rank' value='$rank'  style='width:250px;'><br>
        <p>Όνομα:<br>
        <input type='text' name='firstname' value='$firstname' maxsize='100' style='width:250px;'><br>
        <p>Επώνυμο:<br>
        <input type='text' name='lastname' value='$lastname'  maxsize='100' style='width:250px;'><br>
        <p>Σειρά:<br>
        <input type='number' name='series' size='5' min='128' max='141' value='$series' style='width:250px; text-align:center'></p>
        <p>Aιτία απουσίας:<br>
<select name='aitia' style='width:250px; text-align:center' required>
            <option value=''>Επιλέξτε ένα</option>
            <option value='ασθένεια'>ΑΣΘΕΝΕΙΑ</option>
            <option value='απαλλαγή'>ΑΠΑΛΛΑΓΗ</option>>
            <option value='άδεια'>ΑΔΕΙΑ</option>
            <option value='άλλο'>ΑΛΛΟ</option>
            </select>
<p>Ημέρα απουσίας: <br><input type='date' name='date' size='5' min='1' max='31' value='1' style='width:250px; text-align:center'></p>
<p><input type='submit' name='submit' value='ΚΑΤΑΧΩΡΗΣΗ'></p>


        </form>";
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>

<?php
ob_end_flush(); // Αποστολή του buffer στον browser και απενεργοποίηση output buffering
?>