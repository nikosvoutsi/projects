<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>

<style>
  input[type=button]:hover{
    background-color: rgb(101, 255, 255);
  }
</style>


<header class="page-header header container-fluid">
<div class="overlay"></div><br><br>

<div class="description"><br><br><br>
    <h1> Επιλέξτε μία από τις παρακάτω ενέργειες:</h1><br>
    
</div><br><br>


<div class="wrapper fadeInDown">
  <div id="formContent"><br>
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div><br>
    <a  href="profil.php"><input type="button" name="button"value="Aναζητηση" style="font-size: 13pt; height: 45px; width:280px; text-align:center; background-color:darkcyan"></a><br>
    <a  href="insert_student.php"><input type="button" name="button"value="Προσθηκη" style="font-size: 13pt; height: 45px; width:280px; text-align:center; background-color:darkcyan"></a><br>
    <a  href="update_student.php"><input type="button" name="button"value="Tροποποιηση" style="font-size: 13pt; height: 45px; width:280px; text-align:center; background-color:darkcyan"></a><br>
    <a  href="delete_student.php"><input type="button" name="button"value="Διαγραφη" style="font-size: 13pt; height: 45px; width:280px; text-align:center; background-color:darkcyan"></a><br>
    

  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>