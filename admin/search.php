<?php
session_start();
$Username = $_SESSION['Username'];
$ID = $_SESSION['ID'];
?>
<!DOCTYPE html>
<?php
$Search = $_GET['Search'];
include ('./include/nav.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCRW: Search</title>

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
                        
                            require("./include/handler.php");

                            $query = $handler->query("SELECT * FROM RWApplicants WHERE FirstName ='$Search' ORDER BY LastName");
                            $r = $query->fetchAll();
                            if($r){
                                
                                    //echo "first"; //checking for search from first name or last name
                                        //print_r($r);
                                    $num = 0;
                                    $nRows = count($r);
                                    $aRows = $nRows - 1;

                            }else{
                                $r = null;
                                require("./include/handler.php");
                                $query = $handler->query("SELECT * FROM RWApplicants WHERE LastName ='$Search' ORDER BY LastName");
                                $r = $query->fetchAll();
                                    if($r){
                                        echo "last";
                                        $num = 0;
                                        $nRows = count($r);
                                        $aRows = $nRows - 1;
                                    }else{
                                        $fS = "<span class='alert cntTbl alert-danger'>Your search for <b>$Search</b> did not match any etnries. </span>";
                                    }
                            }


        ?>
  </head>
  <body>
    <?php
      if($Username && $ID){
        echo $naviYes;
      }else{
        echo $naviNo;
      }
    ?>
      <table class="table table-striped">
        <tr>
          <td><b>Full Name</b><td>
          <td><b>First Name</b></td>
          <td><b>Last Name</b></td>
          <td><b>Age</b></td>
          <td><b>Date Signup</b></td>
          <td><b>More Info</b></td>
        </tr>
         <?php
            while($r[$num] > $aRows){
            $fullName = $r[$num]['FullName'];
            $nameID = $r[$num]['id'];
            $fName = $r[$num]['FirstName'];
            $lName = $r[$num]['LastName'];
            $dateS = $r[$num]['DateSignup'];
            $age = $r[$num]['Age'];
            $each = "<tr>
          <td>$fullName<td>
          <td>$fName</td>
          <td>$lName</td>
          <td>$age</td>
          <td>$dateS</td>
          <td><a href=./../info.php?ID=" . $nameID . "><span class='btn btn-info btn-sm'>More Info</td>
        </tr>";
        echo $each;
            $num = $num +1;
            }?>
          </table>
          <?php echo $fS;?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>