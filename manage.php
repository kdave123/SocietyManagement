<?php 
require 'db.php';
$MNmembername = '';
$MNemail ='';
$MNcontact = '';
$MNaddress = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
session_start();
$_SESSION['MNmembername'] = $_POST['mnmembername'];
$_SESSION['MNemail'] = $_POST['mnemail'];
$_SESSION['MNcontact'] = $_POST['mncontact'];
$_SESSION['MNaddress'] = $_POST['mnaddress'];

$MNmembername = $mysqli->escape_string($_POST['mnmembername']);
$MNemail = $mysqli->escape_string($_POST['mnemail']);
$MNcontact = $mysqli->escape_string($_POST['mncontact']);
$MNaddress = $mysqli->escape_string($_POST['mnaddress']);

}
?>


<html>

<head>
 <script> 
   <?php require 'scripts.php';?>
</script>
<link rel="stylesheet" type="text/css" href="kdstylesheet.css">

<title>K TheWay Housing Society Management</title>
</head>

<body>
<?php
require("header.php");
?>



<div class="midcontent">

<div class="displaytable">
        <form  name="mnform" method="post" action="manage.php">
            <?php
          if(isset($_POST['copytopanel'])){
            $COPYTOPANEL = $mysqli->escape_string($_POST['copytopanel']);
          $sql =  "SELECT * from member where mn_sno = '$COPYTOPANEL' ";
          $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
        echo "
        ";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "
                        <button type='submit' class='btn' name='update' value=" . $row["mn_sno"]. " >CONFIRM UPDATE</button>
                    ";
        }

        } else {
            echo "0 results";
        }     
        $sql = "SELECT * from member where mn_sno = '$COPYTOPANEL' ";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();     
        $MNmembername=  $row["mn_name"];
        $MNemail= $row["mn_email"];
        $MNcontact=$row["mn_contact"];
        $MNaddress=  $row["mn_address"];        
        }
    }
         echo"<div class='inputs'>
           <button type='submit' class='btn' id='create' name='addmember' onclick='return validateForm()' >ADD</button>
            <button type='submit' id='search' class='btn'  name='search' >Search*</button>
                  <button type='submit' id='search' class='btn'  name='viewall' >View ALL</button>

            <table border='0' class='membertableip'>
            <tr>
                <td>Member Name*</td>  <td><input type='text'  style='width:100%;' name='mnmembername' id='required' value=".$MNmembername."> </td> 
                <td>Email*</td>    <td><input type='email' style='width:100%;' name='mnemail' value=".$MNemail."></td>
            
                <td>Primary Contact </td>  <td><input type='value' style='width:100%;' name='mncontact' value=".$MNcontact."></td>
                   <td>Room No. </td>  
            <td><input type='text' name='mnaddress' style='width:100%;' value=".$MNaddress."></td>
            </tr>
            </table>
           
            </div>
            ";  
  
  
            if (isset($_POST['search'])) { 
$MNmembername = $mysqli->escape_string($_POST['mnmembername']);
$MNemail = $mysqli->escape_string($_POST['mnemail']);

    $sql = "SELECT * from member where (mn_name LIKE '%". $MNmembername. "%' AND mn_email LIKE '%". $MNemail. "%') ";
          $result = $mysqli->query($sql);
        if (@$result->num_rows > 0) {
        echo "
        <table border='1' class='membertable'><tr><td>Member Name</td><td>Email</td><td>Primary Contact</td><td>Room No.</td></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                       <td>" . $row["mn_name"]. "</td>
                        <td>" . $row["mn_email"]. "</td>
                        <td>" . $row["mn_contact"]. "</td>
                        <td>" . $row["mn_address"]. "</td>
                        <td> 
                       
                        <button type='submit' class='btn' name='copytopanel' value=" . $row["mn_sno"]. " >EDIT</button>
                                    <button type='submit' class='btn' name='deleterow' value=" . $row["mn_sno"]. " >DELETE</button>   
                                
                         </td>
                        
                </tr>";
        }
        echo "</table>";
        } else {
            echo "0 results";
        }
    } 

    if (isset($_POST['viewall'])) { 
$MNmembername = $mysqli->escape_string($_POST['mnmembername']);
$MNemail = $mysqli->escape_string($_POST['mnemail']);

    $sql = "SELECT * from member;  ";
          $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
        echo "
        <table border='1' class='membertable'><tr><td>Member Name</td><td>Email</td><td>Primary Contact</td><td>Room No.</td></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                       <td>" . $row["mn_name"]. "</td>
                        <td>" . $row["mn_email"]. "</td>
                        <td>" . $row["mn_contact"]. "</td>
                        <td>" . $row["mn_address"]. "</td>
                        <td> 
                       
                        <button type='submit' class='btn' name='copytopanel' value=" . $row["mn_sno"]. " >EDIT</button>
                                    <button type='submit' class='btn' name='deleterow' value=" . $row["mn_sno"]. " >DELETE</button>   
                                
                         </td>
                        
                </tr>";
        }
        echo "</table>";
        } else {
            echo "0 results";
        }
    } 
        if (isset($_POST['addmember'])) { 
      $sql = "INSERT INTO member(mn_name,mn_email,mn_contact,mn_address) " 
            . "VALUES ('$MNmembername','$MNemail','$MNcontact','$MNaddress' )";
$mysqli->query($sql);
     echo "Record Added.";
    }
    if (isset($_POST['update'])) { 
         $UPDATE = $mysqli->escape_string($_POST['update']);
  $sql = "UPDATE member set mn_name = '$MNmembername',mn_email= '$MNemail',mn_contact= '$MNcontact',mn_address= '$MNaddress'  where mn_sno= '$UPDATE' "; 
$mysqli->query($sql);
 echo "Record Updated.";
    }   

    if(isset($_POST["deleterow"])){
     $roww = $mysqli->escape_string($_POST['deleterow']);
          $sql =  "delete from member where mn_sno = '$roww' ";
          $result = $mysqli->query($sql);
        echo "Record deleted.";

}
    ?>
        </form>
           </div>

</div>



<?php

require("footer.html");

?>
</body>

</html>