<?php
$con=mysqli_connect('localhost','root','','jms','3308');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log-in</title>
</head>
<body>
	<div class="loginBox">
	<center><img src="logo.png" class="user"></center>
       <form>
       <input type="text" name ="user" placeholder="Username">
       <input type="password" name="pass" placeholder="Password" >
       <button type="submit" name="sub"   ><b><i><h3>Login</h3></i></b></button>
       </form>
       <br>
       <br>    
</div>

<?php
if(isset($_GET['sub'])){
$user=$_GET['user'];
$pass=$_GET['pass'];
$ver=false;
$table="SELECT * FROM `acc` ";
$result=mysqli_query($con,$table);
$check=mysqli_num_rows($result);
if($check>0){        
while ($row = mysqli_fetch_assoc($result)) {
$u=$row['user'];
$p=$row['pass'];
if($u==$user && $p==$pass){
       $ver=true;
}

}
if($ver==true){
       header( "Location: jms.php" );
}
else{    
      header( "Location: log.php" );  
}
}
}
?>


<style >
       body
{
       margin: 0;
       padding: 0;
       background: url(cell.jpg);
       background-size: cover;
       font-family: Times New Roman;
}
{
       width: 100px;
       height: 100px;
       border-radius: 50%;
       overflow: hidden;
       position: absolute; 
       top: calc(-100px/2);
       left: calc(50% - 50px);
}
.loginBox
{
        position: absolute;
        top: 25%;
        left: 35%;
        text-transform: translate(-50%,-50%);
        width: 420px;
        height: 370px;
        padding: 80px 40px;
        box-sizing: border-box;
        background: rgba(0,0,0,.9);
}
.user 
{
       width: 200px;
       height: 200px;
       overflow: hidden;
       position: absolute; 
       top: calc(-280px/2);
       left: calc(45% - 75px);
       opacity: .5;
}
h2
{
       margin: 0;
       padding: 0 0 20px;
       color: #efed40;
       text-align: center;
}
.loginBox p 
{
       margin: 0;
       padding: 0;
       font-weight: bold;
       color: #fff;
}
.loginBox input
{
       width: 100%;
       margin-bottom: 20px;
}
.loginBox input[type="text"],
.loginBox input[type="password"]
{
       border: none;
       border-bottom: solid;
       border-color: gray;
       background: transparent;
       outline: none;
       height: 40px; 
       color: #fff;
       font-size: 16px;

}

.loginBox button
{
       border: none;
       outline: none;
       height: 60px;
       color: black;
       font-size: 16px;
       background: orange   ;
       cursor: pointer;
       border-radius: 5px;
       margin-top: 30px;
       margin-bottom: -20px;
       width: 100%;
}
.loginBox button:hover
{
       background: gray;
       color: #262626;
}
.loginBox a
{
       color: #fff;
       font-size: 14px;
       font-weight: bold;
       text-decoration: none;
}      
.ok{
       border: solid;
       outline: none;
       height: 20px;
       border-radius: 5px;
       border-color: gray;

}

</style>
</body>  
</html>

