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


<?php
if(isset($_POST['am'])){
$am=$_POST['am'];}
else{$am=$_GET['q'];}
require_once('../sphy137-files/mysqli_connect2.php');

$query2 = "select s.idStudent,s.vathmos,s.firstname,s.lastname,p.date, p.idhour, k.mathima, kat.katastasi from apousies a inner join student s on s.idStudent=a.idstudent 
inner join programm p on p.id=a.idprog inner join hours h on p.idhour=h.idhour inner join days d on p.idday=d.idday 
inner join kathigitis k on p.idprof=k.idprof inner join katastasi kat on kat.idkatastasi=a.idkatastasi where s.idstudent=? and a.idkatastasi<>1";

$stmt=mysqli_prepare($dbc,$query2);
mysqli_stmt_bind_param($stmt,'i',$am);
$r=mysqli_stmt_execute($stmt);


if($r){
    
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $am,$vathmos, $fname, $lname,$date,$hour,$mathima,$katastasi);

    require_once('../sphy137-files/mysqli_connect2.php');
    $query3 = "select s.idStudent,s.vathmos,s.firstname,s.lastname,p.date, p.idhour, k.mathima, kat.katastasi from apousies a inner join student s on s.idStudent=a.idstudent 
inner join programm p on p.id=a.idprog inner join hours h on p.idhour=h.idhour inner join days d on p.idday=d.idday 
inner join kathigitis k on p.idprof=k.idprof inner join katastasi kat on kat.idkatastasi=a.idkatastasi where s.idstudent=? and a.idkatastasi<>1";

$stmt3=mysqli_prepare($dbc,$query3);
mysqli_stmt_bind_param($stmt3,'i',$am);
$r3=mysqli_stmt_execute($stmt3);
if($r3){
    mysqli_stmt_store_result($stmt3);
    mysqli_stmt_bind_result($stmt3, $am3,$vathmos3, $fname3, $lname3,$date3,$hour3,$mathima3,$katastasi3);
    if(mysqli_stmt_fetch($stmt3)){



    print"
    <table id='table_id' class='display' border='5' style='width:100%;>
    <td colspan='4' style='text-align:center;'><h3>Απουσίες Μαθητή $vathmos3 $fname3 $lname3 (AM:$am3)</h3></td>";
}
}
    print"<thead>
       <tr> 
           <th style='text-align:center;'>ΗΜΕΡΟΜΗΝΙΑ</th> 
           <th style='text-align:center;'>ΩΡΑ</th>
           <th style='text-align:center;'>ΜΑΘΗΜΑ</th> 
           <th style='text-align:center;'>KATAΣΤΑΣΗ</th>
           </tr>
           </thead>
           <tbody>";
        while(mysqli_stmt_fetch($stmt)){
        print"<p><tr>  
        <th style='text-align:center;'>$date</th> 
        <th style='text-align:center;'>$hour</th>
        <th style='text-align:center;'>$mathima</th> 
        <th style='text-align:center;'>$katastasi</th>
        </tr>";
    }
    print"</tbody>";
    }else{
        print"<p style='color:red'>Σφάλμα συστήματος</p>\n";
    }
    print"<p></table>\n";
          

?>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );

window.$ = window.jquery = require('./node_modules/jquery');
window.dt = require('./node_modules/datatables.net')();
window.$('#table_id').DataTable();



</script>
<br>
  </div>
</div>
</form>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

