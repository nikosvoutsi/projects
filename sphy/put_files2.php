<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div>




<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $am=filter_input(INPUT_POST, 'am');
    $date=filter_input(INPUT_POST, 'date');

        foreach ($_FILES["files"]["error"] as $key[$am] => $error) {


            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["files"]["tmp_name"][$key[$am]];
                
                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["files"]["name"][$key[$am]]);
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                if ($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $ext == 'pdf') {
                move_uploaded_file($tmp_name, "../uploads/$name");
                require_once('../sphy137-files/mysqli_connect3.php');                  
                          $query = "UPDATE apousies SET files=? WHERE idstudent=? and date=?";
                          $stmt = mysqli_prepare($dbc, $query);
                          mysqli_stmt_bind_param($stmt, 'sis', $name, $am, $date);
                          mysqli_stmt_execute($stmt);
    
                          //if (mysqli_stmt_affected_rows($stmt) ==1) {
                           // print "<p style='color:green'> Επιτυχής Καταχώρηση</p>\n";
                           // print "<p style='color: green;'>Το αρχείο ανέβηκε επιτυχώς!</p>\n";
                          //}
                          //}//else {echo 'Not Valid type of file!!';} 
                    
                    if (mysqli_stmt_affected_rows($stmt) >=1) {
                      print "<br><br><br><p style='color:green; font-size:large'> Επιτυχής Καταχώρηση</p>\n";
    
                    } else {
                      print "<p class='error'>Η εγγραφή δεν ενημερώθηκε!</p>\n";
                    }
                  }else {print "<p style='color:red'>Not valid filetype</p>\n";}
                  }
      }
     }
             
            
               
?>