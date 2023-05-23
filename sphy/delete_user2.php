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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors=[];
        if(!$am=filter_input(INPUT_POST,'am')){
            $errors[]='Παρακαλώ εισάγετε ΑΜ';
        }
        if(!empty($errors)){
          print_error_messages($errors);
          print"<br>
          <form action='' method='post'>
        <p>ΑΜ:<br>
        <input type='text' name='am' maxsize='100' style='width:250px'><br>
        <p><input type='submit' name='submit' value='ΕΠΙΛΟΓΗ'></p>
        </form>";
            
        }else{
        require_once('../sphy137-files/mysqli_connect3.php');
        $query = "select distinct s.id, s.rank, s.firstname, s.lastname, s.series, u.uname
        from students s inner join users u on u.am=s.id where s.id=$am";
          

        $stmt=mysqli_prepare($dbc,$query);
        $r=mysqli_stmt_execute($stmt);
        if($r){
          
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt,  $am, $rank, $fname, $lname, $series, $uname);
            if (my_mysqli_stmt_num_rows($stmt) == 1) {
              while(mysqli_stmt_fetch($stmt)){
                print"<form action='delete_user3.php' method='post'>";
        print"<p>ΑΜ:<br>
        <input type='text' name='id' value='$am' maxsize='100' min='1' style='width:250px; text-align:center' readonly><br>
        <p>Βαθμός:<br>
        <input type='text' name='rank' value='$rank'style='width:250px; text-align:center' readonly><br>
        <p>Όνομα:<br>
        <input type='text' name='firstname' value='$fname' maxsize='100' style='width:250px; text-align:center' readonly><br>
        <p>Επώνυμο:<br>
        <input type='text' name='lastname' value='$lname'  maxsize='100' style='width:250px; text-align:center' readonly><br>
        <p>Σειρά:<br>
        <input type='text' name='series' size='5' min='128' max='141' value='$series' style='width:250px; text-align:center' readonly></p>
        <p>Username:<br>
        <input type='text' name='uname' size='5' min='128' max='141' value='$uname' style='width:250px; text-align:center'></p>
        <input type='submit' name='submit' value='ΟΡΙΣΤΙΚΗ ΔΙΑΓΡΑΦΗ'>
        </form>";

              
                }
                
            }else{
                print"<p style='color:red'>Δε βρέθηκε χρήστης με ΑΜ $am";
                print"<form action='delete_user2.php' method='post'>
                <input type='text' name='am' maxsize='100' style='width:380px; height:50px;'' placeholder='AM'><br><br>
                <p><input type='submit' name='submit' value='ΕΠΙΛΟΓΗ'></p>
                </form>";
            }}
            
          }}              

        ?>

</div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>