<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>

<style>
  div#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 50%;
  max-width: 700px;
  max-height: 30%;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
  overflow-y: auto;
  overflow-x: auto;
  position: relative;
  width:1600px;
  height:600px;
}
</style>


<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description">
    <h1>Eπιλέξτε AM και Ημερομηνία </h1>
    
</div>


<div class="wrapper fadeInDown"><br><br>
  <div id="formContent" style="width:1600px">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <?php
    if(isset($_POST['submit'])) {
        $errors=[];
        if(!$am=filter_input(INPUT_POST,'am')){
            $errors[]='Παρακαλώ εισάγετε ΑΜ';
        }
        if(!$date=filter_input(INPUT_POST, 'date')){
          $errors[]='Παρακαλώ εισάγετε ημερομηνία απουσίας';
      }
        if(!empty($errors)){
            print_error_messages($errors);
        }else{
        $date=filter_input(INPUT_POST, 'date');
        require_once('../sphy137-files/mysqli_connect3.php');
        $query="select s.id, s.rank, s.firstname, s.lastname, s.series, a.date, a.reason, a.files from students s inner join apousies a on a.idstudent=s.id 
        where id=$am and date='$date' and a.reason<>'παρων'";
        $stmt=mysqli_prepare($dbc, $query);
        $r=mysqli_execute($stmt);
        if($r){
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $am, $rank, $lastname,$firstname, $series, $date, $reason, $files);
        if (my_mysqli_stmt_num_rows($stmt) == 1) {
            print"<form action='put_files2.php' method='post' enctype='multipart/form-data'>
            <table border='5' style='width:100%'>
            
            <tr style='font-size: x-large;'>
                <td colspan='8'><b>ΣΤΟΙΧΕΙΑ ΑΠΟΥΣΙΑΣ</b></td>
            </tr>
           <tr> 
               <th>ΑM</th>        
               <th>ΒΑΘΜΟΣ</th>   
               <th>ΟΝΟΜΑ</th> 
               <th>ΕΠΩΝΥΜΟ</th>
               <th>ΣΕΙΡΑ</th> 
               <th>ΗΜΕΡΟΜΗΝΙΑ</th> 
               <th>ΑΙΤΙΑ ΑΠΟΥΣΙΑΣ</th> 
               <th>ΕΠΙΛΟΓΗ ΑΡΧΕΙΟΥ</th>
    
           </tr>\n";
            while(mysqli_stmt_fetch($stmt)){
            print"<p><tr> 
            <td>$am</td>        
            <td>$rank</td>  
            <td>$firstname</td> 
            <td>$lastname</td> 
            <td>$series</td> 
            <td>$date</td> 
            <td>$reason</td> 
            <td>
            <input type='hidden' name='am' value='$am'>
            <input type='hidden' name='date' value='$date'>       
    <input type='hidden' name='MAX_FILE_SIZE' value='3000000'>
    <p><input type='file' name='files[$am]'></p></td>
            </tr>";
            
            }
        }else{
            print"<p style='color:red'>Δεν βρέθηκε απουσία με τα συγκεκριμένα στοιχεία </p>\n";
            print"<form action='' method='post'>
            <p>ΑΜ:<br>
            <input type='text' name='am' maxsize='100' style='width:250px;'><br>
            <p>Ημέρα απουσίας:<br> <input type='date' name='date' size='5' min='1' max='31' value='1'  style='width:250px;'></p>
            <p><input type='submit' name='submit' value='επιλογΗ'></p>
            </form>";
        exit();
        }
            print"<p></table>\n";
            
            
            
                print"<p><input type='submit' name='submit' value='υποβολη εγγραφου'></form></p>\n";
                exit();
           
      }else{
        print"<p style='color:red'>Δεν βρέθηκε απουσία με τα συγκεκριμένα στοιχεία </p>\n";
   
      }

    }
}
    
    
  
    
  ?>



  <form action="" method="post">
<p>ΑΜ:<br>
<input type="text" name="am" maxsize="100" style="width:250px;"><br>
<p>Ημέρα απουσίας:<br> <input type="date" name="date" size="5" min="1" max="31" value="1"  style="width:250px;"></p>
<p><input type="submit" name="submit" value="επιλογΗ"></p>
</form>

  </div>
</div>


</header>

<div class="fixed-bottom">
    <app-root class="mb-auto"></app-root>
    <footer class="container-fluid text-light py-3">
      <div id="copyright">
        <span class="pull-right copyright">&copy; 2021 ΣΠΗΥ 137.</span>
      </div>
    </footer>
  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>