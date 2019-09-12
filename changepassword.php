<?php

		session_start();
		if(isset($_SESSION['uid']))
		{
			
		}
		else
		{
			header('location:loginadmin.php');
		}
?>
<html>
    <head>
    <style>
        
        * {
  margin: 0;
  padding: 0;
}

body {
    background-color: orange;
  font-family: "Open Sans";
  font-size: 14px;
}

.container {
  width: 60%;
  margin: 25px auto;
}

form {
  padding: 20px;
  background: #2c3e50;
  color: #fff;
  border-radius: 4px;
}
form label,form input,form button {
  border: 0;
  margin-bottom: 3px;
  display: block;
  width: 100%;
}
form input {
  height: 25px;
  line-height: 25px;
  background: #fff;
  color: #000;
  padding: 0 6px;
   box-sizing: border-box;
}
form button {
  height: 30px;
  line-height: 30px;
  background: #e67e22;
  color: #fff;
  margin-top: 10px;
  cursor: pointer;
}
form .error {
  color: #ff0000;
}
#register
{
     color: #fff;
    background-color: #e67e22;
}
body.forimage
{
    background-image: url('banner3.jpg');
    background-size: 100% 110%;
    width : 100%;
    height : 100vh;
    margin: 0px;
    padding: 0px;
}
.forcenter
{
    height : 60px;
    margin-top : 200px;
    margin-left : 450px;   
    width: 500px;
}
input
{
    font-size :20px;
}


.menu
{
    width : 100%;
    height : 100px;
    background-color: rgba(0,0,0,1);
}

.left
{
    
    width : 25%;
    height : 100px;
    float : left;
    line-height : 65px;
}
.left h2
{
    font-family: 'verdana';
    padding-left : 20px;
    font-weight : bold;
    color : white;
    font-size: 35px;
    height : 80px;
    float : left;
}

.right
{
    width : 75%;
    height : 100px;
    float : right;
    
}
.right a
{
    margin-top : 20px;
    font-family: 'verdana';
    padding-left : 20px;
    font-weight : bold;
    color : white;
    font-size: 35px;
    height : 80px;
    text-decoration: none;
    float : right;
    
}

#first
{
    color : orange;
}

.right ul li:hover
{
    color: orange;
}
        .add
        {
           background-color : orangered;
        }
        
        #vryimp
        {
            margin-top:1px;
            margin-bottom:30px;
            font-size: 50px;
            text-align: center;
            font-family : verdana;
  text-transform: uppercase;
  color: black;
        }
        </style>
    </head>
    
<body>
    
    <div class="menu">
            <div class="left"> <h2>UPES LIBRARY</h2> </div>
        <div class="right"> 
            <ul> 
<!--                <li id="first">HOME</li>-->
                <li><a href="adminlogout.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
    
    
    <div class="container">
<form action="changepassword.php" method="post" enctype="multiple/form-data" name="addbook">

<label for="oldpass">ENTER OLD PASSWORD :</label><input type="text" name="oldpass" id="oldpass" required>

<label for="newpass">ENTER NEW PASSWORD : </label><input type="text" name="newpass" id="newpass" required>

<label for="conpass">CONFIRM PASSWORD : </label><input type="text" name="conpass" id="conpass" required>

<input type="submit" value="CHANGE PASSWORD" name="submit" class="add">
</form>
</div>
    
</body>
</html>
<?php
if(isset($_POST['submit']))
  {
$id = $_SESSION['uid'];
include('dbcon.php');
$oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $conpass = $_POST['conpass'];
    
echo"<br>";
    
$qry1 = "SELECT * FROM admin WHERE password ='$oldpass'";
$run1 = mysqli_query($con,$qry1);

    if($run1==true && ($newpass==$conpass))
    {
$qry = "UPDATE admin SET password='$newpass' WHERE adminid=$id";
$run = mysqli_query($con,$qry);

if($run==true)
{
	?>
	<script>
	alert('the password updated successfully');
	</script>
	<?php	
}
        
    }
}
?>