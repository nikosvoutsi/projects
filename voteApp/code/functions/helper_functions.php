<?php

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