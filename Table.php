<?php
$con=mysqli_connect('localhost','root','','jms','3308');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table  border='5' cellpadding='15' class='tb'>
		
		<tr style="background:black;">
			<td colspan="6" ><form><input type="text" name="pid" class="bb"  placeholder="Prisoner ID" >
			 <button type="submit" name="sea"  class="rss" ><b><i><h3>Search</h3></i></b></button></form></td>
			
		</tr>
		
	</table>
<table  border='5' cellpadding='15' class='tb' style="max-width: 1028px;">

		<tr style="background:black;color: white"; align="center">
			<td><i><b>Prisoner ID</td>
			<td><i><b>Name of Prisoner</td>
			<td><i><b>Age</td>
			<td><i><b>Birthday</td>
			<td><i><b>Case</td>
			<td><i><b>Sentence</td>
		</tr>


		<?php
		function view($con){
		$table="SELECT * FROM `prison` ";
$result=mysqli_query($con,$table);
$check=mysqli_num_rows($result);

if($check>0){		

while ($row = mysqli_fetch_assoc($result)) {
	$bday=$row['mon']." ".$row['day'].", ".$row['year'];
	echo "<tr align='center' style='background:tomato';>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['age'] . "</td>";
echo "<td>" . $bday . "</td>";
echo "<td>" . $row['cases'] . "</td>";
echo "<td>" . $row['sent'] . "</td>";
echo "</tr>";
}

}
else{
		echo "<tr align='center' style='background:black';>";
echo "<td colspan='6'style='color:white;'><h1><b><i>NO RECORDS AVAILABLE</h1></td>";
echo "</tr>";
}

echo "</table>
</center>";
}//view




//delete
		
	
if(isset($_GET['sea'])){
	$search=$_GET['pid'];
$tb="SELECT * FROM `prison` WHERE `id`='".$search."'";
$result=mysqli_query($con,$tb);
$check=mysqli_num_rows($result);

		if($check>0){		
while ($row = mysqli_fetch_assoc($result)) {
			$b0=$row['id'];
			$b1=$row['name'];
			$b2=$row['age'];
			$b4=$row['cases'];
			$b5=$row['sent'];

			$mon=$row['mon'];
			$day=$row['day'];
			$year=$row['year'];

			$bday=$row['mon']." ".$row['day'].", ".$row['year'];

	echo "<tr align='center' style='background:orange;'>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['age'] . "</td>";
echo "<td>" . $bday . "</td>";
echo "<td>" . $row['cases'] . "</td>";
echo "<td>" . $row['sent'] . "</td>";
echo "</tr></table>";

}
echo "<form><table border='5'  cellpadding='15' >

		<tr style='background:black;color: white;border-color: red;'>
		<td style='padding-right:70px;'>
		<pre>ID :             <input type='text' name='id' value='".$b0."' readonly='readonly' style='text-align:center;'></pre>
		<pre>Name :         <input type='text' name='name' value='".$b1."' style='width:67%;text-align:center;'></pre>
		<pre>Age :          <input type='text' value='".$b2."' readonly='readonly' style='width:67%;text-align:center;'></pre>
		<h6>Birthday :</h6><h5 class='okie'><SELECT name='m' style='width:41.5%;'>";
			$month = array('Month','January', 'February' ,'March' ,'April','May','June','July','August','September','October','November','December');

			for ($x = 1; $x < sizeof($month); $x++) {
				$selected="";
if($mon==$month[$x]){
$selected="selected='selected'";
}
else{
	$selected="";
}
 			 echo "<option value='".$month[$x]."'";
 			 echo "".$selected."'";
 			 echo ">".$month[$x]."</option>";
}

echo "</SELECT>
<SELECT name='d' style='width:26%;'>";
			
			for ($x = 1; $x <= 31; $x++) {
				$selected="";
if($day==$x){
$selected="selected='selected'";
}
else{
	$selected="";
}
 			 echo "<option value='".$x."'";
 			 echo "".$selected."'";
 			 echo ">".$x."</option>";
}
echo "</SELECT>
<SELECT name='y' style='width:29%;'>";
		
			for ($x = 1960; $x <= 2019; $x++) {
				$selected="";
if($year==$x){
$selected="selected='selected'";
}
else{
	$selected="";
}
 			 echo "<option value='".$x."'";
 			 echo "".$selected."'";
 			 echo ">".$x."</option>";
}

		echo "</SELECT></h5>";

  echo "<pre>Case :         <input type='text' name='cases' value='".$b4."' style='width:67%;text-align:center;'>

Sentence :     <input type='text' name='sent'  value='".$b5."' style='width:67%;text-align:center;'></pre>
		</td>
		<td style='padding-left:80px;width:600px;' >
		<button type='submit' name ='up' style='margin-right:50px;width:200px;border-radius:10px;' ><b><i><h3>Update</h3></i></b></button>
 <button type='submit' name ='del' style='width:200px;border-radius:10px;' ><b><i><h3>Delete</h3></i></b></button>
 </td>
	</tr>
		</table></form>";

	
	

}
else{
	echo "<table  border='5' cellpadding='15' class='tb' style='max-width: 1028px;''>

		<tr style='background:black;color: white;' align='center'>
			<td><h1><i><b>NO PRISONER DATA FOUND !!!</td>";

}

	}
	else{
		view($con);
	}

