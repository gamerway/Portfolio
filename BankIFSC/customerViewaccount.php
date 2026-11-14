<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
session_start();
include "customertabs.html"; 
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
<div align="center" class="style1">My Account Details  </div>


<table style="background-color:#E9E9E9;" width="422" border="1" align="center">

<?php 
$accno = $_SESSION['uaccno'];
$sql   = "SELECT * FROM account WHERE email='$accno'";
$retval = mysqli_query($conn, $sql);

if (mysqli_num_rows($retval) > 0) {
  if ($row = mysqli_fetch_assoc($retval)) {
?>
<form action="" method="post">

<tr>
  <th width="250">Name</th>
  <td width="217"><input name="s1" type="text" value="<?php echo $row['name']; ?>" required></td>
</tr>

<tr>
  <th>Location</th>
  <td><input name="s2" type="text" value="<?php echo $row['address']; ?>" required></td>
</tr>

<tr>
  <th>Email</th>
  <td><input name="s3" type="email" value="<?php echo $row['email']; ?>" required></td>
</tr>

<tr>
  <th>Phone</th>
  <td>
    <input name="s4" type="text"
           value="<?php echo $row['phone']; ?>"
           pattern="[0-9]{10}"
           title="10 digit phone number"
           required>
  </td>
</tr>

<tr>
  <th>Aadhar</th>
  <td><input name="s5" type="text" value="<?php echo $row['adharno']; ?>" readonly></td>
</tr>

<tr>
  <th>Gender</th>
  <td><input name="s6" type="text" value="<?php echo $row['gender']; ?>" readonly></td>
</tr>

<tr>
  <th>Balance</th>
  <td><?php echo $row['balance']; ?></td>
</tr>

<tr>
  <th>Password</th>
  <td><input name="s8" type="text" value="<?php echo $row['password']; ?>" readonly></td>
</tr>

<tr>
  <th>Account Number</th>
  <td><input name="s9" type="text" value="<?php echo $row['accno']; ?>" readonly></td>
</tr>

<tr>
  <th>PIN</th>
  <td><input name="s10" type="text" value="<?php echo $row['pin']; ?>" readonly></td>
</tr>

<tr>
  <th>Max Amount</th>
  <td><input name="s11" type="text" value="<?php echo $row['maxamount']; ?>" readonly></td>
</tr>

<tr>
  <th>Account Status</th>
  <td><input name="s12" type="text" value="<?php echo $row['status']; ?>" readonly></td>
</tr>

<tr>
  <th>Action</th>
  <td>
    <input type="submit" name="Update" value="Update">
    <input type="submit" name="Delete" value="Delete">
  </td>
</tr>

</form>
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
