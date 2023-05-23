<?php
define('TITLE', 'Δνση Σπουδών');
include('templates/header.inc.php');
check_session();
?>




<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description">
    <h1>Eπιλέξτε εκπαιδευτική σειρά</h1>
    
</div>


<div class="wrapper fadeInDown"><br><br>
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $series=filter_input(INPUT_POST,'series');
        require_once('../sphy137-files/mysqli_connect3.php');
        $query="select id, rank, firstname, lastname from students where series=$series and status<>'del'";
        $stmt=mysqli_prepare($dbc, $query);
        $r=mysqli_execute($stmt);
        if($r){
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id, $rank, $firstname, $lastname);
        print"<p>
        <table border='5' style='width:100%;>
        
        <tr style='font-size: x-large;'>
            <td colspan='5'><b>KATAΣΤΑΣΗ ΜΑΘΗΤΩΝ $series ΣΕΙΡΑ</b></td>
        </tr>
       <tr> 
           <th>ΑΜ</th>        
           <th>ΒΑΘΜΟΣ</th> 
           <th>ΟΝΟΜΑ</th>   
           <th>ΕΠΩΝΥΜΟ</th>  

       </tr>\n";
        while(mysqli_stmt_fetch($stmt)){
        print"<p><tr> 
        <th>$id</th>        
        <th>$rank</th>  
        <th>$firstname</th> 
        <th>$lastname</th> 
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
  <br><p>Εκπαιδευτική Σειρά: <br><input type="number" name="series" size="5" min="128" max="141" value="137"style="width:250px;text-align:center"></p>
<p><input type="submit" name="submit" value="Εμφανιση μαθητων"></p>
</form>

  </div>
</div>


</header>

<?php
include('templates/footer.inc.php');
?>