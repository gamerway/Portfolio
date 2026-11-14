<?php
session_start();
include("banktabs.html");
include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="iso-8859-1">
<title>Deposit</title>

<style>
body {
    background-image: url(images/texture1.jpg);
    font-family: "Courier New", Courier, monospace;
}
table {
    margin-top: 120px;
    background: #ffffffcc;
    padding: 20px;
}
input[type=text], input[type=number] {
    width: 200px;
    padding: 5px;
}
</style>
</head>

<body>

<form method="post">
<table align="center" border="0">
<tr>
    <th colspan="2"><h2>Deposit Amount</h2></th>
</tr>

<tr>
    <td>Account Number</td>
    <td><input type="text" name="accno" required></td>
</tr>

<tr>
    <td>Deposit Amount</td>
    <td><input type="number" name="amount" required></td>
</tr>

<tr>
    <td colspan="2" align="center">
        <input type="submit" name="submit" value="Deposit">
    </td>
</tr>
</table>
</form>

<?php
if (isset($_POST['submit'])) {

    $accno  = $_POST['accno'];
    $amount = $_POST['amount'];

    $q = "SELECT balance FROM account WHERE accno='$accno'";
    $res = mysqli_query($conn, $q);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $balance = $row['balance'];

        $newbal = $balance + $amount;
        $u = "UPDATE account SET balance='$newbal' WHERE accno='$accno'";
        mysqli_query($conn, $u);

        echo "<script>alert('Deposit Successful'); window.location='deposite.php';</script>";
    } else {
        echo "<script>alert('Invalid Account Number');</script>";
    }
}
?>

</body>
</html>
