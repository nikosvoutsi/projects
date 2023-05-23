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
                        <a class="dropdown-item" href="users.php">Xρήστες</a>
                        <a class="dropdown-item" href="logout.php">Αποσύνδεση</a>
                    </div>
                </li>
                
                </li>

            </ul>
        </div>
</nav>