if(isset($_GET['del'])){
		$n=$_GET['id'];
	$stmt="DELETE FROM `prison` WHERE `id`='".$n."'";
			if(mysqli_query($con, $stmt)){
				header( "Location: Table.php" );
			}
			
}//delete

if(isset($_GET['up'] )){
		$n=$_GET['id'];
		$a1=$_GET['name'];
$a2=$_GET['m'];
$a3=$_GET['d'];
$a4=$_GET['y'];
$a5=$_GET['cases'];
$a6=$_GET['sent']; 

$mm=0;
$age=0;
$month = array('Month','January', 'February' ,'March' ,'April','May','June','July','August','September','October','November','December');
			for ($x = 1; $x < sizeof($month); $x++) {
				if($a2==$month[$x]){
$mm=$x;
				}			
}
$mm=(int)$mm;
$lim=(date("Y"));
$lim=(int)$lim;
$test=$a4;
$test=(int)$test;
while(true){
	if ($test>=$lim) {
		break;
	}
	$age +=1;
	$test +=1;

}
$dde=(date("m"));
$dde=(int)$dde;
$dde1=(date("d"));
$dde1=(int)$dde;
$a3=(int)$a3;
if($age<=0){
if($mm>$dde){
	if($mm==$dde){
    if ($B2>$dde1) {
$age +=1;
    }
	}
	else{
		$age +=1;
	}
}
}


if($a1!=""){
	if($age>=18){
		if($m!="Month"||$d!="Date"||$y!="Year"){
			if($a5!=""){
				if($a6!=""){

		$table="UPDATE `prison` SET `name`='".$a1."',`age`='".(int)$age."',`mon`='".$a2."',`day`='".$a3."',`year`='".$a4."',`cases`='".$a5."',`sent`='".$a6."'  WHERE `id`='".(int)$n."'";
				if (mysqli_query($con,$table)) {

		    header( "Location: Table.php" );
		    echo $a4;
			}
		}}}}}

		}

		?>
         

		<style>
		
		.okie{
			position: absolute;
			top: 66%;
			left: 13.7%;
		}

			.bb
{
	width: 85%;
	padding: 5px;
	border: none;
	background: white;
	border-radius: 5px;
	height: 25px;
	color: black;
	border: 1px solid red;

}
.tb{
	border-color: red;
	margin-left: 0%;
	width: 100%;
}

.rss{
	margin-left:  10px;	color: red;
	background-color: white;
	border-radius: 8px;
	border:1px solid red;
	width: 12%;

}
.rss:hover{
	color: black;
	background-color: tomato;
}

		</style>
</body>
</html>