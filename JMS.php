<?php
$con=mysqli_connect('localhost','root','','jms','3308');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jail Management System</title>
</head>
<body bgcolor="gray">
<center><img src="logo.png" class="user"></center>
<h1 class="ga">Jail Management System</h1>
	<br><br><br><br><br><br><br>
	<a href="Table.php" target="mainFrame"><button type="submit" name="list"  class="ee">Prisoner List</button></a>
	<button type="submit" name="add" onclick="addForm()" class="e">Add Prisoner</button>
	<button type="submit" name="acc" onclick="acc()" class="ea">Add Account</button>
	<a href="log.php"><button type="submit" name="list"  class="eaa">Log-Out</button></a>
<div class="form-popup" id="add">

	<form >
		<h1 align="center">Prisoner Data Form</h1>
		<button  class="ya" onclick="closeForm()">x</button>
		<table style="margin-left: 80px;" cellspacing="20">
			<tr >
				<td><h4><b>Prisoner Name : </b></h4></td>
				<td><input type="text" name="name" placeholder="Enter name" class="hj"></td>
			</tr>
			<tr>
				<td><h4><b>Birthday : </b></h4></td>
				<td>

					<SELECT name='m' id='tss'>
			<?php
			$month = array('Month','January', 'February' ,'March' ,'April','May','June','July','August','September','October','November','December');
			for ($x = 0; $x < sizeof($month); $x++) {

 			 echo "<option>".$month[$x]."</option>";
}
			?>
		</SELECT>

<SELECT name='d' id='tss'>
			<?php
			for ($x = 1; $x <= 31; $x++) {
				if($x==1){
					echo "<option>Date</option>";
				}
 			 echo "<option>".$x."</option>";
}
			?>
		</SELECT>
<SELECT name='y'>
			<?php
			for ($x = 1960; $x <= 2019; $x++) {
				if($x==1960){
					echo "<option >Year</option>";
				}
 			 echo "<option>".$x."</option>";
}
			?>
		</SELECT>

	</td>
			</tr>
			<tr>
				<td><h4><b>Case : </b></h4></td>
				<td><input type="text" name="cases" placeholder="Enter case" class="hj"></td>
			</tr>
			<tr>
				<td><h4><b>Sentence : </b></h4></td>
				<td><input type="text" name="sent" placeholder="Enter sentence" class="hj"></td>
			</tr>
			<tr>
				<td ></td>

			</tr>
			<tr>
				<td colspan="2" align="center"><button name="sub" class="btn"style="width: 100px;height: 30px;">Submit</button></td>
			</tr>
		</table>

</form>
</div>



	<div class="mf"><iframe name="mainFrame" style="border-radius: 10px;opacity: .8;" frameborder=1 width="1028" height="530" src="Table.php"></iframe></div>
	


	<?php
$P="";
$A=0;
$B="";
$C="";
$S="";
if(isset($_GET['sub'])){
$P=$_GET['name'];
$B1=$_GET['m'];
$B2=$_GET['d'];
$B3=$_GET['y'];
$C=$_GET['cases'];
$S=$_GET['sent']; 
$mm=0;
$age=0;
$month = array('Month','January', 'February' ,'March' ,'April','May','June','July','August','September','October','November','December');
			for ($x = 1; $x < sizeof($month); $x++) {
				if($B1==$month[$x]){
$mm=$x;
				}			
}
$mm=(int)$mm;
$lim=(date("Y"));
$lim=(int)$lim;
$test=$B3;
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
$B2=(int)$B2;
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


if($P!=""){
	if($age>=18){
		if($B1!="Month"||$B2!="Date"||$B3!="Year"){
			if($C!=""){
				if($S!=""){
$tab="INSERT INTO `prison`(`name`, `age`, `mon`,`day`,`year`, `cases`, `sent`) VALUES ('".$P."','".$age."','".$B1."','".$B2."','".$B3."','".$C."','".$S."' )";
if(mysqli_query($con,$tab)){
header( "Location: jms.php");
}
}}}}}


}
	
