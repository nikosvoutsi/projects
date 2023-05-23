<?php

function is_loggedin()
{
    if (isset($_SESSION['username']) && isset($_SESSION['agent']) && 
            $_SESSION['agent'] == sha1($_SERVER['HTTP_USER_AGENT']) ) {
        return true;
    } else {
        return false;
    } 
}

function check_session()
{
    if (!is_loggedin()) {
        header("Location: error.php");
        exit();
    }
}

function print_system_error()
{
    print "<h1>Σφάλμα Συστήματος</h1>\n";
    print "<p class='error'>Δεν ήταν δυνατή η ενέργεια αυτή λόγω σφάλματος συστήματος.
    Εργαζόμαστε για την αποκατάστασή του!</p>\n";
}

function print_error_messages($errors)
{
    if (!empty($errors)) {
        print "<p class='error'>Εντοπίστηκε πρόβλημα!\n";
        print "<ul class='error'>\n";
        foreach ($errors as $message) {
            print "<li> - $message!</li>\n";
        }
        print "</ul></p>\n";
    }
}


function my_mysqli_prepare($dbc, $q)
{
    if (!$stmt = mysqli_prepare($dbc, $q)) {
        print_system_error();
        //debugging if necessary
        die('mysqli_prepare() failed: ' . mysqli_error($dbc));
    }
    return $stmt;
}

function my_mysqli_stmt_bind_param($stmt, $type, ...$params)
{
    if (!$r = mysqli_stmt_bind_param($stmt, $type, ...$params)) {
        print_system_error();
        die('mysqli_stmt_bind_param() failed');
    }
    return $r;
}



function my_mysqli_stmt_bind_result($stmt, &...$results)
{
    if (!$r = mysqli_stmt_bind_result($stmt, ...$results)) {
        print_system_error();
        die('mysqli_stmt_bind_result() failed');
    }
    return $r;
}

function my_mysqli_stmt_execute($stmt)
{
    if (!$r = mysqli_stmt_execute($stmt)) {
        print_system_error();
        die('mysqli_stmt_execute() failed: ' . mysqli_stmt_error($stmt));
    }
    return $r;
}

function my_mysqli_stmt_store_result($stmt)
{
    if (!$r = mysqli_stmt_store_result($stmt)) {
        print_system_error();
        die('mysqli_stmt_store_result() failed: ' . mysqli_stmt_error($stmt));
    }
    return $r;    
}

function my_mysqli_stmt_fetch($stmt)
{
    $r = mysqli_stmt_fetch($stmt);
    if ($r === false) {
        print_system_error();
        die('mysqli_stmt_fetch() failed: ' . mysqli_stmt_error($stmt));
    }
    return $r;    
}

function my_mysqli_stmt_num_rows($stmt)
{
    $r = mysqli_stmt_num_rows($stmt);
    if ($r < 0) { // According to PHP manual, only values >= 0 are possible
        print_system_error();
        die('mysqli_stmt_num_rows() failed: ' . mysqli_stmt_error($stmt));
    }
    return $r;    
}

function my_mysqli_stmt_affected_rows($stmt)
{
    $r = mysqli_stmt_affected_rows($stmt);
    if ($r < 0) { 
        print_system_error();
        die('mysqli_stmt_affected_rows() failed: ' . mysqli_stmt_error($stmt));
    }
    return $r;    
}

?>