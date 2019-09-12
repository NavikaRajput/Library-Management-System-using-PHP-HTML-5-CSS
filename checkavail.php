<html>
    <head>
        <title>Library Search...</title>
        
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
<script>
    
var display=setInterval(function(){Time()},0);
function Time()
{
var date=new Date();
var time=date.toLocaleTimeString();
document.getElementById("example").innerHTML=time;
}
   var time = new Date();
   function show(id) {
     if (id == 'hold') {
        document.getElementById('h1').value=time;
         document.getElementById('h2').value="placed hold successfully";
         
     }
   }
</script>        
<style>    
/*
.d1
{
    width : 100%;
    height : 20px;
    font-size : 20px;
   background-color: darkslategrey;               
}         
*/
    input[type=text]{
        font-size : 20px;
        font-family: 'verdana';
    font-weight : bold;
        width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}        
#hold
{
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  transition-duration: 0.4s;            
}
/* top nav */
.menu
{
    width : 100%;
    height : 100px;
    background-color: rgba(0,0,0,1);
}
            a
            {
                text-decoration : none;
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
.right ul
{
  margin-right: 2px;   
}

.right ul li
{
   display : inline-block;
    list-style : none;
    font-size : 20px;
    color : white;
    font-weight : bold;
    line-height : 85px;
    margin-left : 30px;
    text-transform: uppercase;
}


#first
{
    color : orange;
}

.right ul li:hover
{
    color: orange;
}
            
         body {
  font-family: Arial;
}
            
.d1
{
    margin-top : 40px;            
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: green;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: green;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
            
            table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
        </style>
    </head>
<?php

		session_start();
		if(isset($_SESSION['uid']))
		{
//			echo $_SESSION['uid'];
		}
		else
		{
			header('location:studentlogin.php');
		}

?>
<body>
    <div class="menu">
            <div class="left"> <h2>UPES LIBRARY</h2> </div>
        <div class="right"> 
            <ul> 
                <li id="first">HOME</li>
                <li><a href=#>ABOUT US</a></li>
                <li><a href="studentlogin.php" disabled="disabled">STUDENT LOGIN</a></li>
                <li><a href="studentsignup.php" disabled="disabled">STUDENT SIGNUP</a></li>
                <li>CONTACT US</li> 
                <li><a href="logout.php">LOGOUT</a></li>
                
            </ul>
        </div>
        </div>
    <div class="d1">
<form action="studentdash.php" method="post" class="example">
    <h3 style="text-align:center; margin-top:2px;"><font size="5" face = "verdana">SEARCH THE BOOK...</font></h3>
    <input type="text" name="bookname" placeholder="Search.." required="required" id="bookname">
<button type="submit" name="submit"><i class="fa fa-search"></i></button>
</form>
    </div>
<?php
     include('dbcon.php');
	 echo"<br>";
	 $availability = $_REQUEST['availability'];
	 $bookid = $_REQUEST['bookid'];
     // echo $bookid."    hjkhjhjkh   ";
     $sql = "SELECT * FROM books WHERE bookid='$bookid'";
	 $run = mysqli_query($con,$sql);
	 while($data=mysqli_fetch_assoc($run))
		{
         ?>
          <div class="d1"><h4>Home >> Details for:<?php echo $data['title'];?></h4></div>
             <h3><font color='red' size='9'><u> <?php echo $data['title'];?></u></font></h3>
    <div>
        <h3>BY <?php echo $data['author'];?></h3>
        <h5>Publication : <?php echo $data['publication'];?></h5>
    </div>
        <div class="image"><img src="book1.jpeg" alt="oops Image not available." width="150px" height="150px"></div>
        <div>
        <h5>ISBN: <?php echo $data['bookid'];?></h5>
        <h5>Subject(s) : <?php echo $data['type'];?></h5>
            
    </div>
         <?php	 
		}
     if($availability == 'yes')
     {
     ?>

        <a href="checkavail2.php?bookid=<?php echo $bookid;?>">
          
          <input type="button" id="hold"  name="hold" value="place hold" onClick="show(this.id)"></a>
    <input type='text' id="h1" value=""> 
    <input type='text' id="h2" value="The BOOK IS AVAILABLE FOR HOLD"> 
         <?php 
     }
    else
     {
         echo "<h2>The BOOK IS NOT AVAILABLE FOR HOLD</h2>";
     }
		?>
    <p>The Current time is:</p>
<p id="example"></p>

    </body>
</html>