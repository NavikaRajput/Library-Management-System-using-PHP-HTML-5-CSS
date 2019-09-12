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
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            
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
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
            #logout
            {
                color: white;
                font-size : 40px;
                font-weight : bold;
                float : right;
            }
            
        </style>
 </head>
    <body>
        <div class="menu">
            <div class="left"> <h2>UPES LIBRARY</h2> </div>
        <div class="right"> 
            <ul> 
<!--                <li id="first">HOME</li>-->
                <li id="logout"><a href="adminlogout.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>

<?php
include('dbcon.php');
echo"<br>";
$qry = "SELECT * FROM books";
$run = mysqli_query($con,$qry);
$row=mysqli_num_rows($run);
if($run==true)
{

       echo "<h1 style='text-align:center;'><font size='6' face = 'verdana'>There are ".$row." Books in the library !</h1>";
}
       ?>
        <table align="center" widht="100%" border="1" style="margin-top:10px;">
<tr style="background-color:#000; color:#ffff;">
<th>ISBN Number</th>
<th>IMAGE</th>
<th>NAME</th>
<th>AUTHOR</th>
    <th>EDITION</th>
<th>PUBLICATIONS</th>
<th>AVAILABILITY</th>
</tr>

        <?php
        if(mysqli_num_rows($run)<1)
	{
      echo "NO BOOKS ARE AVAILABLE";
	}
	else
	{
		$count=0;
		while($data=mysqli_fetch_assoc($run))
		{
			$count++;
			?>
			<tr>
             <td><?php echo $data['bookid'];?></td>
             <td><img src="../dataimg/<?php echo $data['image'];?>"style="max-width=100px;"/></td>
             <td><?php echo $data['title'];?></td>
             <td><?php echo $data['author'];?></td>
             <td><?php echo $data['edition'];?></td>
             <td><?php echo $data['publication'];?></td>
			 <td><?php echo $data['availability'];?></td>
            </tr>
			
			<?php
		}
	}
?>
      </table>
</body>
</html>