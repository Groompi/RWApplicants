<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
$Username = $_SESSION['Username'];
$ID = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCRW: Home Page</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-extensions.css" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
    $loginform = "
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        <form action='index.php' method='post' class='container center_div'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='user' name='uName'>
        </div>
        <div class='form-group'>
          <input type='password' class='form-control' placeholder='password' name='pWord'>
        </div>

        <button type='submit' class='btn btn-primary btn-xlarge center-block' name='loginbtn' value='login'>Login</button>
      </form>";

         include('./include/nav.php');
         include('./include/search.php');
    ?>


  </head>
  <body>

      <?php
      if ($Username && $ID){
        echo $naviYes;
        echo $search;

      }else{
          if ($_POST['loginbtn']){
            $user = $_POST['uName'];
            $password = $_POST['pWord'];
              if($user){
                if($password){
                  require("./include/handler.php");
                  $password = md5(md5("h4Er9".$password."llKo0jL"));

                  $query = $handler->query("SELECT * FROM Accounts WHERE username='$user'");
                  $r = $query->fetch();
                  $dbuser = $r['Username'];
                  $dbpass = $r['Password'];
                  $dbId = $r['id'];
                  $handler = null;
                  if($dbpass == $password){
                    $_SESSION['Username'] = $dbuser;
                    $_SESSION['ID'] = $dbId;
                    echo '<script type="text/javascript">'
                       , 'location.reload();'
                       , '</script>'
                    ;
                  }else{
                    echo $naviNo;
                    echo "The Password/Username combination was  incorrect please try again. $loginform";
                  }
                  //---To-Do---
                  //Manage Users
                  // -Remove
                  // -Add
                  // -Excel Import
                  //Add Admins
                  // -Add
                  // -Remove
                  // -Permissions
                  // Users & Admin Combo
                }else{//password
                  echo $naviNo;
                  echo "Please enter a password $loginform";
                }
              }else{//username
                echo $naviNo;

                echo "<span class='alert cntTbl alert-danger center_div'>Please enter a username</span>
                 $loginform";
              }

            }else{ //post login
              echo $naviNo;
              echo $loginform;
            }
          }
      ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>