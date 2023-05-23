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
    if(isset($_GET['q'])) {
        $am=$_GET['q'];
      }elseif(isset($_POST['afm'])){
        $am=$_POST['am'];}
        require_once('../sphy137-files/mysqli_connect3.php');

         $query = "select distinct s.id, s.rank, s.firstname,s.lastname, s.series, a.date, a.reason from apousies a inner join students s on s.id=a.idstudent
          where s.id=$am order by a.date";

        $stmt=mysqli_prepare($dbc,$query);
        $r=mysqli_stmt_execute($stmt);


if($r){
    
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $am, $rank, $fname, $lname, $series, $date, $reason);

       

    $cnt=0;
        while(mysqli_stmt_fetch($stmt)){
            if($cnt==0){
            print"
        <table id='table_id' class='display' border='5' style='width:100%;>
        <td colspan='4' style='text-align:center;'><h3>Απουσίες $rank $fname $lname (AM:$am) </h3></td>
       <tr>
           <th style='text-align:center;'>A/A</th> 
           <th style='text-align:center;'>ΗΜΕΡΟΜΗΝΙA ΑΠΟΥΣΙΑΣ</th>
           <th style='text-align:center;'>ΑΙΤΙΑ ΑΠΟΥΣΙΑΣ</th>  
        </tr>
           <tbody>";
        }
            $year=date('Y',strtotime($date));
            $month=date('m',strtotime($date));
            $day=date('d',strtotime($date));
            $cnt++;
        print"<p><tr>  
        <th style='text-align:center;'>$cnt</th>
        <th style='text-align:center;'>$day-$month-$year</th>
        <th style='text-align:center;'>$reason</th> 
        </tr>";
    }
    print"</tbody>";
    print"<p></table>\n";
}         

?>

</div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>