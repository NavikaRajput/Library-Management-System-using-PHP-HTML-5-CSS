<?php

		session_start();
		if(isset($_SESSION['uid']))
		{
			
		}
		else
		{
			?>
			<script>
			alert('you have to login first');
			window.open('adminlogin.php','_self');
			</script>
			<?php
		}		
		
?>
<html>
    <head>
        
        <link rel="stylesheet" href="styleadmindash.css" type="text/css">
        
<style>
.grid-container {
  display: grid;
    height : 80%;
  grid-column-gap: 50px;
  grid-template-columns: auto auto auto;
  background-color: darkblue;
  padding: 50px;
}
#d1
{
    border: 0px;
       background-color: darkblue; 
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
</style>
<!--
        <script type="text/javascript">
           $(document).ready(function(){
              $('#btn1').click(function(){
                  $('#loaddata').load('addbook.php');
              }) 
           });
        </script>
-->
    </head>
<?php
 //include('header.php');
?>
    <body>
<div class="admintitle" align="center">
<h4><a href="adminlogout.php" style="float:right; margin-right:30px; color:#fff; font-size=20px">logout</a></h4>
<h1>Welcome To Admin Panel</h1>
</div>
        

<div class="grid-container">
    <div class="grid-item"><a href="addbook.php"><button id="btn1">ADD BOOKS</button></a></div>
    <div class="grid-item"><a href="viewallbooks.php"><button id="btn2">VIEW ALL BOOK</button></a></div>
    <div class="grid-item"><a href="updatebooks.php"><button id="btn3">UPDATE BOOK DETAILS</button></a></div>  
    <div class="grid-item"><a href="deletebooks.php"><button id="btn4">DELETE BOOK</button></a></div>
    <div class="grid-item"><a href="viewbooks.php"><button id="btn5">VIEW CHECKED OUT BOOK</button></a></div>
      <div class="grid-item"><a href="registeredusers.php"><button id="btn6">REGISTERED USERS</button></a></div>
    <div class="grid-item" id="d1"></div> 
    <div class="grid-item"><a href="changepassword.php"><button id="btn7">CHANGE PASSWORD</button></a></div> 
</div>
<!--
<div class="vertical-menu">    
    <button id="btn1">VIEW ALL BOOKS</button>
    <button id="btn2">ADD BOOK</button>
    <button id="btn3">UPDATE BOOK DETAILS</button>
    <button id="btn4">DELETE BOOK</button>
    <button id="btn5">VIEW CHECKED OUT BOOK</button>
    <button id="btn6">REGISTERED USERS</button>
    <button id="btn7">CHANGE PASSWORD</button>
</div>
-->
        
        
</body>
</html>