<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>


<header class="page-header header container-fluid"><br>
<div class="overlay"></div>

<div class="description"><br>
    <h1>Προσθέστε τα παρακάτω στοιχεία</h1>
    
</div><br><br>


<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors=[];
        if(!$id=filter_input(INPUT_POST,'id')){
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
        if(!empty($errors)){
            print_error_messages($errors);
        }else{
            $name;
            if (!empty($_FILES)) { // Το $_FILES μπορεί να είναι κενό λόγω μεγέθους. (Content-Length)


                $filename1="{$_FILES['the_file']['name']}";
    
                    $name = basename($_FILES['the_file']['name']);
    
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
    
                    $tmp_name = $_FILES["the_file"]["tmp_name"];
                    if($name!=""){  
                        move_uploaded_file($tmp_name, "../uploads/$name");
                    }else{$name="null";}
                }

            require_once('../sphy137-files/mysqli_connect3.php');
            $query='insert into students (id, rank, firstname, lastname, series, status, files)
            values (?,?,?,?,?, "in", ?)';
            $stmt=mysqli_prepare($dbc, $query);
            mysqli_stmt_bind_param($stmt, 'isssis', $id, $rank, $firstname, $lastname, $series,$name);
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt)!=1){
                print"<p style='color:red;'>Ο σπουδαστής με ΑΜ $id είναι ήδη καταχωρημένος στη ΒΔ</p>\n";
            }else{
                print "<p style='color:green;'> Eπιτυχής εισαγωγή</p>\n";
            }
        }
    }
    
  ?>
  <form action="" method="post">
<p>ΑΜ:<br>
<input type="text" name="id" maxsize="100" style="width:250px;"><br>
<p>Βαθμός:<br>
<input type="text" name="rank" maxsize="100" style="width:250px;"><br>
<p>Όνομα:<br>
<input type="text" name="firstname" maxsize="100" style="width:250px;"><br>
<p>Επώνυμο:<br>
<input type="text" name="lastname" maxsize="100" style="width:250px;"><br>
<p>Σειρά:<br>
<input type="number" name="series" size="5" min="128" max="141" value="137" style="width:250px; text-align:center"></p>
<input type='hidden' name='MAX_FILE_SIZE' value='3000000'>
    <p>Επιλογή φωτογραφίας:<br>
    <input type="hidden" name="MAX_FILE_SIZE" value="300000">
<p><input type="file" name="the_file"></p>
<p><input type="submit" name="submit" value="Προσθηκη"></p>
</form>

  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>