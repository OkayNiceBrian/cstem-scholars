<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <title>Student Reviews</title>
                                <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>

                                        <style type="text/css">
                                        body{
                                                background:#8B0000;
                                        }
                                        .form{
                                                max-width:450px;
                                                padding:30px;
                                                margin:40px auto;
                                                background: #FFF;
                                                border-radius: 10px;
                                                -webkit-border-radius:10px;
                                                -moz-border-radius: 10px;
                                                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
                                                -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
                                                -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
                                        }
                                        .form .inner-wrap{
                                                padding: 30px;
                                                background: #F8F8F8;
                                                border-radius: 6px;
                                                margin-bottom: 15px;
                                        }
                                        .form h1{
                                                background: #808080;
                                                padding: 20px 30px 15px 30px;
                                                margin: -30px -30px 30px -30px;
                                                border-radius: 10px 10px 0 0;
                                                -webkit-border-radius: 10px 10px 0 0;
                                                -moz-border-radius: 10px 10px 0 0;
                                                color: #fff;
                                                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
                                                font: normal 30px 'Bitter', serif;
                                                -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                border: 1px solid #000000;
                                        }
                                        .form h1 > span{
                                                display: block;
                                                margin-top: 2px;
                                                font: 13px Arial, Helvetica, sans-serif;
                                        }
                                        .form label{
                                                display: block;
                                                font: 13px Arial, Helvetica, sans-serif;
                                                color: #000000;
                                                margin-bottom: 15px;
                                        }
                                        .form input[type="text"],
                                        .form input[type="email"],
                                        .form textarea,
                                        .form select {
                                                display: block;
                                                box-sizing: border-box;
                                                -webkit-box-sizing: border-box;
                                                -moz-box-sizing: border-box;
                                                width: 100%;
                                                padding: 8px;
                                                border-radius: 6px;
                                                -webkit-border-radius:6px;
                                                -moz-border-radius:6px;
                                                border: 2px solid #fff;
                                                box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
                                                -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
                                                -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
                                        }

                                        .form .section{
                                                font: normal 20px 'Bitter', serif;
                                                color: #000000;
                                                margin-bottom: 5px;
                                        }
                                        .form .section span {
                                                background: #808080;
                                                padding: 5px 10px 5px 10px;
                                                position: absolute;
                                                border-radius: 50%;
                                                -webkit-border-radius: 50%;
                                                -moz-border-radius: 50%;
                                                border: 4px solid #fff;
                                                font-size: 14px;
                                                margin-left: -45px;
                                                color: #fff;
                                                margin-top: -3px;
                                        }
                                        .form input[type="button"],
                                        .form input[type="submit"]{
                                                background: #808080;
                                                display: center;
                                                padding: 8px 20px 8px 20px;
                                                border-radius: 5px;
                                                -webkit-border-radius: 5px;
                                                -moz-border-radius: 5px;
                                                color: #fff;
                                                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
                                                font: normal 30px 'Bitter', serif;
                                                -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                border: 1px solid #257C9E;
                                                font-size: 15px;
                                        }
                                        .logout button[type="submit"]{
                                                background: #808080;
                                                padding: 8px 20px 8px 20px;
                                                border-radius: 5px;
                                                -webkit-border-radius: 5px;
                                                -moz-border-radius: 5px;
                                                color: #fff;
                                                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
                                                font: normal 30px 'Bitter', serif;
                                                -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                border: 1px solid #257C9E;
                                                font-size: 15px;
                                        }
                                        .form input[type="button"]:hover,
                                        .form input[type="submit"]:hover{
                                                background: #DC143C;
                                                -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
                                                -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
                                                box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
                                        }
                                        .form button[type="button"],
                                        .form button[type="submit"]{
                                                background: #808080;
                                                display: center;
                                                padding: 8px 20px 8px 20px;
                                                border-radius: 5px;
                                                -webkit-border-radius: 5px;
                                                -moz-border-radius: 5px;
                                                color: #fff;
                                                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
                                                font: normal 30px 'Bitter', serif;
                                                -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
                                                border: 1px solid #257C9E;
                                                font-size: 15px;
                                        }
                                        .form button[type="button"]:hover,
                                        .form button[type="submit"]:hover{
                                                background: #DC143C;
                                                -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
                                                -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
                                                box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
                                        }
                                        #hidden {
                                        display: none;
                                        padding: 30px;
                                        background: #F8F8F8;
                                        border-radius: 6px;
                                        margin-bottom: 15px;
                                      }
                                      :checked + #hidden {
                                        display: block;
                                      }

                                      </style>
