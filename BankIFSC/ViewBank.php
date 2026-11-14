<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include "admintabs.html"; 
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


<table style="background-color:#E9E9E9;" width="970" height="85" border="1" align="center">
  <tr>
    <td width="103" height="25"><div align="center" class="style13" >bank_id</div></td>
    <td width="167"><div align="center" class="style13" >Name</div></td>
    <td width="159"><div align="center" class="style13" >Address</div></td>
    <td width="92"><span class="style14">IFSC </span></td>
    <td width="101"><span class="style14">phone</span></td>
  <td width="103"><span class="style14">username</span></td>
    <td width="72"><span class="style14">password</span></td>
  
	     <td width="121"><span class="style13"></span></td>
  </tr>
 <?php 
  $sql="select * from bank";
  $retval=mysqli_query($conn, $sql);  
  
if(mysqli_num_rows($retval) > 0){  
 while($row = mysqli_fetch_assoc($retval)){
  ?>
  <tr>
   
   <form action="" method="post">
  <tr>
    <td height="52"><input name="s1" type="text" value="<?php echo $row['bank_id'] ?>" size="12" required/></td>
    <td>
      <input type="text" name="s2" value="<?php echo $row['name'] ?>" required/></td>
    <td>
      <input type="text" name="s3" value="<?php echo $row['address'] ?>" required/></td>
    <td>
      <input name="s4" type="text" value="<?php echo $row['ifsc'] ?>" size="10" required/></td>
	  <td>
      <input name="s5" type="text" value="<?php echo $row['phone'] ?>"    size="12" required/></td>
	  <td>
      <input name="s6" type="text" value="<?php echo $row['username'] ?>"  readonly="true"  size="5" /></td>
	  <td>
      <input name="s7" type="text" value="<?php echo $row['password'] ?>"  readonly="true"  size="6" /></td>
	  
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



  
  
 
 $sql2 = "update bank set name='$s2',address='$s3',ifsc='$s4',phone='$s5',username='$s6',password='$s7' where bank_id='$s1'";  
 
  
if(mysqli_query($conn, $sql2)){  

 ?>

<script>
alert("Data Updated Successfully");
window.location.href = "ViewBank.php";

</script>

  
 <?php 
}else{  
 echo '<script>alert("data not Updated");</script>';
 
 } 
 
  
  }
?>



<?php 
if(isset($_POST['Delete'])){

$s1=$_POST["s1"];
  
  
 
 $sql2 = "delete from bank where bank_id='$s1'";  
 
  
if(mysqli_query($conn, $sql2)){  

 ?>

<script>
alert("Data Deleted Successfully");
window.location.href = "ViewBank.php";

</script>

  
 <?php 
}else{  
 echo '<script>alert("data not Updated");</script>';
 
 } 
 
  
  }
?>
</body>


</html>
