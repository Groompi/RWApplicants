<?php 
session_start();
?>

<!DOCTYPE html>
<?php

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCRW: Add a Climber</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-extensions.css" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CCRW RockWall</a>
    </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Search</a></li>
        <li class="active"><a href="userAdd.php">Add User</a></li>
        <li><a href="DispAll.php">Members</a></li>
      </ul>
      <form action='search.php' method='get' class='navbar-form navbar-right'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='Search' name='Search'>
        </div>
        <button type='submit' class='btn btn-default' value='Search'>Search</button>
      </form>
    </div>
  </nav>
  </br>
  <?php 
$form ="<form role='form' class='container div_center' action='./userAdd.php' method='post'>
  <div class='form-group'>
    <label>First Name</label>
    <input type='text' class='form-control' placeholder='First Name' name='fName'>
  </div>
  <div class='form-group'>
    <label>Last Name</label>
    <input type='text' class='form-control' placeholder='Last Name' name='lName'>
  </div>
  <div class='form-group'>
    <label>Age</label>
    <input type='text' class='form-control' placeholder='Age' name='Age'>
  </div>
  <div class='form-group'>
    <label>Emergency Name</label>
    <input type='text' class='form-control' placeholder='Emergency Name' name='eName'>
  </div>
  <div class='form-group'>
    <label>Emergency Number</label>
    <input type='text' class='form-control' placeholder='000-000-0000' name='eNumber'>
  </div>
  <div class='form-group'>
    <label>Employee Signup</label>
    <input type='text' class='form-control' placeholder='Employee Name' name='empSignup'>
  </div>
    <div class='form-group'>
    <label>Signup Date</label>
    <input type='text' class='form-control' placeholder='YYYY/MM/DD' name='sDate'>
  </div>
    <div class='form-group'>
    <label>Expire Date</label>
    <input type='text' class='form-control' placeholder='YYYY/MM/DD' name='eDate'>
  </div> 
  <button type='submit' class='btn btn-default' name='regbtn' value='register'>Register</button>
</form>";

if($_POST['regbtn']){

                $fName = $_POST['fName'];
                $lName = $_POST['lName'];
                $eName = $_POST['eName'];
                $eNumber = $_POST['eNumber'];
                $empSignup = $_POST['empSignup'];
                $sDate = $_POST['sDate'];
                $eDate = $_POST['eDate'];
                $Age = $_POST['Age'];

                if ($fName){
                  if($lName){
                    if($Age){
                      if($eName){
                        if($eNumber){
                          if($empSignup){
                            if($sDate){
                              if($eDate){
                                require("handler.php");
                                $fuName = "$lName" . " " . "$fName";

                                $sql = "INSERT INTO RWApplicants (FirstName, LastName, Age, EmergencyNumber, EmergencyName, EmplSign, DateSignup, DateExpire, FullName) VALUES (:fn,:ln, :a, :en,:ena,:es,:ds,:de,:fun)";
                                $q = $handler->prepare($sql);
                                $q->execute(array('fn'=>$fName,'ln'=>$lName,'a'=>$Age, 'en'=>$eNumber,'ena'=>$eName,'es'=>$empSignup,'ds'=>$sDate,'de'=>$eDate, 'fun'=>$fuName));
                                $Success = "<div class='alert alert-success div_center' role='alert'>User $fName Added Succesfully.</div>";
                                echo $Success;
                                echo $form; 
                              }else{
                                echo "You did not enter the Expiration Date $form";//edate
                              }

                            }else{
                              echo "You did not enter the Submit Date $form";//sdate
                            }

                          }else{
                            echo "You did not enter the Employee Name $form";//empsignup
                          }

                        }else{
                          echo "You did not enter an Emergency Number $form";//enumber
                        }

                      }else{
                        echo "You did not enter an Emergency Name $form";//ename
                      }
                    }else{
                      echo "You did not enter an Age $form";
                    }
                  }else{
                    echo "You did not enter a Last Name $form";//lname
                  }

                }else{
                  echo "You did not enter a First Name $form";//fname
                }
            }else{
              echo $form;
            }
        ?>
      <!--
      <form  method='get' action='search.php'  id='searchform'> 
          <input  type='text' name='Search'> 
          <input  type='submit' value='Search'> 
       </form>-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>