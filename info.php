<?php
session_start();
?>
<!DOCTYPE html>
<?php
$ID = $_GET['ID'];
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>

        <?php


                        
            require("handler.php");
            $query = $handler->query("SELECT FirstName, LastName, EmergencyNumber, EmergencyName, DateExpire FROM RWApplicants WHERE ID ='$ID'");
            $r = $query->fetch();
                if ($r){
                    $FirstName = $r['FirstName'];
                    $LastName = $r['LastName'];
                    $EmergencyNumber = $r['EmergencyNumber'];
                    $EmergencyName = $r['EmergencyName'];
                    $DateExpire = $r['DateExpire'];
                }else{
                    $return = "Sorry, there is no user with the ID of $ID";
                }
                    $TableEntry = "
                        <table cellpadding='10'>
                            <tr>
                                <td>First Name:</td>
                                <td>$FirstName</td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td>$LastName</td>
                            </tr>
                            <tr>
                                <td>Emergency Number: </td>
                                <td>$EmergencyNumber</td>
                            </tr>
                            <tr>
                                <td>Emergency Name</td>
                                <td>$EmergencyName</td>
                            </tr>
                            <tr>
                                <td>Date Expire:</td>
                                <td>$DateExpire</td>
                            </tr>
                        </table>";
        ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="pageWrapper">           
                <div id="header">
                </div>
                <div id="ctent">
                    <div id="searchMenu">
                        <div id="SearchContent">
                            <?php
                            $searchForm = "
                            <form  method='get' action='search.php'  id='searchform'> 
                                <input  type='text' name='Search'> 
                                <input  type='submit' value='Search'> 
                            </form>";

                            echo $searchForm;
                            ?>
                        </div>
                    </div>
                    <div id="menu">
                    </div>
                    <div id="content">
                        <?php
                            echo $return;
                            echo $TableEntry;
                        ?>

                    </div>
                    <div id="footer">
                    </div>
                </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>