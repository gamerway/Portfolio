<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include "banktabs.html"; 
include "db.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
	color: #0000FF;
}
.style13 {color: #000000}
.style14 {color: #000000; font-weight: bold; font-size: 18px; }
-->
</style>
</head><body>
<div align="center" class="style1">View All Accounts </div>


<table style="background-color:#E9E9E9;" width="734" height="138" border="1" align="center">
  <tr>
    <td width="231" height="25"><div align="center" class="style13" >Name</div></td>
    <td width="260"><div align="center" class="style13" >Location</div></td>
    <td width="221"><div align="center" class="style13" >Email</div></td>
    <td width="221"><span class="style14">Phone </span></td>
    <td width="221"><span class="style14">Adhar</span></td>
  <td width="221"><span class="style14">Gender</span></td>
    <td width="221"><span class="style14">Balance</span></td>
    <td width="221"><span class="style14">password</span></td>
    <td width="221"><span class="style14">Account Number </span></td>
    <td width="221"><span class="style14">pin</span></td>
	  <td width="221"><span class="style14">Max Amount</span></td>
	   <td width="221"><span class="style14">Account Status</span></td>
	     <td width="221"><span class="style13"></span></td>
  </tr>
 <?php 
  $sql="select * from account";
  $retval=mysqli_query($conn, $sql);  
  
if(mysqli_num_rows($retval) > 0){  
 while($row = mysqli_fetch_assoc($retval)){
  ?>
  <tr>
   
   <form action="" method="post">
  <tr>
    <td><input name="s1" type="text" value="<?php echo $row['name'] ?>" size="12" required/></td>
    <td>
      <input type="text" name="s2" value="<?php echo $row['address'] ?>" required/></td>
    <td>
      <input type="email" name="s3" value="<?php echo $row['email'] ?>" required/></td>
    <td>
      <input name="s4" type="text" value="<?php echo $row['phone'] ?>" size="10" pattern="[0-9]{10}" title="10 digit phone number"required/></td>
	  <td>
      <input name="s5" type="text" value="<?php echo $row['adharno'] ?>"  readonly="true"  size="12" required/></td>
	  <td>
      <input name="s6" type="text" value="<?php echo $row['gender'] ?>"  readonly="true"  size="5" /></td>
	  <td>
      <input name="s7" type="text" value="<?php echo $row['balance'] ?>"  readonly="true"  size="6" /></td>
	  <td>
      <input name="s8" type="text" value="<?php echo $row['password'] ?>"  readonly="true"  size="6" /></td>
	   <td>
      <input name="s9" type="text" value="<?php echo $row['accno'] ?>"  readonly="true"  size="6" /></td>
	   <td>
      <input name="s10" type="text" value="<?php echo $row['pin'] ?>" readonly="true" size="5" /></td>
	   <td>
      <input name="s11" type="text" value="<?php echo $row['maxamount'] ?>"  readonly="true"  size="6" required/></td>
	  
    <td><input name="s12" type="text" value="<?php echo $row['status'] ?>"  readonly="true"  size="5"/>     </td>
    <td><input type="submit" name="Update" value="Update" />
      <input type="submit" name="Delete" value="Delete" /></td>
  </tr>
  </form>
  </tr>
 <?php 
 }
 }
 ?>
</table>


<?php 
if(isset($_POST['Update'])){
$s1=$_POST["s1"];
$s2=$_POST["s2"];
$s3=$_POST["s3"];
$s4=$_POST["s4"];
$s5=$_POST["s5"];
$s6=$_POST["s6"];
$s7=$_POST["s7"];
$s8=$_POST["s8"];
$s9=$_POST["s9"];
$s10=$_POST["s10"];
$s11=$_POST["s11"];

echo $s9;
  
  
 
 $sql2 = "update account set name='$s1',address='$s2',email='$s3',phone='$s4',password='$s8' where accno='$s9'";  
 
  
if(mysqli_query($conn, $sql2)){  

 ?>

<script>
alert("Data Updated Successfully");
window.location.href = "Viewaccount.php";

</script>

  
 <?php 
}else{  
 echo '<script>alert("data not Updated");</script>';
 
 } 
 
  
  }
?>



<?php 
if(isset($_POST['Delete'])){

$s9=$_POST["s9"];
  
  
 
 $sql2 = "delete from account where accno='$s9'";  
 
  
if(mysqli_query($conn, $sql2)){  

 ?>

<script>
alert("Data Deleted Successfully");
window.location.href = "Viewaccount.php";

</script>

  
 <?php 
}else{  
 echo '<script>alert("data not Updated");</script>';
 
 } 
 
  
  }
?>
</body>


</html>
