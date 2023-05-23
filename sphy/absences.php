<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description">
    <h1> Επιλέξτε απουσίες ανα:</h1><br>
    
</div><br>


<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    
    <a  href="day.php"><input type="button" name="button"value="Ημερα"  style="font-size: 13pt; height: 40px; width:280px; text-align:center;"></a><br>
    <a  href="between.php"><input type="button" name="button"value="Χρονικο διαστημα" style="font-size: 13pt; height: 40px; width:280px; text-align:center;"></a><br>
    <a  href="month.php"><input type="button" name="button"value="Μηνα" style="font-size: 13pt; height: 40px; width:280px; text-align:center;"></a><br>
    <a  href="series.php"><input type="button" name="button"value="Εκπαιδευτικη σειρα" style="font-size: 13pt; height: 40px; width:280px; text-align:center;"></a><br>
    <a  href="am.php"><input type="button" name="button"value="Mαθητη" style="font-size: 13pt; height: 40px; width:280px; text-align:center;"></a><br>

  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>