//acc add
if(isset($_GET['sacc'])){
$P1=$_GET['nameacc'];
$B11=$_GET['macc'];
$B21=$_GET['dacc'];
$B31=$_GET['yacc'];
$C1=$_GET['uacc'];
$S1=$_GET['pacc']; 
$S11=$_GET['cacc']; 
$mm1=0;
$age1=0;
$month1 = array('Month','January', 'February' ,'March' ,'April','May','June','July','August','September','October','November','December');
			for ($x = 1; $x < sizeof($month1); $x++) {
				if($B11==$month1[$x]){
$mm1=$x;
				}			
}
$mm1=(int)$mm1;
$lim1=(date("Y"));
$lim1=(int)$lim1;
$test1=$B31;
$test1=(int)$test1;
while(true){
	if ($test1>=$lim1) {
		break;
	}
	$age1 +=1;
	$test1 +=1;

}
$dde1=(date("m"));
$dde1=(int)$dde1;
$dde11=(date("d"));
$dde11=(int)$dde1;
$B21=(int)$B21;
if($age1<=0){
if($mm1>$dde1){
	if($mm1==$dde1){
    if ($B21>$dde11) {
$age1 +=1;
    }
	}
	else{
		$age1 +=1;
	}
}
}

$ext=0;
$table22="SELECT * FROM `acc` ";
$result22=mysqli_query($con,$table22);
$check22=mysqli_num_rows($result22);
if($check22>0){		
while ($row = mysqli_fetch_assoc($result22)) {
if($row['user']==$C1){
	$ext++;
}
}
}

if($ext==0){
	if($P1!=""){
	if($age1>=18){
		if($B11!="Month"||$B21!="Date"||$B31!="Year"){
			if($C1!=""){
				if($S1==$S11){
$tab1="INSERT INTO `acc`(`name`, `age`, `macc`,`dacc`,`yacc`, `user`, `pass`, `cpass`) VALUES ('".$P1."','".$age1."','".$B11."','".$B21."','".$B31."','".$C1."','".$S1."','".$S11."'  )";
if(mysqli_query($con,$tab1)){
header( "Location: jms.php");
}
}}}}}}
}

?>
<div class="form-popup" id="acc">

	<form >
		<h1 align="center">Account Data Form</h1>
		<button  class="ya" onclick="closeForm()">x</button>
		<table style="margin-left: 80px;" cellspacing="20">
			<tr >
				<td><h4><b>Employee Name : </b></h4></td>
				<td><input type="text" name="nameacc" placeholder="Enter name" class="hj"></td>
			</tr>
			<tr>
				<td><h4><b>Birthday : </b></h4></td>
				<td>

					<SELECT name='macc' id='tss'>
			<?php
			$month = array('Month','January', 'February' ,'March' ,'April','May','June','July','August','September','October','November','December');
			for ($x = 0; $x < sizeof($month); $x++) {

 			 echo "<option>".$month[$x]."</option>";
}
			?>
		</SELECT>

<SELECT name='dacc' id='tss'>
			<?php
			for ($x = 1; $x <= 31; $x++) {
				if($x==1){
					echo "<option>Date</option>";
				}
 			 echo "<option>".$x."</option>";
}
			?>
		</SELECT>
<SELECT name='yacc'>
			<?php
			for ($x = 1960; $x <= 2019; $x++) {
				if($x==1960){
					echo "<option >Year</option>";
				}
 			 echo "<option>".$x."</option>";
}
			?>
		</SELECT>

	</td>
			</tr>
			<tr>
				<td><h4><b>Username : </b></h4></td>
				<td><input type="text" name="uacc" placeholder="Enter Username" class="hj"></td>
			</tr>
			<tr>
				<td><h4><b>Password : </b></h4></td>
				<td><input type="password" name="pacc" placeholder="Enter Password" class="hj"></td>
			</tr>
			<tr>
				<td><h4><b>Confirm-Password : </b></h4></td>
				<td><input type="password" name="cacc" placeholder="Confirm Password" class="hj"></td>
			</tr>
			<tr>
				<td ></td>

			</tr>
			<tr>
				<td colspan="2" align="center"><button name="sacc" class="btn"style="width: 100px;height: 30px;">Submit</button></td>
			</tr>
		</table>

