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

    <?php


require_once('../sphy137-files/mysqli_connect3.php');

$query2="select distinct id, rank, firstname, lastname, series
from students where id=?";

$stmt=mysqli_prepare($dbc,$query2);
mysqli_stmt_bind_param($stmt,'i',$_GET['q']);
$r=mysqli_stmt_execute($stmt);


if($r){
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $am, $rank, $fname, $lname, $series);

    while(mysqli_stmt_fetch($stmt)){

    print"<form action='infoto2.php' method='post' enctype='multipart/form-data'>
    <p>AM:<br><input type='text' id='am' name='am' placeholder=$am value=$am style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234) 'readonly></p>
    <p>Bαθμός:<br> <input type='text' id='lname' name='phone' placeholder=$rank value=$rank style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234) 'readonly></p>
    <p>Όνομα:<br><input type='text' id='fname' name='fname' placeholder=$fname value=$fname style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234) 'readonly></p>
    <p>Επώνυμο:<br><input type='text' id='lname' name='lname' placeholder=$lname value=$lname style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234) 'readonly></p>
    <p>Σειρά:<br><input type='text' id='lname' name='email' placeholder=$series value=$series style='font-size: 13pt; height: 40px; width:280px; text-align:center; background-color:rgb(236, 234, 234) 'readonly></p>
    <input type='hidden' name='MAX_FILE_SIZE' value='3000000'>
    <p>Επιλογή φωτογραφίας:<br><br><input type='file' name='files[$am]'></p>
    <input type='submit' name='submit' value='Προσθηκη' style='font-size:15pt'>
    </form>";



   }
}else{
    print"<p>Σφάλμα συστήματος ΣΤΟ SELECT</p>\n";
}
print"<p></table>\n";



?>

</div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>