</head>

   <body>
       <form role="form" method="post" align="right" >
           <div class = logout >
               <div class="button-section">
                   <button type="submit" class="button" name = "logout" formaction="../index.php?logout=true">Logout</button>
               </div>
           </div>
       </form>
               <?php
               include_once 'creds.php';
               //get most recent table for ApplicationsTest
$s = $pdo->query("SELECT Deadline FROM Settings");
$date_array = $s->fetch();
$mo = (int) (isset($date_array['month']) ? $date_array['month'] : date('m'));
$yr = (int)  (isset($date_array['year']) ? $date_array['year'] : date('Y'));
$d = (int)  (isset($date_array['day']) ? $date_array['day'] : date('d'));
$deadline = date('Y-m-d', mktime($mo,$yr,$d));

$time = strtotime($deadline);
$year =  date('Y', $time);
$month = date('m', $time);
$atable = 'Applications'.$month.$year;
$rtable = 'ReviewedApps'.$month.$year;

//get applications assigned to this RID
               $stmt = $pdo->prepare("SELECT * FROM `".$rtable."` WHERE RID = ?");
               //$stmt->execute();
               if($_SESSION['id'] == NULL)
               {
                 $stmt->execute([1001]);
               }
               else{
                 $stmt->execute([$_SESSION['id']]);
               }
               //get applications assigned to reviewer
               // "SELECT * FROM `".$table."` WHERE ApplicationNum=?"
               $stmt2 = $pdo->prepare("SELECT * FROM `".$atable."` WHERE ApplicationNum=?");
               $ctr = 0;
         ?>

         <div class="form">
                       <h1>Students for Review<span>Grant applications</span></h1>
                       <form role="form" method="post">
                               <div class="button-section">
                                       <?php

                                               while ($row = $stmt->fetch()) {
                                                       $stmt2->execute([$row['ApplicationNum']]);
                                                       $student = $stmt2->fetch();
                                                       $ctr++;
                                                       //only display applications that have not been reviewed
                                                       if($row['Submitted'] != 1){
                                                         $name = 'btn['.$row['ApplicationNum'].']';
                                                              echo '<div class="inner-wrap">';
                                                              echo '<input type="checkbox" id="'.$row['ApplicationNum'].'" style="display:none;">';
                                                              echo'<div id="hidden">';
                                                              echo '<label>Title <input type="text" value="'.$student['PTitle'].'" /></label>';
                                                              echo '<label>Objective: <textarea >'.$student['Objective'].'</textarea></label>';
                                                              echo '<label>Anticipated Results: <textarea >'.$student['AnticipatedResults'].'</textarea></label>';
                                                              echo '<label>Estimated timeline: <textarea >'.$student['Timeline'].'</textarea></label>';
                                                              echo '<label>Budget and planned spending: <textarea>'.$student['Justification'].'</textarea></label>';
                                                              echo '<label>Total budget amount:<input type="text" placeholder="'.$student['Budget'].'"/></label>';
                                 echo '<label>Requested budget amount from EWU:<input type="text" placeholder="'.$student['RequestedBudget'].'" /></label>';
                                 echo '<label>Other funding sources available: <input type="text" placeholder="'.$student['FundingSources'].'"/></label>';
                                 echo'</div>';
                                 echo '<div class="section" for="my_checkbox"><span>'.$ctr.'</span>'.$student['PTitle'].'</div>';
                                 //TODO: figure out transfering applicationNum to formpage.php
                                 echo '<label for="'.$row['ApplicationNum'].'">Show/Hide Details</label>';
                                 //echo  '<a href="http://localhost:8080/formpage.php"><button type="button" name="'.$name.'"> Review Application: '.$row['ApplicationNum'].'</button></a>';
                                                               echo '<input type="hidden" value='.$row['ApplicationNum'].' name="appNum" id="appNum"/>';
                                                               echo  '<a href="formpage.php"><button type="button" name="'.$name.'"> Review Application: '.$row['ApplicationNum'].'</button></a>';
                                                               echo'</div>';
                                                       }
                                               }
                                       ?>
                                       </span>
                               </div>
                       </form>
               </div>
       </body>
</html>
