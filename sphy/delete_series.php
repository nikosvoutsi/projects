<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description">
    <h1>Eπιλέξτε εκπαιδευτική σειρά</h1>
    
</div><br><br>


<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $series=filter_input(INPUT_POST,'series');
        require_once('../sphy137-files/mysqli_connect3.php');
        $query = "UPDATE students SET status='del' WHERE series=?";
        $stmt = my_mysqli_prepare($dbc, $query);
        my_mysqli_stmt_bind_param($stmt, 'i', $series);
        my_mysqli_stmt_execute($stmt);
        if (my_mysqli_stmt_affected_rows($stmt) >= 1) {
            print "<p style='color:green'>Η σειρά $series διαγράφηκε!</p>\n";
        } else {
            print "<p class='error'>H σειρά $series δεν βρέθηκε στη ΒΔ</p>\n";
        }
        mysqli_stmt_close($stmt);
        }  
  ?>
  <form action="" method="post"><br>
  <p>Εκπαιδευτική Σειρά: <br><input type="number" name="series" size="5" min="128" max="141" value="137" style="width:250px; text-align:center"></p>
<p><input type="submit" name="submit" value="ΔΙΑΓΡΑΦΗ"></p>
</form>

  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>