<html>
<head>
<style>
p
{
	color: white;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 20;
}
h1
{
	color: white;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 25;
}
a
{
	color: white;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 20;

}
</style>
</head>
<body bgcolor="black">
<?php
$name=$_POST['name'];
$area=$_POST['area'];
$vtype=$_POST['vtype'];
$ftype=$_POST['ftype'];
$vname=$_POST['vname'];
$distance=$_POST['distance'];
$time=$_POST['time'];
$price=$_POST['price'];
$number=$_POST['number'];
$email=$_POST['email'];
echo "<hr><br/>";
echo "<center><h1>YOUR DETAILS</h1></center><br/>";
echo "<hr>br/>";
echo "<center><p>NAME : $name<br/>LOCALITY : $area<br/>VEHICLE TYPE : $vtype<br/>FUEL TYPE : $ftype<br/>VEHICLE NAME : $vname<br/>DISTANCE TRAVELLED : $distance<br/>RENTING PERIOD : $time<br/>PRICE : $price<br/>PHONE NUMBER : $number<br/>EMAIL ID : $email</center></p><br/>";
echo "<hr><br/>";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "renters";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO new_renter_details (name, area, vtype, ftype, vname, distance, tim, rent, phoneno, email, password, confirmpassword )
VALUES ('".$_POST["name"]."','".$_POST["area"]."','".$_POST["vtype"]."','".$_POST["ftype"]."','".$_POST["vname"]."','".$_POST["distance"]."','".$_POST["time"]."','".$_POST["price"]."','".$_POST["number"]."','".$_POST["email"]."','".$_POST["password"]."','".$_POST["confirmpassword"]."')";
if (mysqli_query($conn, $sql)) {
	echo "<br/><br/><br/>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql2 = "SELECT name, area, vtype, ftype, tim, rent, phoneno, email, password, confirmpassword FROM new_renter_details WHERE area='".$_POST["area"]."'";
$result = mysqli_query($conn, $sql2);
echo "<hr><br/>";
echo "<center><h1>RELATED RENTEE DETAILS IN YOUR LOCALITY</h1></center><br/>";
echo "<hr><br/>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$name=$row['name'];
		$area=$row['area'];
		$vtype=$row['vtype'];
		$ftype=$row['ftype'];
		$time=$row['tim'];
		$price=$row['rent'];
		$number=$row['phoneno'];
		$email=$row['email'];
		echo "<center><p>NAME : $name<br/>LOCALITY : $area<br/>VEHICLE TYPE : $vtype<br/>FUEL TYPE : $ftype<br/>RENTING PERIOD : $time<br/>PRICE : $price<br/>PHONE NUMBER : $number<br/>EMAIL ID : $email</center></p><br/>";
		echo "<hr><br/>";
    }
} else {
    echo "<center><p>Oops! We couldn't find any matches in your locality.</p></center><br/>";
}

mysqli_close($conn);
?>
<center><a href="renter.html">RETURN TO PREVIOUS PAGE</a></center>
</body>
</html>
