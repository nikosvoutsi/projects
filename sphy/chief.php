<?php
ob_start(); // Enable output buffering
session_start();
include('includes/helper_functions.php');
check_session();
?>

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Αρχηγός τμήματος</title>
    <style>
      html {
      background-color: darkcyan;
    }

     body {
      font-family: "Poppins", sans-serif;
      height: 100vh;
      background-color:darkcyan;
      background-size:100%;
      background-position: center;
      position: relative;
    }
     .wrapper {
      display: flex;
      align-items: center;
      flex-direction: column; 
      justify-content: center;
      width: 100%;
      background-color:darkcyan;
      background-size:100%;
      position: relative;
    }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/concise.min.css">
    <link rel="stylesheet" href="css/masthead copy.css">

  </head>
  <body>



  <nav class="navbar sticky-top">
    <a class="navbar-brand" href="chief.php"><img src="img/background.png" id="icon1" alt="User Icon" /></a>
        <a class="nav-link" href="logout.php"> <button type="button" class="btn btn-danger">Aποσύνδεση</button></a>
</nav>



<header class="page-header header container-fluid">
<div class="overlay"></div>


<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>
    
    <?php
    require_once('../sphy137-files/mysqli_connect3.php');
    $query="select id, rank, firstname, lastname
    from students where series=137;";
    $stmt=mysqli_prepare($dbc, $query);
    $r=mysqli_execute($stmt);
    if($r){
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id, $rank, $firstname, $lastname);
        print"<form action='' method='post' enctype='multipart/form-data'>
        <table border='5' style='width:100%'>
        
        <tr style='font-size: x-large;'>
            <td colspan='6'><b>Κατάσταση μαθητών</b></td>
        </tr>
       <tr> 
           <th>ΑM</th>        
           <th>ΒΑΘΜΟΣ</th>
           <th>ΟΝΟΜΑ</th> 
           <th>ΕΠΩΝΥΜΟ</th>   
           <th>ΚΑΤΑΣΤΑΣΗ</th> 
           <th>Επιλογή Αρχείου</th>
       

       </tr>\n";
        while(mysqli_stmt_fetch($stmt)){
        print"<p><tr> 
        <td>$id</td>        
        <td>$rank</td>  
        <td>$firstname</td> 
        <td>$lastname</td> 
        <td>
        
        <select name='select[$id]' required>
            <option value='παρών'>ΠΑΡΩΝ</option>
            <option value='ασθένεια'>ΑΣΘΕΝΕΙΑ</option>
            <option value='απαλλαγή'>ΑΠΑΛΛΑΓΗ</option>>
            <option value='άδεια'>ΑΔΕΙΑ</option>
            <option value='άλλο'>ΑΛΛΟ</option>
            </select>
    </td> 
    <td>
    <input type='hidden' name='MAX_FILE_SIZE' value='3000000'>
    <p><input type='file' name='files[$id]'></p></td>
    </tr>";
       }
    }else{
        print"<p>Σφάλμα συστήματος</p>\n";
    }
    print"<p></table>\n";
    if(isset($_POST['submit'])){ 
      $select=filter_input(INPUT_POST, 'select', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
      require_once('../sphy137-files/mysqli_connect3.php');
      foreach($select as $id=> $katastasi) {
            
               $query2='call insert_apousies(?,?)';
               $stmt2=mysqli_prepare($dbc,$query2);
               mysqli_stmt_bind_param($stmt2,'is',$id,$katastasi);
               mysqli_stmt_execute($stmt2);
               
              }
              
                print "<p style='color:green'> Επιτυχής Τροποποίηση</p>\n";
              
               
              
      
      foreach ($_FILES["files"]["error"] as $key[$id] => $error) {

      
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["files"]["tmp_name"][$key[$id]];
            
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["files"]["name"][$key[$id]]);
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $ext == 'pdf') {
            move_uploaded_file($tmp_name, "../uploads/$name");
            print "<p style='color:green'> Επιτυχής Τροποποίηση</p>\n";
            require_once('../sphy137-files/mysqli_connect3.php');                  
                      $query = "UPDATE apousies SET files=? WHERE idstudent=? and date=date(now())";
                      $stmt = mysqli_prepare($dbc, $query);
                      mysqli_stmt_bind_param($stmt, 'si', $name, $key[$id]);
                      mysqli_stmt_execute($stmt);

                      //if (mysqli_stmt_affected_rows($stmt) ==1) {
                       // print "<p style='color:green'> Επιτυχής Καταχώρηση</p>\n";
                       // print "<p style='color: green;'>Το αρχείο ανέβηκε επιτυχώς!</p>\n";
                      //}
                      //}//else {echo 'Not Valid type of file!!';} 
                
                if (mysqli_stmt_affected_rows($stmt) >=1) {
                  print "<p style='color:green'> Επιτυχής Καταχώρηση</p>\n";

                } else {
                  print "<p class='error'>Η εγγραφή δεν ενημερώθηκε!</p>\n";
                }
              }else {print "<p style='color:red'>Not valid filetype</p>\n";}
              }
  }
 }

    print"<p><input type='submit' name='submit' value='υποβολη αναφορας'></form></p>\n";
    
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

<?php
ob_end_flush(); // Αποστολή του buffer στον browser και απενεργοποίηση output buffering
?>
