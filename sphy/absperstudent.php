<?php
ob_start(); // Enable output buffering
session_start();
include('includes/helper_functions.php');
?>

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Γραφείο Εκπαιδεύσεως</title>
    <style type="text/css" media="screen">
    .error {
    color: red;
    }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/concise.min.css">
    <link rel="stylesheet" href="css/masthead copy.css">

  </head>
  <body>

  <nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="dsp.php"><img src="img/background.png" id="icon1" alt="User Icon" /></a>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml-auto" id="links">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown dropdown" >
                    <a style='font-size:x-large' class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Εφαρμογές<button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                    aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
                    class="fas fa-bars fa-1x"></i></span></button>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="students.php">Μαθητές</a>
                        <a class="dropdown-item" href="series2.php">Εκπαιδευτικές σειρές</a>
                        <a class="dropdown-item" href="delete_series.php">Διαγραφή εκπαιδευτικής σειράς</a>
                        <a class="dropdown-item" href="edit.php">Tροποποίηση παρουσιών/απουσιών</a>
                        <a class="dropdown-item" href="put_files.php">Καταχώρηση δικαιολογητικών</a>
                        <a class="dropdown-item" href="see_files.php">Eμφάνιση δικαιολογητικών</a>
                        <a class="dropdown-item" href="absences.php">Απουσίες</a>
                        <a class="dropdown-item" href="logout.php">Αποσύνδεση</a>
                    </div>
                </li>
                
                </li>

            </ul>
        </div>
</nav>




<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description">
    <h1>Eπιλέξτε ΑΜ</h1>
    
</div>


<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $am=filter_input(INPUT_POST,'am');
        require_once('../sphy137-files/mysqli_connect3.php');
        $query="select idstudent, rank, firstname, lastname, series, date, reason from apousies where idstudent=$am and reason<>'ΠΑΡΩΝ'";
        $stmt=mysqli_prepare($dbc, $query);
        $r=mysqli_execute($stmt);
        if($r){
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id, $rank, $firstname, $lastname, $series, $date, $reason);
        print"<p>
        <table border='5' style='width:100%;>
        
        <tr style='font-size: x-large;'>
            <td colspan='7'><b>AΠΟΥΣΙΕΣ ΜΑΘΗΤΩΝ</b></td>
        </tr>
       <tr> 
           <th>ΑM</th>        
           <th>ΒΑΘΜΟΣ</th>   
           <th>ΟΝΟΜΑ</th> 
           <th>ΕΠΩΝΥΜΟ</th>
           <th>ΣΕΙΡΑ</th> 
           <th>ΗΜΕΡΟΜΗΝΙΑ</th> 
           <th>ΑΙΤΙΑ ΑΠΟΥΣΙΑΣ</th> 

       </tr>\n";
        while(mysqli_stmt_fetch($stmt)){
        print"<p><tr> 
        <th>$id</th>        
        <th>$rank</th>  
        <th>$firstname</th> 
        <th>$lastname</th> 
        <th>$series</th> 
        <th>$date</th> 
        <th>$reason</th> 
        </tr>";
       }
    }else{
        print"<p>Σφάλμα συστήματος</p>\n";
    }
    print"<p></table>\n";
    exit();
    }   
  ?>
  <form action="" method="post">
  <p>ΑΜ: <input type="number" name="am" size="5" min="1" max="100000" value="1"></p>
<p><input type="submit" name="submit" value="Ευρεση απουσιων"></p>
</form>

  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>