</form>
</div>







<script >
	function addForm(){
	document.getElementById('add').style.display='block';}
function acc(){
	document.getElementById('acc').style.display='block';}
	function closeForm(){
	document.getElementById('close').style.display='none';}
</script>



<style>
.user 
{
       width: 100px;
       height: 100px;
       overflow: hidden;
       position: absolute; 
       top: 2%;
       left: 23%;
}
       body
{
       margin: 0;
       padding: 0;
       background: url(cel.jpg);
       background-size: cover;
       font-family: Times New Roman;
}
.mf{
	margin-left: 17.4%;
	margin-top: 0%;



}

.ga{
	position: absolute;
	font-style: Times New Roman;
	font-size: 50px;
	left: 35%;
	color: cyan;
}
.rs{
	width: 300px;
}

.ee{
	position: absolute;
	left: -1%;
	width: 12%;
	 -webkit-transition: width 1.4s ease-in-out;
    transition: width 0.2s ease-in-out;
    color: white;
	background-color: red;
	border-radius: 3px;
	border:1px solid indigo;
	padding: 15px;
	top: 22%;

}
.ee:hover {
    width: 18%;
    background-color: red;
    border:1px solid indigo;
    opacity: .9;

}
.e{
	position: absolute;
	top:35%;
	left: -1%;
	width: 12%;
	 -webkit-transition: width 1.4s ease-in-out;
    transition: width 0.2s ease-in-out;
    color: white;
	background-color: red;
	border-radius: 3px;
	border:1px solid indigo;
	padding: 15px;

}
.e:hover {
    width: 18%;
    background-color: red;
    border:1px solid indigo;
    opacity: .9;
}
.ea{
	position: absolute;
	top:48%;
	left: -1%;
	width: 12%;
	 -webkit-transition: width 1.4s ease-in-out;
    transition: width 0.2s ease-in-out;
    color: white;
	background-color: red;
	border-radius: 3px;
	border:1px solid indigo;
	padding: 15px;

}
.ea:hover {
    width: 18%;
    background-color: red;
    border:1px solid indigo;
    opacity: .9;
}
.eaa{
	position: absolute;
	top:61%;
	left: -1%;
	width: 12%;
	 -webkit-transition: width 1.4s ease-in-out;
    transition: width 0.2s ease-in-out;
    color: white;
	background-color: red;
	border-radius: 3px;
	border:1px solid indigo;
	padding: 15px;

}
.eaa:hover {
    width: 18%;
    background-color: red;
    border:1px solid indigo;
    opacity: .9;
}
.tb{
	border-color: red;
	margin-left: 18%;
	width: 80%;
}

	.form-popup{
	display: none;
	position: fixed;
	top: 5%;
	left: 30%;
	border: 3px solid #f1f1f1;
	border-top: 30px solid red;
	border-color: black;
	z-index: 9;
	width: 40%;
	border-radius: 10px;
	background-color: lightblue;

}


.btn{
	color: black;
	background-color: gray;
	border-radius: 10px;
	border:3px solid red;
}

.btn:hover{
	opacity: 1;
	color: white;
	background-color: black;
}
.ty input[type=text]{
	border-radius: 10px;
	border: 2px solid red;
	background: black;
	width: 100px;
	color: white;

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
.hj
{
	width: 95%;
	padding: 5px;
	border: none;
	background: white;
	border-radius: 5px;
	height: 25px;
	color: black;
	border: 1px solid red;

}

.ya{
	background-color: red;
	color: white;
	padding: 1px 5px;
	cursor: pointer;
	opacity: 1;
	position: absolute;
	top: -4.1%;
	left: 95.5%;
	border-radius: 3px;
}
.ya:hover{
	opacity: 1;
	background-color: white;
	color: red;
}
.h{
	margin-left: 30px;
}
</style>



</body>
</html>
