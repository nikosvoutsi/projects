<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description"><br><br>
    <h1> Επιλέξτε μία από τις παρακάτω ενέργειες:</h1><br>
    
</div><br><br><br>

<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" /><br>
    </div>


    <a  href="insert_absence1.php"><input type="button" name="button"value="Προσθηκη απουσιας" style="font-size: 13pt; height: 40px; width:380px; text-align:center;"></a><br>
    <a  href="update_absence1.php"><input type="button" name="button"value="Τροποποιηση απουσιας" style="font-size: 13pt; height: 40px; width:380px; text-align:center;"></a><br>
    <a  href="delete_absence.php"><input type="button" name="button"value="Διαγραφη απουσιας" style="font-size: 13pt; height: 40px; width:380px; text-align:center;"></a><br>



  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>