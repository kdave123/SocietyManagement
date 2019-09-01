<?php 
require 'db.php';
$MNmembername = '';
$MNcontact = '';
$MNaddress = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
session_start();
$_SESSION['MNmembername'] = $_POST['mnmembername'];
$_SESSION['MNcontact'] = $_POST['mncontact'];
$_SESSION['MNaddress'] = $_POST['mnaddress'];

$MNmembername = $mysqli->escape_string($_POST['mnmembername']);
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
        <form  name="mnform" method="post" action="maintainentry.php">
            <?php
          if(isset($_POST['copytopanel'])){
            $COPYTOPANEL = $mysqli->escape_string($_POST['copytopanel']);
          $sql =  "SELECT * from maintainentry where mn_sno = '$COPYTOPANEL' ";
          $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
        echo "
        ";
        while($row = $result->fetch_assoc()) {
            echo "
                        <button type='submit' class='btn' name='update' value=" . $row["mn_sno"]. " >CONFIRM UPDATE</button>
                    ";
        }

        } else {
            echo "0 results";
        }     
        $sql = "SELECT * from maintainentry where mn_sno = '$COPYTOPANEL' ";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();     
        $MNmembername=  $row["mn_name"];
        $MNcontact=$row["mn_amount"];
        $MNaddress=  $row["mn_date"];        
        }
    }
         echo"<div class='inputs'>
           <button type='submit' class='btn' id='create' name='addmember' onclick='return validateForm()' >ADD</button>
            <button type='submit' id='search' class='btn'  name='search' >Search*</button>
              <button type='submit' id='search' class='btn'  name='viewall' >View ALL</button>

            <table border='0' class='membertableip' width='100%'>
            <tr><td>Member Name* (Auto-Populate from DB)</td> <td>";
            ?>
                <?php
                    $sql="SELECT mn_name FROM member";
                    if($result = $mysqli->query($sql)){
                        if (mysqli_num_rows($result)!=0) { 

                    $select= '<select name="mnmembername" style="width:100%">';
                    while($rs = $result->fetch_assoc()){
                        $selected='';
                        if($MNmembername=== $rs['mn_name']){
                            $selected = 'selected = "'.$selected.'"';
                        }         
                    $select.='<option value="'.$rs['mn_name'].'" '.$selected.' >'.$rs['mn_name'].'</option>';
                  }            
                } 
                        else{
                    $select= '<select name="mnmembername" ><option value="">NOT ADDED</option>';
                } 
                
                }
                
                $select.='</select>';
                echo $select;
                ?>
            <?php
            echo"
                 </td> 

                <td>Amount</td>  <td><input type='value' style='width:100%;' name='mncontact' value=".$MNcontact."></td>
                   <td>Month/Year</td>  
            <td><input type='month' name='mnaddress' style='width:100%;' value=".$MNaddress."> </td>
            </tr>
            </table>
           
            </div>
            ";  
  
  
            if (isset($_POST['search'])) { 
$MNmembername = $mysqli->escape_string($_POST['mnmembername']);

    $sql = "SELECT * from maintainentry where mn_name LIKE '%". $MNmembername. "%'";
          $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
        echo "
        <table border='1' class='membertable'><tr><td>Member Name</td><td>Amount</td><td>Month & Year</td></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                       <td>" . $row["mn_name"]. "</td>
                        <td>" . $row["mn_amount"]. "</td>
                        <td>" . $row["mn_date"]. "</td>
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

    $sql = "SELECT * from maintainentry;";
          $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
        echo "
        <table border='1' class='membertable'><tr><td>Member Name</td><td>Amount</td><td>Month & Year</td></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                       <td>" . $row["mn_name"]. "</td>
                        <td>" . $row["mn_amount"]. "</td>
                        <td>" . $row["mn_date"]. "</td>
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
      $sql = "INSERT INTO maintainentry(mn_name,mn_amount,mn_date) " 
            . "VALUES ('$MNmembername','$MNcontact','$MNaddress' )";
$mysqli->query($sql);
  echo "Record Added.";
    }
    if (isset($_POST['update'])) { 
         $UPDATE = $mysqli->escape_string($_POST['update']);
  $sql = "UPDATE maintainentry set mn_name = '$MNmembername',mn_amount= '$MNcontact',mn_date= '$MNaddress'  where mn_sno= '$UPDATE' "; 
$mysqli->query($sql);
 echo "Record Updated.";
    }    
if(isset($_POST["deleterow"])){
	 $roww = $mysqli->escape_string($_POST['deleterow']);
          $sql =  "delete from maintainentry where mn_sno = '$roww' ";
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