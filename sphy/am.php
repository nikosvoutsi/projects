<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
//check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div><br><br>


<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <h1>Επιλέξτε το ΑΜ του Σπουδαστή για να δείτε τις απουσίες</h1>

<form action="absperstudent.php" method="post"> 
<input type='text' id='am' name='am' placeholder=AM oninput="this.form.submit();" style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234) '><br><br>
</form>
<br>
<div id="txtHint"></div>
  </div>
</div>
</form>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>