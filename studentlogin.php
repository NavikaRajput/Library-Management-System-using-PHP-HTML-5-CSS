<html>
<head>
<title>login module</title>
    <style>
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
     <link rel="stylesheet" href="stylesignup.css"/>
    <script src="jquery.js"></script>
    <script src="validate.min.js"></script>
    
	<script>
	// Wait for the DOM to be ready
$(function() {
	  $("form[name='login1']").validate(
    {
    rules: {
      name: "required",

      password: {
        required: true,
        minlength: 5
      }
    },
    messages: {
      name: "Please enter your name",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      }
    },
    submitHandler: function(form)
    {
      form.submit();
    }
  });
});
	</script>  

</head>
<body class="forimage">
    <div class="menu">
            <div class="left"> <h2>UPES LIBRARY</h2> </div>
        <div class="right"> 
            <ul> 
                <li id="first">HOME</li>
                <li><a href=#>ABOUT US</a></li>
                <li><a href="studentlogin.php">STUDENT LOGIN</a></li>
                <li><a href="studentsignup.php">STUDENT SIGNUP</a></li>
                <li><a href="adminlogin.php">ADMIN LOGIN</a></li>
                <li>CONTACT US</li> 
            </ul>
        </div>
        </div>
    
    <div class="forcenter"><h1 id="vryimp">STUDENT LOGIN</h1>
<form action="studentlogin.php" method="post" name="login1" onSubmit="{return false}">
Enter username:<input type="text" name="uname" placeholder="enter username"><br>
Enter password:<input type="password" name="pass" placeholder="enter password"><br>
<input id ="stulogin" type="submit" value="login" name="login">
</form>
    </div>
</body>


<?php
include('dbcon.php');
if(isset($_POST['login']))
{
	$username=$_POST['uname'];
	$password=$_POST['pass'];
	$qry="SELECT * FROM students WHERE email='$username' AND password='$password'";
	$run = mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	if($row <1)
	{
		?>
		<script>
		alert('username or password not match');
		window.open('studentlogin.php','_self');
		</script>
		<?php
		
	}
	else
	{
		$data = mysqli_fetch_assoc($run);
		$id = $data['sid'];
		session_start();
		$_SESSION['uid']=$id;
		header('location:studentdash.php');
		
	}
}
?>