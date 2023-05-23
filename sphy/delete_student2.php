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
    <link rel="stylesheet" href="css/masthead.css">

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

<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors=[];
        if(!$am=filter_input(INPUT_POST,'id')){
            $errors[]='Παρακαλώ εισάγετε ΑΜ';
        }
        if(!$rank=filter_input(INPUT_POST,'rank', FILTER_SANITIZE_STRING)){
          $errors[]='Παρακαλώ εισάγετε βαθμό';
      }
      if(!$firstname=filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_STRING)){
          $errors[]='Παρακαλώ εισάγετε όνομα';
      }
      if(!$lastname=filter_input(INPUT_POST,'lastname', FILTER_SANITIZE_STRING)){
          $errors[]='Παρακαλώ εισάγετε επώνυμο';
      }
      if(!$series=filter_input(INPUT_POST,'series')){
          $errors[]='Παρακαλώ εισάγετε εκπαιδευτική σειρά';
      }
        include('includes/helper_functions.php');
        if(!empty($errors)){
            print_error_messages($errors);
        }else{
            require_once('../sphy137-files/mysqli_connect3.php');
            $query = "UPDATE students set status=? where id=?";
            $stmt = my_mysqli_prepare($dbc, $query);
            my_mysqli_stmt_bind_param($stmt, 'si', 'del', $am);
            my_mysqli_stmt_execute($stmt);
            if (my_mysqli_stmt_affected_rows($stmt) == 1) {
                print "<p style='color:green'>O μαθητής με ΑΜ $am διαγράφηκε!</p>\n";
            } else {
                print_system_error();
            }
            mysqli_stmt_close($stmt);
        }
} 
    
  ?>





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