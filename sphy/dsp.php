<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div><br><br>


<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <?php
    print "<p style='font-size:x-large;color:blue'>ΣΧΟΛΗ ΠΡΟΓΡΑΜΜΑΤΙΣΤΩΝ ΗΛΕΚΤΡΟΝΙΚΩΝ ΥΠΟΛΟΓΙΣΤΩΝ</p>\n";
    print "<p style='font-size:x-large;color:red'>ΓΡΑΦΕΙΟ ΕΚΠΑΙΔΕΥΣΕΩΣ</p><br>\n";
    print "<p style='font-size:large'>ΕΔΩ ΜΠΟΡΕΙΤΕ ΝΑ ΔΙΑΧΕΙΡΙΣΤΕΙΤΕ ΤΙΣ ΕΚΠΑΙΔΕΥΤΙΚΕΣ ΣΕΙΡΕΣ, ΤΑ ΣΤΟΙΧΕΙΑ ΤΩΝ ΜΑΘΗΤΩΝ ΚΑΙ ΤΙΣ ΑΠΟΥΣΙΕΣ ΤΟΥΣ.</p><br>\n";
    ?>


  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>