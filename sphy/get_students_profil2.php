<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>



<header class="page-header header container-fluid">
<div class="overlay"></div><br><br>



<div class="wrapper fadeInDown">
  <div id="formContent"><br>
    
    <br>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_GET['q'])) {
            $am=$_GET['q'];
          }elseif(isset($_POST['am'])){
            $am=$_POST['am'];}
        require_once('../sphy137-files/mysqli_connect3.php');
        $query = "select distinct id, rank, firstname, lastname, series, files
        from students where id=$am";
          

        $stmt=mysqli_prepare($dbc,$query);
        $r=mysqli_stmt_execute($stmt);
        if($r){
          
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt,  $am, $rank, $fname, $lname, $series, $files);
            if (my_mysqli_stmt_num_rows($stmt) == 1) {
              while(mysqli_stmt_fetch($stmt)){
                print"<div><br><br>
                <table border='5' style='width:100%;>
                
                <tr style='font-size: x-large;'>
                    <td colspan='5' style='text-align:center;'></td>
                </tr>
              <tr> 
                  <th style='text-align:center;'>ΑM</th>
                  <th style='text-align:center;'>ΒΑΘΜΟΣ</th>         
                  <th style='text-align:center;'>ΟΝΟΜΑ</th> 
                  <th style='text-align:center;'>ΕΠΩΝΥΜΟ</th> 
                  <th style='text-align:center;'>ΣΕΙΡΑ</th>

              </tr>\n";

              if($files!='null'&&$files!=null){
                $search_dir = 'img';
                $contents = scandir($search_dir);
                $fs_item = $search_dir . '/' . $files;
              
              print"<div class='fadeIn first'>
  <img src='img/$files' id='icon' alt='User Icon' /><br><br>";
  print"<a href='infoto.php?q=$am'>Αλλαγή φωτογραφίας</a><br><br>";
              }else{
                print"<div class='fadeIn first'>
  <img src='img/profil.jpg' id='icon' alt='User Icon' /><br><br>
  <a href='infoto.php?q=$am'>Προσθήκη φωτογραφίας</a><br><br>";
              }
                print"<tr>
                <th style='text-align:center;'>$am</th> 
                <th style='text-align:center;'>$rank</th>       
                <th style='text-align:center;'>$fname</th> 
                <th style='text-align:center;'>$lname</th>  
                <th style='text-align:center;'>$series</th> 
                </tr>";
                }print"</table><br>";   
                $query2 = "select count(*) from apousies where idstudent=$am";
                $stmt2=mysqli_prepare($dbc,$query2);
                $r2=mysqli_stmt_execute($stmt2);
                if($r2){
                mysqli_stmt_store_result($stmt2);
                mysqli_stmt_bind_result($stmt2,  $cnt);
                while(mysqli_stmt_fetch($stmt2)){
                  print"<p style='font-size:large'>Σύνολο απουσιών: <a href='get_students_absences.php?q=$am'>$cnt</a></p>\n";
                }
                }
            }else{
                print"<p style='color:red; font-size:xx-large' >Δεν βρέθηκε μαθητής με ΑΜ $am</p>\n";
                print"<form action='' method='post'>
                <p>ΑΦΜ:<br>
                <input type='text' name='am' maxsize='100'><br>
                <p><input type='submit' name='submit' value='ΕΠΙΛΟΓΗ'></p>
                </form>";
            }}
            
          }             

        ?>

</div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>