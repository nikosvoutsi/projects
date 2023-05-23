<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <style type="text/css" media="screen">
    .error {
    color: red;
    }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/concise.min.css">
    <link rel="stylesheet" href="css/masthead.css">

  </head>
  <body>
  
  <nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#"><img src="img/background.png" id="icon1" alt="User Icon" /></a>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="main-navigation">
        
    </div>
</nav>

<header class="page-header header container-fluid">
<div class="overlay"></div>

<div class="description">
    <h1>Εισάγετε τα Διαπιστευτήριά σας</h1>
    
</div><br><br>




<div class="wrapper fadeInDown">
  <div id="formContent"><br>
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/sphy.gif" id="icon" alt="User Icon" />
    </div>

    <?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $errors=[];

     if(!($username=filter_input(INPUT_POST,'username'))){
        $username=null;
        $errors[]='Παρακαλώ εισάγετε όνομα χρήστη!!!';
    }

    if(!($password=filter_input(INPUT_POST,'password'))){
        $password=null;
        $errors[]='Παρακαλώ εισάγετε password!!!';
    }
  
    if(!empty($errors)){
        print"<p class='error'> Eντοπίστηκε πρόβλημα!</p>";
        print"<ul class='error'>\n";
        foreach($errors as $message){
            print"<li>-$message!</li>\n";
        }
        print"</ul>";
    } else {
        // Αυτόματη ανίχνευση αλλαγών γραμμών - διαφέρουν ανάμεσα σε λειτουργικά συστήματα

            if ($username=='dsp' && $password=='aaa'){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);
                header("Location: dsp.php");
                exit();
            }elseif ($username=='chief' && $password=='bbb'){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);
                header("Location: chief.php");
                exit();
            }
        print "<p style='color:red;'>Ο συνδυασμός ονόματος χρήστη και password δεν είναι αποδεκτός!</p>\n";
    }
}
?>

    <!-- Login Form -->
    <form action="login2.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username" style="width:250px;"><br>
      <input type="password" id="password" name="password" placeholder="password" class="fadeIn third text-center" style="width:250px;"><br>
      <input type="submit" class="fadeIn fourth" value="ΣΥΝΔΕΣΗ">
      
    </form>


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