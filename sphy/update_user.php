<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div><br><br>



<div class="wrapper fadeInDown">
  <div id="formContent"><br>
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div><br>


<h3>Προσθέστε ΑΜ χρήστη</h3><br>
  <form action="update_user2.php" method="post">
<input type="text" name="am" maxsize="100" style="width:380px; height:50px;" placeholder="AM"><br><br>
<p><input type="submit" name="submit" value="ΕΠΙΛΟΓΗ"></p>
</form>

</div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>